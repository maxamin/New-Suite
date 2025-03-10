<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Lib\FormProcessor;
use App\Models\AdminNotification;
use App\Models\Transaction;
use App\Models\Withdrawal;
use App\Models\WithdrawMethod;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{

    public function withdrawMoney()
    {
        $user = auth()->user();
        $withdrawMethod = WithdrawMethod::where('status',1)->get();
        $pageTitle = 'Withdraw Money';
        return view($this->activeTemplate.'user.withdraw.methods', compact('pageTitle','withdrawMethod','user'));
    }

    public function withdrawStore(Request $request)
    {
        $this->validate($request, [
            'withdraw_method_code' => 'required',
            'withdraw_amount' => 'required|numeric'
        ]);
        $method = WithdrawMethod::where('id', $request->withdraw_method_code)->where('status', 1)->firstOrFail();
        $user = auth()->user();
        if ($request->withdraw_amount < $method->min_limit) {
            return response()->json(['cls'=>'error', 'msg'=>'Your requested amount is smaller than minimum amount.']);
        }
        if ($request->withdraw_amount > $method->max_limit) {
            return response()->json(['cls'=>'error', 'msg'=>'Your requested amount is larger than maximum amount.']);
        }

        if ($request->withdraw_amount > $user->balance) {
            return response()->json(['cls'=>'error', 'msg'=>'You do not have sufficient balance for withdraw.']);
        }


        $charge = $method->fixed_charge + ($request->withdraw_amount * $method->percent_charge / 100);
        $afterCharge = $request->withdraw_amount - $charge;
        $finalAmount = $afterCharge * $method->rate;

        $withdraw = new Withdrawal();
        $withdraw->method_id = $method->id; // wallet method ID
        $withdraw->user_id = $user->id;
        $withdraw->amount = $request->withdraw_amount;
        $withdraw->currency = $method->currency;
        $withdraw->rate = $method->rate;
        $withdraw->charge = $charge;
        $withdraw->final_amount = $finalAmount;
        $withdraw->after_charge = $afterCharge;
        $withdraw->trx = getTrx();
        $withdraw->save();
        session()->put('wtrx', $withdraw->trx);
        // return to_route('user.withdraw.preview');
        return response()->json(['view'=>$this->withdrawPreview()]);
    }

    public function withdrawPreview()
    {
        $withdraw = Withdrawal::with('method','user')->where('trx', session()->get('wtrx'))->where('status', 0)->orderBy('id','desc')->firstOrFail();
        $pageTitle = 'Withdraw Preview';
        return view($this->activeTemplate . 'user.withdraw.ajax_preview', compact('pageTitle','withdraw'))->render();
    }
    // public function withdrawPreview()
    // {
    //     $withdraw = Withdrawal::with('method','user')->where('trx', session()->get('wtrx'))->where('status', 0)->orderBy('id','desc')->firstOrFail();
    //     $pageTitle = 'Withdraw Preview';
    //     return view($this->activeTemplate . 'user.withdraw.preview', compact('pageTitle','withdraw'));
    // }

    public function withdrawSubmit(Request $request)
    {
        if ($request->withdrawPass == auth()->user()->withdraw_password) {

            $withdraw = Withdrawal::with('method','user')->where('trx', session()->get('wtrx'))->where('status', 0)->orderBy('id','desc')->firstOrFail();

            $method = $withdraw->method;

            if ($method->status == 0) {
                abort(404);
            }

            $formData = $method->form->form_data;

            $formProcessor = new FormProcessor();
            $validationRule = $formProcessor->valueValidation($formData);
            $request->validate($validationRule);
            $userData = $formProcessor->processFormData($request, $formData);

            $user = auth()->user();
            if ($user->ts) {
                $response = verifyG2fa($user,$request->authenticator_code);
                if (!$response) {
                    // $notify[] = ['error', 'Wrong verification code'];
                    // return back()->withNotify($notify);
                    $cls = 'error';
                    $notify = 'Wrong verification code!';
                    return response()->json(['msg'=>$notify, 'cls'=>$cls]);
                }
            }

            if ($withdraw->amount > $user->balance) {
                // $notify[] = ['error', 'Your request amount is larger then your current balance.'];
                // return back()->withNotify($notify);

                $cls = 'error';
                $notify = 'Your request amount is larger then your current balance!';
                return response()->json(['msg'=>$notify, 'cls'=>$cls]);
            }

            $withdraw->withdraw_wallet = $user->withdraw_wallet;
            $withdraw->status = 2;
            $withdraw->withdraw_information = $userData;
            $withdraw->save();
            $user->balance  -=  $withdraw->amount;
            $user->save();

            $transaction = new Transaction();
            $transaction->user_id = $withdraw->user_id;
            $transaction->amount = $withdraw->amount;
            $transaction->post_balance = $user->balance;
            $transaction->charge = $withdraw->charge;
            $transaction->trx_type = '-';
            $transaction->trx_logo = $withdraw->method->image;
            $transaction->details = showAmount($withdraw->final_amount) . ' ' . $withdraw->currency . ' Withdraw Via ' . $withdraw->method->name;
            $transaction->trx = $withdraw->trx;
            $transaction->remark = 'withdraw';
            $transaction->save();

            $adminNotification = new AdminNotification();
            $adminNotification->user_id = $user->id;
            $adminNotification->title = 'New withdraw request from '.$user->username;
            $adminNotification->click_url = urlPath('admin.withdraw.details',$withdraw->id);
            $adminNotification->save();

            notify($user, 'WITHDRAW_REQUEST', [
                'method_name' => $withdraw->method->name,
                'method_currency' => $withdraw->currency,
                'method_amount' => showAmount($withdraw->final_amount),
                'amount' => showAmount($withdraw->amount),
                'charge' => showAmount($withdraw->charge),
                'rate' => showAmount($withdraw->rate),
                'trx' => $withdraw->trx,
                'post_balance' => showAmount($user->balance),
            ]);

            // $notify[] = ['success', 'Withdraw request sent successfully'];
            // return to_route('user.withdraw.history')->withNotify($notify);

            $cls = 'success';
            $notify = 'Withdraw request sent successfully!';
            return response()->json(['msg'=>$notify, 'cls'=>$cls]);
        } else {
            $cls = 'error';
            $notify = 'Withdraw Password is Wrong!';
            return response()->json(['msg'=>$notify, 'cls'=>$cls]);
        }

    }

    public function withdrawLog(Request $request)
    {
        $pageTitle = "Withdraw Log";
        $withdraws = Withdrawal::where('user_id', auth()->id())->where('status', '!=', 0);
        if ($request->search) {
            $withdraws = $withdraws->where('trx',$request->search);
        }
        $withdraws = $withdraws->with('method')->orderBy('id','desc')->paginate(getPaginate());
        return view($this->activeTemplate.'user.withdraw.log', compact('pageTitle','withdraws'));
    }
}
