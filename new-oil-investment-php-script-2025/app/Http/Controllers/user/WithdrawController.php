<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Services\PaymentServices;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Models\UserLedger;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Deposit;
use App\Models\Purchase;
use Carbon\Carbon;

class WithdrawController extends Controller
{
    public function withdraw()
    {
        if (auth()->user()->gateway_method && \auth()->user()->gateway_number) {
            return view('app.main.withdraw.index');
        } else {
            return view('app.main.withdraw.index');
        }
    }
    public function withdraw_history()
    {
        return view('app.main.withdraw_history');
    }

    public function withdrawRequest(Request $request, PaymentServices $payment)
    {
        $validate = Validator::make($request->all(), [
            'amount' => 'required|numeric',
        ]);

        $current_time = Carbon::now();
        $start = 10; //Eg. start hour 10PM
        $end = 17;  //Eg. end hour 5AM
        $now = Carbon::now();

        if (setting('w_time_status') == 'inactive') {
            return redirect()->back()->with('error', 'Withdraw time 8.00AM - 5.00PM');
        }

        if ($request->amount == null) {
            return redirect()->back()->with('error', 'Withdraw Amount Required.');
        }


        if (true) {
            $user = Auth::user();

            if ($validate->fails()) {
                return redirect()->back()->withErrors('errors', $validate->errors());
            }
            $payments = Purchase::where('user_id', $user->id)->get();
            if ($payments->count() < 1) {
                return redirect()->back()->with('success', "Your Plan is not active");
            }

            //Check user payment or not
            //            $payments = Purchase::where('user_id', $user->id)->get();
            //            if ($payments->count() < 1) {
            //                return redirect()->back()->with('error', "Your ");
            //            }
            if ($request->amount <= $user->balance) {
                if ($request->amount >= setting('minimum_withdraw')) {
                    if ($request->amount <= setting('maximum_withdraw')) {
                        $charge = 0;
                        if (setting('withdraw_charge') > 0) {
                            $charge = ($request->amount * setting('withdraw_charge')) / 100;
                        }

                        $finalAmount = $request->amount - $charge;

                        $status_id = 'pending';
                        $status_text = 'Your withdraw request status is pending please wait for admin approval or communication with us.';
                        $reference = 'W-' . rand(000000, 999999) . rand(000000, 999999) . rand(000000, 999999);
                        $order_id = $reference;


                        //Update User Balance
                        $balance = $user->balance - $request->amount;
                        $usersave = User::find($user->id);
                        $usersave->balance = $balance;
                        $usersave->save();

                        // Auto Payout
                        if (setting('auto_transfer')) {

                            // Transfer Payment
                            $transferPayment = $payment->payout($reference, "USDT", $finalAmount, setting('auto_transfer_default'), $user->gateway_method, $user->gateway_number, $user->name, $user->gateway_method);

                            // Exception
                            if ($transferPayment['status'] == false) {

                                // Refund Payment
                                $balance = $user->balance + $request->amount;
                                $usersave = User::find($user->id);
                                $usersave->balance = $balance;
                                $usersave->save();

                                return redirect()->back()->with('error', $transferPayment['message']);
                            }

                            $status_id = 'approved';
                            $status_text = 'Your withdraw request has been approved';
                            $order_id = $transferPayment['data']['order_ref'];
                        }

                        $account_info = [
                            'bank_account' => $user->gateway_number,
                            'full_name' => $user->name,
                            'bank_name' => $user->name,
                            'bank_code' => $user->gateway_method,
                            'swift_code' => $user->gateway_method
                        ];


                        //Withdraw
                        $withdrawal = new Withdrawal();
                        $withdrawal->user_id = $user->id;
                        $withdrawal->method_name = $user->gateway_method;
                        $withdrawal->number = $user->gateway_number;
                        $withdrawal->amount = $request->amount;
                        $withdrawal->currency = 'USD';
                        $withdrawal->charge = $charge;
                        $withdrawal->oid = $reference;
                        $withdrawal->trx = $reference;
                        $withdrawal->order_id = $order_id;
                        $withdrawal->final_amount = $finalAmount;
                        $withdrawal->account_info = json_encode($account_info);
                        $withdrawal->status = $status_id;

                        //User Ledger
                        if ($withdrawal->save()) {
                            $ledger = new UserLedger();
                            $ledger->user_id = $user->id;
                            $ledger->reason = 'withdraw_request';
                            $ledger->perticulation = $status_text;
                            $ledger->amount = $request->amount;
                            $ledger->debit = $request->amount - $charge;
                            $ledger->status = $status_id;
                            $ledger->date = date('d-m-Y H:i');
                            $ledger->save();
                        }
                        return redirect()->route('withdraw.history')->with('success', $status_text);
                    } else {
                        return redirect()->back()->with('error', 'Less then ' . setting('maximum_withdraw'));
                    }
                } else {
                    return redirect()->back()->with('error', 'Greater then ' . setting('minimum_withdraw'));
                }
            } else {
                return redirect()->back()->with('error', 'Balance Low');
            }
        } else {
            return redirect()->back()->with('error', 'Withdraw time 8.00AM - 5.00PM');
        }
    }
}
