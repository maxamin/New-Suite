<?php

namespace App\Http\Controllers\user;

use App\Http\Component\AppController;
use App\Http\Controllers\Controller;
use App\Http\Services\PaymentServices;
use App\Http\Services\WalletServices;
use App\Models\PaymentMethod;
use App\Models\Setting;
use App\Models\User;
use App\Models\UserLedger;
use App\Models\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class WithdrawController extends AppController
{
    public function withdraw()
    {
        // Check if Bank Added
        if(!auth()->user()->bankAccount) {
            return redirect()->route('user.card')->with("error", "Please update your bank account first");
        }

        $setting = Setting::first();
        $method = PaymentMethod::where(['tag' => $setting->auto_transfer_default, 'open_payout' => 1, 'status' => 'active'])->first();

        return view('app.main.withdraw.index', compact('method'));
    }

    public function withdrawRequest(Request $request, PaymentServices $payment, WalletServices $wallet)
    {
        try {
            $validate = Validator::make($request->all(), [
                'amount' => 'required|numeric',
                'password' => 'required|string'
            ]);
            if ($validate->fails()) {
                return back()->with('error', $validate->errors());
                return response()->json(['status' => false, 'errors' => $validate->errors()]);
            }
    
            if (!\Hash::check($request->password, auth()->user()->password)) throw new \Exception("Invalid login password");

            $user = User::find(\auth()->user()->id);
            $setting = Setting::first();

            // Find Method
            $method = PaymentMethod::where('tag', $setting->auto_transfer_default)->first();

            // Exception
            if(!$method) throw new \Exception("Withdrawal method not available");

            // Withdraw Suspended
            if($setting->open_payout != 1 || $user->open_payout != 1) throw new \Exception("Sorry! service not available. Try again later");

            if ($request->amount <= $method->minimum_withdraw) throw new \Exception('Minimum Withdraw ' . $method->minimum_withdraw);
            
            if (!$request->amount >= $method->maximum_withdraw) throw new \Exception('Maximum Withdraw ' . $method->maximum_withdraw);
            
            $start = 9; //Eg. start hour 10PM
            $end = 21;  //Eg. end hour 5AM
            $now = Carbon::now();

            // Verify Withdraw Time
            if(!$start <= $now->hour && !$end > $now->hour) throw new \Exception('Withdraw allowed 11AM to 9PM');

            $status_id = 'pending';
            $status_text = 'Your withdraw request status is pending please wait for admin approval or communication with us.';
            $reference = rand(00000,99999);
            $order_id = $reference;

            $userBalance = $user->income;
            $pay_amount = $request->amount;
            $currency = $setting->cur_text;

            // Low Balance
            if($userBalance < $pay_amount){
                return $this->handleResponseRedirect($request, 'You do not have sufficient balance to pay. Please recharge your wallet', 401, null, 'user.onepay', ['currency' => $currency]);
            }

            // Debit Balance
            $debitBalance = $wallet->debitAvailableBalance($user, 2, $currency, $pay_amount);

            // Exception
            if($debitBalance instanceOf \Exception) {
                return $this->handleResponseRedirect($request, $debitBalance->getMessage(), 401, null, 'user.withdraw', ['currency' => $currency]);
            }
            
            
            $charge = 0;
            if ($method->withdraw_charge > 0) {
                $charge = ($request->amount * $method->withdraw_charge) / 100;
            }

            $finalAmount = $request->amount - $charge;

            // Transfer Amount
            $transfer_amount = $finalAmount * $user->bankAccount->bank->rate;
            $transfer_currency = $user->bankAccount->bank->currency;
            $transfer_rate = $user->bankAccount->bank->rate;

            // Auto Payout
            if($setting->auto_transfer) {

                // Transfer Payment
                $transferPayment = $payment->payout($user->bankAccount->phone_number, $reference, $currency, $transfer_amount, $setting->auto_transfer_default, $user->bankAccount->bank_code, $user->bankAccount->bank_account, $user->bankAccount->full_name, $user->bankAccount->ifsc);

                // Exception
                if($transferPayment['status'] == false) {

                    // Refund Payment
                    $wallet->creditAvailableBalance($user, 2, $currency, $request->amount);

                    throw new \Exception($transferPayment['message']);
                    
                }

                $status_id = 'approved';
                $status_text = 'Your withdraw request has been approved';
                $order_id = $transferPayment['data']['order_ref'];
            }

            $account_info = [
                'bank_account' => $user->bankAccount->bank_account,
                'full_name' => $user->bankAccount->full_name,
                'bank_name' => $user->bankAccount->bank_name,
                'bank_code' => $user->bankAccount->bank_code,
                'swift_code' => $user->bankAccount->ifsc,
                'phone_number' => $user->bankAccount->phone_number,
            ];

            // Withdraw
            $withdrawal = new Withdrawal();
            $withdrawal->payment_method_id = Auth::user()->gateway_method;
            $withdrawal->user_id = $user->id;
            $withdrawal->trx = $reference;
            $withdrawal->order_id = $order_id;
            $withdrawal->account_info = json_encode($account_info);
            $withdrawal->number = $user->bankAccount->bank_account;
            $withdrawal->amount = $request->amount;
            $withdrawal->currency = $currency;
            $withdrawal->charge = $charge;
            $withdrawal->final_amount = $finalAmount;
            $withdrawal->transfer_amount = $transfer_amount;
            $withdrawal->transfer_currency = $transfer_currency;
            $withdrawal->rate = $transfer_rate;
            $withdrawal->status = $status_id;

            // User Ledger
            if ($withdrawal->save()){
                $ledger = new UserLedger();
                $ledger->user_id = $user->id;
                $ledger->reason = 'withdraw_request';
                $ledger->perticulation = $status_text;
                $ledger->amount = $request->amount;
                $ledger->debit = $finalAmount;
                $ledger->status = $status_id;
                $ledger->date = date('d-m-Y H:i');
                $ledger->save();
            }
            
            return $this->handleResponseRedirect($request, 'Your Withdraw request has been submitted', 200, null, 'user.withdraw.ledger');
            
        } catch (\Exception $th) {
            //throw $th;
            return $this->handleResponseRedirect($request, $th->getMessage(), 401, null, 'user.withdraw');
        }
        
    }

    public function withdrawPreview()
    {
        $withdraws = Withdrawal::with('payment_method')->where('user_id', Auth::id())->orderByDesc('id')->get();
        return view('app.main.withdraw.withdraw-preview', compact('withdraws'));
    }
}
