<?php

namespace App\Http\Controllers\Gateway;

use App\Models\User;
use App\Models\Deposit;
use App\Lib\FormProcessor;
use App\Models\AutoPayment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\GatewayCurrency;
use App\Models\AdminNotification;
use App\Http\Controllers\Controller;
use App\Models\Gateway;

class PaymentController extends Controller
{
    public function deposit()
    {
        $user = auth()->user();
        $gatewayCurrency = GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', 1);
        })->with('method')->orderby('method_code')->get();
        $pageTitle = 'Deposit Methods';
        return view($this->activeTemplate . 'user.payment.deposit', compact('gatewayCurrency', 'pageTitle','user'));
    }

    public function depositInsert(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|gt:0',
            'method_code' => 'required',
            'currency' => 'required',
        ]);

        $user = auth()->user();
        $gate = GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', 1);
        })->where('method_code', $request->method_code)->where('currency', $request->currency)->first();
        if (!$gate) {
            // $notify[] = ['error', 'Invalid gateway'];
            // return back()->withNotify($notify);
            $cls = 'error';
            $notify = 'Invalid gateway!';
            return response()->json(['msg'=>$notify, 'cls'=>$cls]);
        }

        if ($gate->min_amount > $request->amount || $gate->max_amount < $request->amount) {
            // $notify[] = ['error', 'Please follow deposit limit'];
            // return back()->withNotify($notify);
            $cls = 'error';
            $notify = 'Please follow deposit limit!';
            return response()->json(['msg'=>$notify, 'cls'=>$cls]);
        }

        $charge = $gate->fixed_charge + ($request->amount * $gate->percent_charge / 100);
        $payable = $request->amount + $charge;
        $final_amo = $payable * $gate->rate;

        $data                   = new Deposit();
        $data->user_id          = $user->id;
        $data->method_code      = $gate->method_code;
        $data->method_currency  = strtoupper($gate->currency);
        $data->amount           = $request->amount;
        $data->charge           = $charge;
        $data->rate             = $gate->rate;
        $data->final_amo        = $final_amo;
        $data->btc_amo          = 0;
        $data->btc_wallet       = "";
        $data->trx              = getTrx();
        $data->try              = 0;
        $data->status           = 0;
        $data->save();
        session()->put('Track', $data->trx);
        // return to_route('user.deposit.confirm');
        return response()->json(['view'=>$this->manualDepositConfirm()]);
    }


    public function appDepositConfirm($hash)
    {
        try {
            $id = decrypt($hash);
        } catch (\Exception $ex) {
            return "Sorry, invalid URL.";
        }
        $data = Deposit::where('id', $id)->where('status', 0)->orderBy('id', 'DESC')->firstOrFail();
        $user = User::findOrFail($data->user_id);
        auth()->login($user);
        session()->put('Track', $data->trx);
        return to_route('user.deposit.confirm');
    }


    public function depositConfirm()
    {
        $track = session()->get('Track');
        $deposit = Deposit::where('trx', $track)->where('status',0)->orderBy('id', 'DESC')->with('gateway')->firstOrFail();

        if ($deposit->method_code >= 1000) {
            return to_route('user.deposit.manual.confirm');
        }


        $dirName = $deposit->gateway->alias;
        $new = __NAMESPACE__ . '\\' . $dirName . '\\ProcessController';

        $data = $new::process($deposit);
        $data = json_decode($data);


        if (isset($data->error)) {
            $notify[] = ['error', $data->message];
            return to_route(gatewayRedirectUrl())->withNotify($notify);
        }
        if (isset($data->redirect)) {
            return redirect($data->redirect_url);
        }

        // for Stripe V3
        if(@$data->session){
            $deposit->btc_wallet = $data->session->id;
            $deposit->save();
        }

        $pageTitle = 'Payment Confirm';
        return view($this->activeTemplate . $data->view, compact('data', 'pageTitle', 'deposit'));
    }


    public static function userDataUpdate($deposit,$isManual = null)
    {
        if ($deposit->status == 0 || $deposit->status == 2) {
            $deposit->status = 1;
            $deposit->save();

            $user = User::find($deposit->user_id);
            $user->balance += $deposit->amount;
            $user->save();

            $transaction = new Transaction();
            $transaction->user_id = $deposit->user_id;
            $transaction->amount = $deposit->amount;
            $transaction->post_balance = $user->balance;
            $transaction->charge = $deposit->charge;
            $transaction->trx_type = '+';
            $transaction->trx_logo = $deposit->gatewayCurrency()->image;
            $transaction->details = 'Deposit Via ' . $deposit->gatewayCurrency()->name;
            $transaction->trx = $deposit->trx;
            $transaction->remark = 'deposit';
            $transaction->save();

            $adminNotification = new AdminNotification();
            $adminNotification->user_id = $user->id;
            $adminNotification->title = 'Deposit successful via '.$deposit->gatewayCurrency()->name;
            $adminNotification->click_url = urlPath('admin.deposit.successful');
            $adminNotification->save();

            levelCommission($user, $deposit->amount, 'deposit_commission', $deposit->trx);

            if (!$isManual) {
                $adminNotification = new AdminNotification();
                $adminNotification->user_id = $user->id;
                $adminNotification->title = 'Deposit successful via '.$deposit->gatewayCurrency()->name;
                $adminNotification->click_url = urlPath('admin.deposit.successful');
                $adminNotification->save();
            }

            notify($user, $isManual ? 'DEPOSIT_APPROVE' : 'DEPOSIT_COMPLETE', [
                'method_name' => $deposit->gatewayCurrency()->name,
                'method_currency' => $deposit->method_currency,
                'method_amount' => showAmount($deposit->final_amo),
                'amount' => showAmount($deposit->amount),
                'charge' => showAmount($deposit->charge),
                'rate' => showAmount($deposit->rate),
                'trx' => $deposit->trx,
                'post_balance' => showAmount($user->balance)
            ]);


        }
    }

    public function manualDepositConfirm()
    {
        $track = session()->get('Track');
        $data = Deposit::with('gateway')->where('status', 0)->where('trx', $track)->first();
        if (!$data) {
            return to_route(gatewayRedirectUrl());
        }
        if ($data->method_code > 999) {

            $pageTitle = 'Deposit Confirm';
            $method = $data->gatewayCurrency();
            $gateway = $method->method;
            return view($this->activeTemplate . 'user.payment.ajax_manual', compact('data', 'pageTitle', 'method','gateway'))->render();
        }
        abort(404);
    }

    // public function manualDepositConfirm()
    // {
    //     $track = session()->get('Track');
    //     $data = Deposit::with('gateway')->where('status', 0)->where('trx', $track)->first();
    //     if (!$data) {
    //         return to_route(gatewayRedirectUrl());
    //     }
    //     if ($data->method_code > 999) {

    //         $pageTitle = 'Deposit Confirm';
    //         $method = $data->gatewayCurrency();
    //         $gateway = $method->method;
    //         return view($this->activeTemplate . 'user.payment.manual', compact('data', 'pageTitle', 'method','gateway'));
    //     }
    //     abort(404);
    // }

    public function manualDepositUpdate(Request $request)
    {
        $track = session()->get('Track');
        $data = Deposit::with('gateway')->where('status', 0)->where('trx', $track)->first();
        if (!$data) {
            return to_route(gatewayRedirectUrl());
        }
        $gatewayCurrency = $data->gatewayCurrency();
        $gateway = $gatewayCurrency->method;
        $formData = $gateway->form->form_data;

        $formProcessor = new FormProcessor();
        $validationRule = $formProcessor->valueValidation($formData);
        $request->validate($validationRule);
        $userData = $formProcessor->processFormData($request, $formData);


        $data->detail = $userData;
        $data->status = 2; // pending
        $data->save();


        $adminNotification = new AdminNotification();
        $adminNotification->user_id = $data->user->id;
        $adminNotification->title = 'Deposit request from '.$data->user->username;
        $adminNotification->click_url = urlPath('admin.deposit.details',$data->id);
        $adminNotification->save();

        notify($data->user, 'DEPOSIT_REQUEST', [
            'method_name' => $data->gatewayCurrency()->name,
            'method_currency' => $data->method_currency,
            'method_amount' => showAmount($data->final_amo),
            'amount' => showAmount($data->amount),
            'charge' => showAmount($data->charge),
            'rate' => showAmount($data->rate),
            'trx' => $data->trx
        ]);

        // $notify[] = ['success', 'You have deposit request has been taken'];
        // return to_route('user.deposit.history')->withNotify($notify);
        $cls = 'success';
        $notify = 'You have deposit request has been taken!';
        return response()->json(['msg'=>$notify, 'cls'=>$cls]);
    }


    public function autoDepositcUrl(Request $request){
        // dd($request->all());
        $gate = Gateway::where('code', 999)->first();

        $gateway_parameters  = json_decode($gate->gateway_parameters, true);
        $rate = $gateway_parameters['rate'];


        $autoPayment = AutoPayment::first();
        $apikey = $autoPayment->api_key; //Your Api Key
        $clientkey = $autoPayment->client_key; //Your Client Key
        $secretkey = $autoPayment->secret_key; //Your Secret Key

        $amount = ($request->amount * $rate); //amount with rate

        $cus_name = auth()->user()->name;
        $cus_email = auth()->user()->email;

        $success_url = $request->success_url; //success url
        $cancel_url = $request->cancel_url; //cancel url
        $hostname = $request->position;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://pay.edokanpay.com/checkout.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'api' => $apikey,
                'client' => $clientkey,
                'secret' => $secretkey,
                'amount' => $amount,
                'position' => $hostname,
                'success_url' => $success_url,
                'cancel_url' => $cancel_url,
                'cus_name' => $cus_name,
                'cus_email' => $cus_email
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
        // return response()->json(['curl'=>$response]);
    }

    public function cancelPage(){
        $pageTitle = "Payment Failed";
        return view('templates.basic.user.payment.edokanpay.cancel', compact('pageTitle'));
    }

    // // https://mytaskv6.test/user/deposit-auto-success?&transactionId=6052295&paymentAmount=10&paymentFee=0
    // // https://pay2.edokanpay.com/payment/complete?ref=646d513f32d15&method=16216&curr=bdt

    public function successPage(){
        $transactionId = $_GET['transactionId'];
        $paymentAmount = $_GET['paymentAmount'];
        $paymentFee = $_GET['paymentFee'];

        $transaction_id_edokanpay = $transactionId;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://pay.edokanpay.com/verify.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('transaction_id' => $transaction_id_edokanpay),
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        if($response == 1){
            $user = auth()->user();
            $user->balance += $paymentAmount;
            $user->save();

            $transaction = new Transaction();
            $transaction->user_id = $user->id;
            $transaction->amount = $paymentAmount;
            $transaction->post_balance = $user->balance;
            $transaction->charge = $paymentFee;
            $transaction->trx_type = '+';
            $transaction->trx_logo = 'auto-payment.png';
            $transaction->details = 'Deposit Successfull via Auto Payment!';
            $transaction->trx = $transactionId;
            $transaction->remark = 'deposit';
            $transaction->save();

            $adminNotification = new AdminNotification();
            $adminNotification->user_id = $user->id;
            $adminNotification->title = 'Deposit successful via - eDokanPay';
            $adminNotification->click_url = urlPath('admin.deposit.successful');
            $adminNotification->save();

            $gate = Gateway::where('code', 999)->first();

            $gateway_parameters  = json_decode($gate->gateway_parameters, true);
            $rate = $gateway_parameters['rate'];

            $deposit                   = new Deposit();
            $deposit->user_id          = $user->id;
            $deposit->method_code      = $gate->code;
            $deposit->method_currency  = strtoupper($gate->currency);
            $deposit->amount           = $paymentAmount;
            $deposit->charge           = $paymentFee;
            $deposit->rate             = $rate;
            $deposit->final_amo        = $paymentAmount + $paymentFee;
            $deposit->btc_amo          = 0;
            $deposit->btc_wallet       = "";
            $deposit->trx              = $transactionId;
            $deposit->try              = 0;
            $deposit->status           = 1;
            $deposit->save();

            levelCommission($user, $deposit->amount, 'deposit_commission', $deposit->trx);

            $pageTitle = "Payment Successfull";
            return view('templates.basic.user.payment.edokanpay.success', compact('pageTitle'));
        }else{
            $pageTitle = "Payment Failed";
            return view('templates.basic.user.payment.edokanpay.cancel', compact('pageTitle'));
        }
    }


}
