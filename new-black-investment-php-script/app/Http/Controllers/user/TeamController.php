<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Purchase;
use App\Models\Rebate;
use App\Models\User;
use App\Models\UserLedger;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    //
    /*public function team()
    {
        //First Level
        $first_level_users = User::where('ref_by', auth()->user()->ref_id)->get();


        //Get Second Level
        $second_level_users_ids = [];
        foreach ($first_level_users as $element) {
            $users = User::where('ref_by', $element->ref_id)->get();
            foreach ($users as $user){
                array_push($second_level_users_ids, $user->id);
            }
        }
        $second_level_users = User::whereIn('id', $second_level_users_ids)->get();

        //Get Third Level
        $third_level_users_ids = [];
        foreach ($second_level_users as $element) {
            $users = User::where('ref_by', $element->ref_id)->get();
            foreach ($users as $user){
                array_push($third_level_users_ids, $user->id);
            }
        }
        $third_level_users = User::whereIn('id', $third_level_users_ids)->get();

        //Get Team Size
        $team_size = $first_level_users->count() + $first_level_users->count() + $third_level_users->count();

        //Get level wise user ids
        $first_ids = $first_level_users->pluck('id'); //first
        $second_ids = $second_level_users->pluck('id'); //Second
        $third_ids = $third_level_users->pluck('id'); //Third

        //Get withdrawals History
        //First Total Withdraw
        $first_total_withdraw = Withdrawal::whereIn('user_id', $first_ids)->where('status', 'approved')->get()->pluck('amount')->toArray();
        $first_total_withdraw_amount = array_sum($first_total_withdraw);

        //Second Total Withdraw
        $second_total_withdraw = Withdrawal::whereIn('user_id', $second_ids)->where('status', 'approved')->get()->pluck('amount')->toArray();
        $second_total_withdraw_amount = array_sum($second_total_withdraw);

        //Third Total Withdraw
        $third_total_withdraw = Withdrawal::whereIn('user_id', $third_ids)->where('status', 'approved')->get()->pluck('amount')->toArray();
        $third_total_withdraw_amount = array_sum($third_total_withdraw);

        //Get Payment History
        //First Total Payment
  
        $first_total_payment = Deposit::whereIn('user_id', $first_ids)->where('status', 'approved')->get()->pluck('amount')->toArray();
     $first_total_payment = array_sum($first_total_payment);

        //Second Total Payment
        $second_total_payment = Deposit::whereIn('user_id', $second_ids)->where('status', 'approved')->get()->pluck('amount')->toArray();
        $second_total_payment = array_sum($second_total_payment);

        //Third Total Payment
        $third_total_payment = Deposit::whereIn('user_id', $third_ids)->where('status', 'approved')->get()->pluck('amount')->toArray();
        $third_total_payment = array_sum($third_total_payment);

        //total commission
        $getTotalCommission1 = UserLedger::where('user_id', Auth::id())->where('reason', 'sponsor_bonus')->where('status', 'approved')->get()->pluck('amount')->sum();
        $getTotalCommission2 = UserLedger::where('user_id', Auth::id())->where('reason', 'refer_bonus')->where('status', 'approved')->get()->pluck('amount')->sum();
        $getTotalCommission = $getTotalCommission1 + $getTotalCommission2;
        // return $getTotalCommission;

        //First, Second, Third total income
        $firstSponsorLedger = UserLedger::where('user_id', Auth::id())->where('reason', 'sponsor_bonus')->where('status', 'approved')->where('step', 'first')->get()->pluck('amount')->sum();
        $firstReferLedger = UserLedger::where('user_id', Auth::id())->where('reason', 'refer_bonus')->where('status', 'approved')->where('step', 'first')->get()->pluck('amount')->sum();
        $first = $firstSponsorLedger + $firstReferLedger;

        $secondSponsorLedger = UserLedger::where('user_id', Auth::id())->where('reason', 'sponsor_bonus')->where('status', 'approved')->where('step', 'second')->get()->pluck('amount')->sum();
        $secondReferLedger = UserLedger::where('user_id', Auth::id())->where('reason', 'refer_bonus')->where('status', 'approved')->where('step', 'second')->get()->pluck('amount')->sum();
        $second = $secondSponsorLedger + $secondReferLedger;

        $thirdSponsorLedger = UserLedger::where('user_id', Auth::id())->where('reason', 'sponsor_bonus')->where('status', 'approved')->where('step', 'third')->get()->pluck('amount')->sum();
        $thirdReferLedger = UserLedger::where('user_id', Auth::id())->where('reason', 'refer_bonus')->where('status', 'approved')->where('step', 'third')->get()->pluck('amount')->sum();
        $third = $thirdSponsorLedger + $thirdReferLedger;


        return view('app.main.team.index',
            compact(
                'first_level_users',
                'second_level_users',
                'third_level_users',
                'team_size',
                'first_total_withdraw_amount',
                'second_total_withdraw_amount',
                'third_total_withdraw_amount',
                'first_total_payment',
                'second_total_payment',
                'third_total_payment',
                'first_ids',
                'second_ids',
                'third_ids',
                'getTotalCommission',
                'first',
                'second',
                'third',
            ));
    }


    public function team_result($ids)
    {
        if ($ids){
            $ids = decrypt($ids);
            $users = User::whereIn('id', $ids)->get();
        }
        return  view('app.main.team.list', compact('users'));
    }*/

    public function team($lev_id = 1){
        $user = Auth::user();

        $code = auth()->user()->ref_id;
        $date = date("Y-m-d");

        // FIRST LEVEL
        $firstLevel = User::where("ref_by", $code)->get();
        $firstLevel1 = User::where("ref_by", $code)->whereDate("created_at", "=", $date)->count();

        $rebate = \App\Models\Rebate::first();

        // Second LEVEL
        $totalTeamMember = 0;
        $todaytotalRecharge = 0;
        $ActiveMemberstotal = 0;
        $todayInvest = 0;
        $totalInvest = 0;
        $todayCommission = 0;
        $totalCommission = 0;
        $levelUsers = array();
        $commission_rate = 0;

        if($firstLevel){

            // GET all users
            if($lev_id == 1) {
                $levelUsers = $firstLevel;
                $commission_rate = $rebate->interest_commission1;
            }

            foreach($firstLevel as $user2){

                // Selected level
                if($lev_id == 1) {

                    $totalTeamMember++;
                    $todayInvestsum = Purchase::where("user_id", $user2->id)->whereDate("created_at", "=", $date)->sum('amount');
                    $todayInvest += $todayInvestsum;

                    $totalInvestsum = Purchase::where("user_id", $user2->id)->sum('amount');
                    $totalInvest += $totalInvestsum;

                    $todaCommissionsum = UserLedger::where("get_balance_from_user_id", $user2->id)->whereIn('reason', ['refer_bonus', 'commission'])->whereDate("created_at", "=", $date)->sum('amount');
                    $todayCommission += $todaCommissionsum;

                    $totalCommissionsum = UserLedger::where("get_balance_from_user_id", $user2->id)->whereIn('reason', ['refer_bonus', 'commission'])->sum('amount');
                    $totalCommission += $totalCommissionsum;

                    // Subquery to get the latest purchase ID for each user_id
                    $subQuery = Purchase::select('user_id', \DB::raw('MAX(id) as max_id'))
                    ->where('user_id', $user2->id)
                    ->groupBy('user_id');

                    // Main query to join with the subquery and get the full purchase records
                    $ActiveMembers = Purchase::joinSub($subQuery, 'latest', function ($join) {
                    $join->on('purchases.id', '=', 'latest.max_id');
                    })->get();

                    if($ActiveMembers){
                        foreach ($ActiveMembers as $key => $ActiveMembersvalue) {

                            $ActiveMemberstotal++;
                        }
                    }
                }


                $user2 = User::where("ref_by", $user2->ref_id)->get();
                //
                if($user2){
                    foreach($user2 as $user){
                        $secondLevel[] = $user;
                    }
                }
            }
        }

        // SECOND LEVEL
        $thirdLevel = array();
        if(isset($secondLevel) && count($secondLevel) > 0){

            // GET all users
            if($lev_id == 2) {
                $levelUsers = $secondLevel;
                $commission_rate = $rebate->interest_commission2;
            }

            foreach($secondLevel as $user3){
                
                // Selected level
                if($lev_id == 2) {
                    $totalTeamMember++;

                    $todayInvestsum = Purchase::where("user_id", $user3->id)->whereDate("created_at", "=", $date)->sum('amount');
                    $todayInvest += $todayInvestsum;

                    $totalInvestsum = Purchase::where("user_id", $user3->id)->sum('amount');
                    $totalInvest += $totalInvestsum;

                    $todaCommissionsum = UserLedger::where("get_balance_from_user_id", $user3->id)->whereIn('reason', ['refer_bonus', 'commission'])->whereDate("created_at", "=", $date)->sum('amount');
                    $todayCommission += $todaCommissionsum;

                    $totalCommissionsum = UserLedger::where("get_balance_from_user_id", $user3->id)->whereIn('reason', ['refer_bonus', 'commission'])->sum('amount');
                    $totalCommission += $totalCommissionsum;

                    // Subquery to get the latest purchase ID for each user_id
                    $subQuery = Purchase::select('user_id', \DB::raw('MAX(id) as max_id'))
                    ->where('user_id', $user3->id)
                    ->groupBy('user_id');

                    // Main query to join with the subquery and get the full purchase records
                    $ActiveMembers = Purchase::joinSub($subQuery, 'latest', function ($join) {
                    $join->on('purchases.id', '=', 'latest.max_id');
                    })->get();

                    if($ActiveMembers){
                        foreach ($ActiveMembers as $key => $ActiveMembersvalue) {

                            $ActiveMemberstotal++;
                        }
                    }
                }




                $user4 = User::where("ref_by", $user3->ref_id)->get();
                // $firstLevel1 += User::where("invite_code", $user3->my_invite_code)->whereDate("created_at", "=", $date)->count();
                if($user4){
                    foreach($user4 as $user){
                        $thirdLevel[] = $user;
                        //$totalTeamMember++;
                    }
                }
            }
        }

        // THIRD LEVEL
        $fourthLevel = array();
        if(isset($thirdLevel) && count($thirdLevel) > 0){

            // GET all users
            if($lev_id == 3) {
                $levelUsers = $thirdLevel;
                $commission_rate = $rebate->interest_commission3;
            }

            foreach($thirdLevel as $user5){
                
                // Selected level
                if($lev_id == 3) {
                    $totalTeamMember++;
                    
                    $todayInvestsum = Purchase::where("user_id", $user5->id)->whereDate("created_at", "=", $date)->sum('amount');
                    $todayInvest += $todayInvestsum;

                    $totalInvestsum = Purchase::where("user_id", $user5->id)->sum('amount');
                    $totalInvest += $totalInvestsum;

                    $todaCommissionsum = UserLedger::where("get_balance_from_user_id", $user5->id)->whereIn('reason', ['refer_bonus', 'commission'])->whereDate("created_at", "=", $date)->sum('amount');
                    $todayCommission += $todaCommissionsum;

                    $totalCommissionsum = UserLedger::where("get_balance_from_user_id", $user5->id)->whereIn('reason', ['refer_bonus', 'commission'])->sum('amount');
                    $totalCommission += $totalCommissionsum;


                    // Subquery to get the latest purchase ID for each user_id
                    $subQuery = Purchase::select('user_id', \DB::raw('MAX(id) as max_id'))
                    ->where('user_id', $user5->id)
                    ->groupBy('user_id');

                    // Main query to join with the subquery and get the full purchase records
                    $ActiveMembers = Purchase::joinSub($subQuery, 'latest', function ($join) {
                    $join->on('purchases.id', '=', 'latest.max_id');
                    })->get();

                    if($ActiveMembers){
                        foreach ($ActiveMembers as $key => $ActiveMembersvalue) {

                            $ActiveMemberstotal++;
                        }
                    }
                }




                $user6 = User::where("ref_by", $user5->ref_id)->get();

                // $firstLevel1 += User::where("invite_code", $user5->my_invite_code)->whereDate("created_at", "=", $date)->count();
                if($user6){
                    foreach($user6 as $user){
                        $fourthLevel[] = $user;
                    }
                }
            }
        }
        
        $rebate = Rebate::first();
        return view('app.main.team.index',compact('lev_id','todayInvest','totalInvest','todayCommission','totalCommission', 'totalTeamMember', 'levelUsers', 'ActiveMemberstotal', 'commission_rate', 'rebate'));
    }


    public function refer_ledger()
    {
        //Start First Level
        $first_level_users = User::where('ref_by', auth()->user()->ref_id)->get();

        //check subscriber and unsubscribe
        $subscriber = 0;
        foreach ($first_level_users as $user)
        {
            $aa = Purchase::where('user_id', $user->id )->where('package_id', '!=', 1)->first();

            if ($aa){
                $subscriber += 1;
            }
        }
        $unsubscribe = $first_level_users->count() > 0 ? $first_level_users->count() - $subscriber : 0;
        //End First Level

        //Get Second Level
        $second_level_users_ids = [];
        foreach ($first_level_users as $element) {
            $users = User::where('ref_by', $element->ref_id)->get();
            foreach ($users as $user){
                array_push($second_level_users_ids, $user->id);
            }
        }
        $second_level_users = User::whereIn('id', $second_level_users_ids)->get();
        //check subscriber and unsubscribe
        $seondSubscriber = 0;
        foreach ($second_level_users as $element)
        {
            $aa = Purchase::where('user_id',$element->id )->where('package_id', '!=', 1)->get()->pluck('user_id')->toArray();

            $seondSubscriber += count(array_unique($aa));
        }
        $secondUnsubscribe = $second_level_users->count() > 0 ? $second_level_users->count() - $subscriber : 0;
        //End First Level


        //Get Third Level
        $third_level_users_ids = [];
        foreach ($second_level_users as $element) {
            $users = User::where('ref_by', $element->ref_id)->get();
            foreach ($users as $user){
                array_push($third_level_users_ids, $user->id);
            }
        }
        $third_level_users = User::whereIn('id', $third_level_users_ids)->get();

        //check subscriber and unsubscribe
        $thirdSubscriber = 0;
        foreach ($third_level_users as $element)
        {
            $aa = Purchase::where('user_id',$element->id )->where('package_id', '!=', 1)->get()->pluck('user_id')->toArray();
            $thirdSubscriber += count(array_unique($aa));
        }
        $thirdUnsubscribe = $third_level_users->count() > 0 ? $third_level_users->count() - $subscriber : 0;
        //End First Level

        return  view('app.main.refer_ledger', compact('third_level_users',
            'second_level_users','first_level_users', 'subscriber',
            'unsubscribe', 'seondSubscriber', 'secondUnsubscribe', 'thirdSubscriber', 'thirdUnsubscribe',
        ));
    }

    public function refer_subscribers($step)
    {
        //Start First Level User Calculate
        $first_level_users = User::where('ref_by', auth()->user()->ref_id)->get();
        if ($step == 'first-all'){
            $subscribers = Purchase::with(['user', 'package'])
                ->whereIn('user_id', $first_level_users->pluck('id')->toArray())
                ->get();
            $title = 'First Level';
            return  view('app.main.refer_subscribers', compact('subscribers', 'title'));
        }

        //Get Second Level
        $second_level_usersArray = [];
        foreach ($first_level_users as $element) {
            $users = User::where('ref_by', $element->ref_id)->get();
            foreach ($users as $user){
                array_push($second_level_usersArray, $user->id);
            }
        }
        $second_level_users = User::whereIn('id', $second_level_usersArray)->get();

        if ($step == 'second-all'){
            $subscribers = Purchase::with(['user', 'package'])
                ->whereIn('user_id', $second_level_usersArray)
                ->get();
            $title = 'Second Level Subscriber';
            return  view('app.main.refer_subscribers', compact('subscribers', 'title'));
        }

        //Get Third Level
        $third_level_usersArray = [];
        foreach ($second_level_users as $element) {
            $users = User::where('ref_by', $element->ref_id)->get();
            foreach ($users as $user){
                array_push($third_level_usersArray, $user->id);
            }
        }

        if ($step == 'third-all'){
            $subscribers = Purchase::with(['user', 'package'])
                ->whereIn('user_id', $third_level_usersArray)
                ->get();
            $title = 'Third Level Subscriber';
            return  view('app.main.refer_subscribers', compact('subscribers', 'title'));
        }

//
//
//
//
//
//        //Start First Level
//        $first_level_users = User::where('ref_by', auth()->user()->ref_id)->get();
//        $first_subscribers = [];
//        foreach ($first_level_users as $element)
//        {
//            $f_subscribers = Purchase::with('user')
//                ->where('user_id',$element->id )
//                ->where('package_id', '!=', 1)
//                ->get();
//            foreach ($f_subscribers as $l){
//                array_push($first_subscribers, $l->user->id);
//            }
//        }
//        $subscribers = User::whereIn('id', array_unique($first_subscribers))->get();
//
//        if ($step == 'first'){
//            return  view('app.main.refer_subscribers', compact('subscribers'));
//        }
//
//        if ($step = 'first-all'){
//            $first_subscribers = [];
//            $f_subscribers = Purchase::with('user')
//                ->where('user_id',$element->id )
//                ->get();
//            foreach ($f_subscribers as $l){
//                array_push($first_subscribers, $l->user->id);
//            }
//            return  view('app.main.refer_subscribers', compact('subscribers'));
//        }
//
//
//
//        //Get Second Level
//        $second_subscribers = [];
//        foreach ($first_level_users as $element) {
//            $users = User::where('ref_by', $element->ref_id)->get();
//            foreach ($users as $user){
//                array_push($second_subscribers, $user->id);
//            }
//        }
//        $second_level_users = User::whereIn('id', $second_subscribers)->get();
//        //check subscriber and unsubscribe
//        foreach ($second_level_users as $element)
//        {
//            $s_subscribers = Purchase::with('user')
//                ->where('user_id',$element->id )
//                ->where('package_id', '!=', 1)
//                ->get();
//            foreach ($s_subscribers as $l){
//                array_push($second_subscribers, $l->user->id);
//            }
//
//        }
//        $subscribers = User::whereIn('id', array_unique($second_subscribers))->get();
//        //End Second Level
//        if ($step == 'second'){
//            return  view('app.main.refer_subscribers1', compact('subscribers'));
//        }
//
//
//        //Get Third Level
//        $third_subscribers = [];
//        foreach ($subscribers as $element) {
//            $users = User::where('ref_by', $element->ref_id)->get();
//            foreach ($users as $user){
//                array_push($third_subscribers, $user->id);
//            }
//        }
//        $third_level_users = User::whereIn('id', $third_subscribers)->get();
//
//        //check subscriber and unsubscribe
//        $thirdSubscriber = [];
//        foreach ($third_level_users as $element)
//        {
//            $s_subscribers = Purchase::with('user')
//                ->where('user_id',$element->id )
//                ->where('package_id', '!=', 1)
//                ->get();
//            foreach ($s_subscribers as $l){
//                array_push($thirdSubscriber, $l->user->id);
//            }
//        }
//        $subscribers = User::whereIn('id', array_unique($thirdSubscriber))->get();
//        if ($step == 'third'){
//            return  view('app.main.refer_subscribers2', compact('subscribers'));
//        }
    }
}
