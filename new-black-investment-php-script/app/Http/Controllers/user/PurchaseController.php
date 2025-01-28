<?php

namespace App\Http\Controllers\user;

use App\Http\Component\AppController;
use App\Http\Controllers\Controller;
use App\Http\Services\WalletServices;
use App\Models\Package;
use App\Models\Purchase;
use App\Models\Rebate;
use App\Models\User;
use App\Models\UserLedger;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Laravel/Symfony Developer
 * Name: Muongozo
 * Telegram: @muongozotrader
 * Hire me via Telegram: muongozotrader
 */
class PurchaseController extends AppController
{
    //
    public function purchase_vip($id)
    {
        $vip = Package::find($id);

        /*if ($vip->is_default == 1) {
            return redirect()->back()->with('error', "This VIP is default when you registered in our platform. this time default vip is activated. please try other");
        }*/

        $rebate = Rebate::first();

        return view('app.main.my_vip.vip_details', compact('vip', 'rebate'));
    }

    public function purchaseConfirmation($id, Request $request, WalletServices $wallet)
    {
        try {

            // Get User
            $user = User::find(\auth()->user()->id);;

            // Find Package
            $package = Package::where(['id' => $id, 'status' => 'active', 'p_status' => 'in_stock'])->first();

            // Package not active
            if (!$package) throw new \Exception("Sorry package is out of stock");

            // Verify VIP
            if($package->vip > $user->vip && $package->for_vip) throw new \Exception("Your not eligible for this product. Please upgrade your account VIP to ".$package->vip->name);

            // Verify Purchase Limit
            if($package->has_limit) {
                // Count Purchase
                $totalPurchased = Purchase::where(['user_id' => $user->id, 'package_id' => $package->id])->count();

                // Verify Bought
                if($totalPurchased >= $package->buy_limit) throw new \Exception("Sorry this product is already activate for you");
            }
            

            $userBalance = $user->balance;
            $pay_amount = $package->price;
            $currency = $package->currency;
            $totalRevenue = $package->interest * $package->validity;

            // Low Balance
            if($userBalance < $pay_amount){
                return $this->handleResponseRedirect($request, 'You do not have sufficient balance to pay. Please recharge your wallet', 401, null, 'user.onepay', ['currency' => $request->pay_with]);
            }

            // Debit Balance
            $debitBalance = $wallet->debitBalance($user, $currency, $pay_amount);

            // Exception
            if($debitBalance instanceOf \Exception) {
                return $this->handleResponseRedirect($request, $debitBalance->getMessage(), 401, null, 'user.onepay', ['currency' => $currency]);
            }

            // Running Time
            $runningTime = getNextDayWithTime(24, 0);

            // Purchase Table Create
            $purchase = new Purchase();
            $purchase->user_id = Auth::id();
            $purchase->package_id = $package->id;
            $purchase->earn_type = $package->earn_type;
            $purchase->amount = $package->price;
            $purchase->days = $package->validity;
            //$purchase->hours = $package->hours;
            $purchase->interest = $package->interest;
            $purchase->next_return_date = $runningTime;
            $purchase->validity = now()->addDays($package->validity);
            $purchase->date = date('d-m-Y H:i');
            $purchase->status = 'active';
            $purchase->save();

            // Create Ledger
            $ledger = new UserLedger();
            $ledger->user_id = $user->id;
            $ledger->reason = 'vip_request';
            $ledger->perticulation = 'Your purchase was successfully';
            $ledger->amount = $package->price;
            $ledger->credit = $package->price;
            $ledger->status = 'approved';
            $ledger->date = date('d-m-Y H:i');
            $ledger->save();

            ### ESCAPE FREE PACKAGE
            if ($package->is_default != 1) {

                // Commission
                $rebate = Rebate::first();

                // First Ref Income
                $first_ref = $user && $user->ref_by ? $this->ref_user($user->ref_by) : null;
                if ($user && $user->ref_by && $first_ref && $rebate->interest_commission1 > 0) {
                    $amount = ($package->price * $rebate->interest_commission1) / 100 + $rebate->interest_commission1_flat;
                    User::where('id', $first_ref->id)->update([
                        'income' => $first_ref->income + $amount
                    ]);

                    $ledger = new UserLedger();
                    $ledger->user_id = $first_ref->id;
                    $ledger->get_balance_from_user_id = $user->id;
                    $ledger->reason = 'refer_bonus';
                    $ledger->perticulation = 'Congratulations. you have received refer income from ' . $user->name ?? $user->username;
                    $ledger->amount = $amount;
                    $ledger->debit = $amount;
                    $ledger->status = 'approved';
                    $ledger->step = 'first';
                    $ledger->date = date('d-m-Y H:i');
                    $ledger->save();
                }
                
                // Second Ref Income
                $second_ref = $first_ref && $first_ref->ref_by ? $this->ref_user($first_ref->ref_by) : null;
                if ($first_ref && $first_ref->ref_by && $second_ref && $rebate->interest_commission2 > 0) {
                    $amount = ($package->price * $rebate->interest_commission2) / 100 + $rebate->interest_commission2_flat;
                    User::where('id', $second_ref->id)->update([
                        'income' => $second_ref->income + $amount
                    ]);

                    $ledger = new UserLedger();
                    $ledger->user_id = $second_ref->id;
                    $ledger->get_balance_from_user_id = $user->id;
                    $ledger->reason = 'refer_bonus';
                    $ledger->perticulation = 'Congratulations. you have received refer income from ' . $user->name ?? $user->username;
                    $ledger->amount = $amount;
                    $ledger->debit = $amount;
                    $ledger->status = 'approved';
                    $ledger->step = 'second';
                    $ledger->date = date('d-m-Y H:i');
                    $ledger->save();
                }

                // Third Ref Income
                $third_ref = $second_ref && $second_ref->ref_by ? $this->ref_user($second_ref->ref_by) : null;
                if ($second_ref && $second_ref->ref_by && $third_ref && $rebate->interest_commission3 > 0) {
                    $amount = ($package->price * $rebate->interest_commission3) / 100 + $rebate->interest_commission3_flat;
                    User::where('id', $third_ref->id)->update([
                        'income' => $third_ref->income + $amount
                    ]);

                    $ledger = new UserLedger();
                    $ledger->user_id = $third_ref->id;
                    $ledger->get_balance_from_user_id = $user->id;
                    $ledger->reason = 'refer_bonus';
                    $ledger->perticulation = 'Congratulations. you have received refer income from ' . $user->name ?? $user->username;
                    $ledger->amount = $amount;
                    $ledger->debit = $amount;
                    $ledger->status = 'approved';
                    $ledger->step = 'third';
                    $ledger->date = date('d-m-Y H:i');
                    $ledger->save();
                }
            }
            ##

            // Upgrade VIP if eligible
            upgradeVIP($user->id);

            return $this->handleResponseRedirect($request, 'Congratulations Your '.$package->name.' purchase successful.', 200, null, 'earning');
            
        } catch (\Exception $th) {
            //throw $th;
            return $this->handleResponseRedirect($request, $th->getMessage(), 401, null, 'dashboard');
        }
    }

    protected function ref_user($ref_by)
    {
        return User::where('ref_id', $ref_by)->first();
    }
}
