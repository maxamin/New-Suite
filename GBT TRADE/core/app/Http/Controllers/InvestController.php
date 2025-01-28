<?php


namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\TradeLevel;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvestController extends Controller
{

    public function aiSmartTrade(){
        $pageTitle = 'Ai Smart Trade';
        $user = Auth::user();
        $levels = TradeLevel::get();
        $todayAiProfit = Transaction::where('user_id', $user->id)
            ->where('remark', 'ai_trade')
            ->whereDate('created_at', Carbon::today())
            ->orderBy('id', 'DESC')
            ->first();
        return view('templates.basic.user.invest.index', compact('pageTitle', 'user', 'levels', 'todayAiProfit'));
    }

    public function aiTradeOn(Request $request){
        $user = Auth::user();
        if(!$user->level_id){
            return response()->json(['msg'=>'Deposit Minimum Amount for Upgrading your level!', 'cls'=>'warning']);
        }

        $user->isTrading = 1; //ai Trading On
        $user->tradingDate = Carbon::tomorrow();
        $user->save();
        return response()->json(['msg'=>'Ai Trading On Successfully!', 'cls'=>'success']);
    }

    // ai trade collect bonus
    public function aiCollectBonus(Request $request){
        $user = Auth::user();

        if (!$user->isTrading) {
            $msg = 'You have Already Collect Todays Profit!';
            return response()->json(['msg'=>$msg, 'cls'=>'error']);
        }

        if ($user->level_id) {
            $percent = $user->level->profit;
            $profit = getAmount($user->level->min * ($percent/100));
            if ( $user->level->type == '+') {
                $user->balance += $profit;
            }else {
                $user->balance -= $profit;
            }

            $trx         = getTrx();
            $transaction = new Transaction();
            $transaction->user_id = $user->id;
            $transaction->amount = $profit;
            $transaction->post_balance = $user->balance;
            $transaction->charge = 0;

            if ( $user->level->type == '+') {
                $transaction->trx_type = '+';
            }else {
                $transaction->trx_type = '-';
            }

            $transaction->trx_logo = 'ads_logo.png';
            $transaction->details = 'Ai Trading Reward';
            $transaction->trx = $trx;
            $transaction->remark = 'ai_trade';
            $transaction->save();

            levelCommission($user, $profit, 'ptc_view_commission', $trx); // reffer bonus
        }

        $user->isTrading = 0; //ai Trading On
        $user->save();



        $msg = 'Ai Trading Profit Collected Successfully!';
        return response()->json(['msg'=>$msg, 'cls'=>'success', 'profit'=>$profit, 'user'=>$user, 'type'=>$transaction->trx_type]);
    }





    //cron
    public function getInvestBonus(){
        $min_amount = 0;
        $users = User::where('status',1)->where('balance', '>', $min_amount)->get();

        $percent = 5;

        foreach ($users as $key => $user) {
            $profit = $user->balance * ($percent/100);
            $user->balance += $profit;
            $user->save();
        }

        return 'Execute';
    }

    // set user trade level cron
    public function setUserLevel(){

        $min = TradeLevel::whereNotNull('min')->min("min");

        $levels = TradeLevel::get();
        foreach ($levels as $key => $lev) {
            $users = User::where('status',1)->where('balance', '>=', $lev->min)->where('balance', '<=', $lev->max)->get();

            //set level
            foreach ($users as $key => $user) {
                $user->level_id = $lev->id;
                $user->save();
            }

            // remove level
            $nousers = User::where('balance', '<', $min)->get();
            foreach ($nousers as $nouser) {
                $nouser->level_id = 0;
                $nouser->save();
            }
        }

        return 'Execute';
    }
}
