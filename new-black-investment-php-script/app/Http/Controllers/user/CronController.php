<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Services\WalletServices;
use App\Models\Package;
use App\Models\Purchase;
use App\Models\Rebate;
use App\Models\UserLedger;
use App\Models\User;
use Carbon\Carbon;

/**
 * Laravel/Symfony Developer
 * Name: Muongozo
 * Telegram: @muongozotrader
 * Hire me via Telegram: muongozotrader
 */
class CronController extends Controller
{
    
    public function daily(WalletServices $wallet)
    {
        ini_set("memory_limit",-1);
        ini_set('max_execution_time', 0);

        $nowDateTime = Carbon::now();

        // Daily Earnings
        $purchases  = Purchase::where('status', 'active')
            ->where(['earn_type' => 'daily'])
            ->where('next_return_date', '<=', $nowDateTime)
            ->whereDate("validity", ">=", $nowDateTime)
            ->get();

        foreach ($purchases as $purchase) {
            $user = User::where('id', $purchase->user_id)->first();
            if ($user) {

                // Escape Daily Earn
                if($user->receive_daily_earn != 1) continue;
                
                $package = Package::where('id', $purchase->package_id)->first();
                if ($package) {
                    
                    $amount = $user->receive_able_amount + $purchase->interest;
                    $user->receive_able_amount = $amount;
                    $user->save();

                    // Prduct Status
                    $purchase->date = getNextDayWithTime(24, 0);
                    $purchase->next_return_date = getNextDayWithTime(24, 0);
                    $purchase->count_return += 1;
                    $purchase->save();

                    $ledger = new UserLedger();
                    $ledger->user_id = $user->id;
                    $ledger->reason = 'interest';
                    $ledger->perticulation = $package->name . ' Package commission';
                    $ledger->amount = $purchase->interest;
                    $ledger->credit = $purchase->interest;
                    $ledger->status = 'approved';
                    $ledger->date = date("Y-m-d H:i:s");
                    $ledger->save();

                    $checkExpire = new Carbon($purchase->validity);
                    if ($checkExpire->isPast()) {
                        $ppp = Purchase::where('id', $purchase->id)->first();
                        $ppp->status = 'inactive';
                        $ppp->save();
                    }

                    ### ESCAPE FREE PACKAGE
                    if ($package->is_default != 1) {
                        $rebate = Rebate::first();
                        $earn_amount = $purchase->interest;

                        $first_ref = User::where('ref_id', $user->ref_by)->first();
                        if ($first_ref && $rebate->earn_first_level > 0){
                            $amount = $earn_amount * $rebate->earn_first_level / 100;
                            
                            $wallet->creditAvailableBalance($first_ref, 2, "NGN", $amount);

                            $ledger = new UserLedger();
                            $ledger->user_id = $first_ref->id;
                            $ledger->get_balance_from_user_id = $user->id;
                            $ledger->reason = 'refer_bonus';
                            $ledger->perticulation = 'Rebate First Level Commission Received';
                            $ledger->amount = $amount;
                            $ledger->debit = $amount;
                            $ledger->status = 'approved';
                            $ledger->step = 'first';
                            $ledger->date = date('d-m-Y H:i');
                            $ledger->save();

                            $second_ref = User::where('ref_id', $first_ref->ref_by)->first();
                            if ($second_ref && $rebate->earn_second_level > 0){
                                $amount = $earn_amount * $rebate->earn_second_level / 100;
                            
                                $wallet->creditAvailableBalance($second_ref, 2, "NGN", $amount);

                                $ledger = new UserLedger();
                                $ledger->user_id = $second_ref->id;
                                $ledger->get_balance_from_user_id = $user->id;
                                $ledger->reason = 'refer_bonus';
                                $ledger->perticulation = 'Rebate Second Level Commission Received';
                                $ledger->amount = $amount;
                                $ledger->debit = $amount;
                                $ledger->status = 'approved';
                                $ledger->step = 'second';
                                $ledger->date = date('d-m-Y H:i');
                                $ledger->save();

                                $third_ref = User::where('ref_id', $second_ref->ref_by)->first();
                                if ($third_ref && $rebate->earn_third_level > 0){
                                    $amount = $earn_amount * $rebate->earn_third_level / 100;
                                    
                                    $wallet->creditAvailableBalance($third_ref, 2, "NGN", $amount);

                                    $ledger = new UserLedger();
                                    $ledger->user_id = $third_ref->id;
                                    $ledger->get_balance_from_user_id = $user->id;
                                    $ledger->reason = 'refer_bonus';
                                    $ledger->perticulation = 'Rebate Third Level Commission Received';
                                    $ledger->amount = $amount;
                                    $ledger->debit = $amount;
                                    $ledger->status = 'approved';
                                    $ledger->step = 'third';
                                    $ledger->date = date('d-m-Y H:i');
                                    $ledger->save();
                                }
                            }
                        }
                    }
                    ##
                }
            }
        } // End

        return response()->json(['status'=> true, 'message'=> 'Cronjob was successful run']);
    }

