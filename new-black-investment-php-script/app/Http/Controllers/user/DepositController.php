<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Services\Deposit\Bank\OxaPayBankDepositServices;
use App\Http\Services\PaymentServices;
use App\Models\BankList;
use App\Models\CryptoWallet;
use App\Models\Deposit;
use App\Models\Package;
use App\Models\PaymentMethod;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DepositController extends Controller
{
    public function index(OxaPayBankDepositServices $cryptoIssue, $network = 'trc20')
    {
        try {
            // Verify network
            $wallet = CryptoWallet::where(['user_id' => \auth()->user()->id, 'network' => strtolower($network)])->first();

            // Issue new Address
            if(!$wallet) {

                // Network check
                $networkCheck = BankList::where(['bank_code' => $network])->first();

                // Network not exist
                if(!$networkCheck) throw new \Exception("Network $network not available");
                
                // Issue new crypto wallet
                $cryptoWallet = $cryptoIssue->deposit(time(), $network, 0, 'oxapay');

                // Exception
                if($cryptoWallet instanceof \Exception) throw new \Exception($cryptoWallet->getMessage());

                // Add new crypto wallet
                $wallet = new CryptoWallet();
                $wallet->user_id = \auth()->user()->id;
                $wallet->currency = $cryptoWallet['currency'];
                $wallet->network = $cryptoWallet['network'];
                $wallet->address = $cryptoWallet['address'];
                $wallet->order_id = $cryptoWallet['order_ref'];
                $wallet->save();
            }
            
            $methods = BankList::where(['open_deposit' => 1, 'status' => 1])->get();

            return view('app.main.recharge.index', compact('methods', 'wallet', 'network'));
        } catch (\Exception $th) {
            //throw $th;
            return redirect()->route('my.profile')->with('error', $th->getMessage());
        }
    }

    public function depositSubmit(Request $request, PaymentServices $payment)
    {
        $validate = Validator::make($request->all(), [
           'amount' => 'required|numeric',
            'pay_method' => 'required'
        ]);

        if ($validate->fails()){
            //return back()->withErrors($validate->errors());
            return redirect()->back()->with("error", implode(',', $validate->errors()->all()));
        }

        $user = User::find(\auth()->user()->id);
        $setting = Setting::first();

        $method = PaymentMethod::where('tag', $request->pay_method)->first();
        if ($method->minimum_recharge > 0 && $request->amount < $method->minimum_recharge){
            return redirect()->back()->with("error", "Recharge amount must be greater then ".$method->minimum_recharge);
        }
        if ($method->maximum_recharge > 0 && $request->amount > $method->maximum_recharge){
            return redirect()->back()->with("error", "Recharge amount must be less then ".$method->maximum_recharge);
        }

        // Deposit Suspended
        if ($setting->open_deposit != 1 || $user->open_deposit != 1){
            return redirect()->back()->with("error", "Sorry! Deposit Service not available at the moment. Try again later");
        }

        $final_amount = 0;
        if ($method->recharge_charge > 0){
            $final_amount = ($method->recharge_charge * $request->amount) / 100;
        }

        $jsonData = '';
        $linkData = '';
        $reference = rand(00000,99999);

        // Auto Deposit
        if($method->auto && $setting->auto_deposit) {
            // Charge Payment
            $chargePayment = $payment->charge($reference, $setting->cur_text, $request->amount, $method->tag);

            // Exception
            if($chargePayment['status'] == false) {
                return redirect()->route('user.onepay')->with("error", $chargePayment['message']);
            }

            $jsonData = json_encode([
                'reference' => $chargePayment['data']['reference'],
                'order_ref' => $chargePayment['data']['order_ref']
            ]);
            
            $linkData = $chargePayment['data']['link'];

            $model = new Deposit();
            $model->user_id = Auth::id();
            $model->method_name = $method->name;
            $model->order_id = $reference;
            $model->transaction_id = $chargePayment['data']['order_ref'];
            $model->number = $request->acc_acount;
            $model->amount = $request->amount;
            $model->charge_amount = $final_amount;
            $model->final_amount = $request->amount - $final_amount;
            $model->pay_link = $linkData;
            $model->data = $jsonData;
            $model->date = date('d-m-Y H:i:s');
            $model->status = 'pending';
            $model->save();

            return redirect()->away($linkData);
        }

        $model = new Deposit();
        $model->user_id = Auth::id();
        $model->method_name = $method->name;
        $model->method_number = $method->number;
        $model->order_id = $reference;
        $model->transaction_id = $reference;
        $model->number = $request->acc_acount;
        $model->amount = $request->amount;
        $model->charge_amount = $final_amount;
        $model->final_amount = $request->amount - $final_amount;
        $model->date = date('d-m-Y H:i:s');
        $model->status = 'pending';

        if ($model->save())
        {
            if (session()->has('onepay')){
                $data = [
                    'user_id'=> $model->user_id,
                    'order_id'=> $model->order_id,
                    'transaction_id'=> $model->transaction_id,
                    'number'=> $model->number,
                    'amount'=> $model->amount,
                    'charge_amount'=> $final_amount,
                    'final_amount'=> $request->amount - $final_amount,
                    'status'=> $model->status,
                ];
                session()->put('onepay', $data);
            }
            return redirect()->back()->with("success", 'Kind pay your order');
        }
    }

}