    public function days(WalletServices $wallet)
    {
        ini_set("memory_limit",-1);
        ini_set('max_execution_time', 0);

        $nowDateTime = Carbon::now();

        // Days Earnings
        $purchases = Purchase::whereRaw("DATE_ADD(created_at, INTERVAL days DAY) <= ?", [$nowDateTime])
            ->where('status', 'active')
            ->where('earn_type', 'days')
            ->whereDate("validity", ">=", $nowDateTime)
            ->get();

        foreach ($purchases as $purchase) {
            $user = User::where('id', $purchase->user_id)->first();
            if ($user) {

                // Interest Amount 
                $interest_amount = $purchase->interest * $purchase->days;

                // Escape Daily Earn
                if($user->receive_daily_earn != 1) continue;
                
                $package = Package::where('id', $purchase->package_id)->first();
                if ($package) {

                    $amount = $user->receive_able_amount + $interest_amount;
                    $user->receive_able_amount = $amount;
                    $user->save();

                    // Prduct Status
                    $purchase->date = $nowDateTime;
                    $purchase->next_return_date = null;
                    $purchase->count_return += 1;
                    $purchase->status = 'inactive';
                    $purchase->save();

                    $ledger = new UserLedger();
                    $ledger->user_id = $user->id;
                    $ledger->reason = 'interest';
                    $ledger->perticulation = $package->name . ' Package commission';
                    $ledger->amount = $interest_amount;
                    $ledger->credit = $interest_amount;
                    $ledger->status = 'approved';
                    $ledger->date = date("Y-m-d H:i:s");
                    $ledger->save();

                    $rebate = Rebate::first();
                    $earn_amount = $interest_amount;

                    $first_ref = User::where('ref_id', $user->ref_by)->first();
                    if ($first_ref && $rebate->earn_first_level > 0){
                        $amount = $earn_amount * $rebate->earn_first_level / 100;
                        
                        $wallet->creditAvailableBalance($first_ref, 2, "NGN", $amount);

                        $ledger = new UserLedger();
                        $ledger->user_id = $first_ref->id;
                        $ledger->get_balance_from_user_id = $user->id;
                        $ledger->reason = 'refer_bonus';
                        $ledger->perticulation = 'Rebate First Level Commission Received';
                        $ledger->amount = $amount;
                        $ledger->debit = $amount;
                        $ledger->status = 'approved';
                        $ledger->step = 'first';
                        $ledger->date = date('d-m-Y H:i');
                        $ledger->save();

                        $second_ref = User::where('ref_id', $first_ref->ref_by)->first();
                        if ($second_ref && $rebate->earn_second_level > 0){
                            $amount = $earn_amount * $rebate->earn_second_level / 100;
                           
                            $wallet->creditAvailableBalance($second_ref, 2, "NGN", $amount);

                            $ledger = new UserLedger();
                            $ledger->user_id = $second_ref->id;
                            $ledger->get_balance_from_user_id = $user->id;
                            $ledger->reason = 'refer_bonus';
                            $ledger->perticulation = 'Rebate Second Level Commission Received';
                            $ledger->amount = $amount;
                            $ledger->debit = $amount;
                            $ledger->status = 'approved';
                            $ledger->step = 'second';
                            $ledger->date = date('d-m-Y H:i');
                            $ledger->save();

                            $third_ref = User::where('ref_id', $second_ref->ref_by)->first();
                            if ($third_ref && $rebate->earn_third_level > 0){
                                $amount = $earn_amount * $rebate->earn_third_level / 100;
                                
                                $wallet->creditAvailableBalance($third_ref, 2, "NGN", $amount);

                                $ledger = new UserLedger();
                                $ledger->user_id = $third_ref->id;
                                $ledger->get_balance_from_user_id = $user->id;
                                $ledger->reason = 'refer_bonus';
                                $ledger->perticulation = 'Rebate Third Level Commission Received';
                                $ledger->amount = $amount;
                                $ledger->debit = $amount;
                                $ledger->status = 'approved';
                                $ledger->step = 'third';
                                $ledger->date = date('d-m-Y H:i');
                                $ledger->save();
                            }
                        }
                    }
                }
            }
        } // End

        return response()->json(['status'=> true, 'message'=> 'Cronjob was successful run']);
    }


}
