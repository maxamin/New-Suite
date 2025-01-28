<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Bonus;
use App\Models\BonusLedger;
use App\Models\User;
use App\Models\UserLedger;
use Illuminate\Http\Request;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SpinController extends Controller
{
    public function spin()
    {
        return view('app.main.spin.index');
    }

    public function spin_history()
    {
        return view('app.main.spin_history');
    }

    public function submitBonusCodeconfirm(Request $request)
    {
        Validator::make($request->all(), [
            'code' => 'required'
        ]);
        
         $Purchase = Purchase::where('user_id', user()->id)->count();
        if($Purchase < 1){
                        return redirect()->back()->with('error', 'First you need to unlock a package');
        }


        $code = $request->code;
        $bonus = Bonus::where('status', 'active')->first();
        $user = Auth::user();
        if ($bonus) {
            if ($code == $bonus->code) {
                //Check this bonus use this user.
                $checkBonusUses = BonusLedger::where('bonus_id',$bonus->id)->where('user_id', $user->id)->first();
                if ($checkBonusUses){
                    return redirect()->back()->with('success', 'You have already used this bonus code.');
                }

                if ($bonus->counter < $bonus->set_service_counter) {
                    User::where('id', $user->id)->update([
                        'balance'=> $user->balance + $bonus->amount
                    ]);

                    //User Ledger
                    $ledger = new UserLedger();
                    $ledger->user_id = $user->id;
                    $ledger->reason = 'rebate';
                    $ledger->perticulation = 'congratulations '.$user->name. ' successfully';
                    $ledger->amount = $bonus->amount;
                    $ledger->debit = $bonus->amount;
                    $ledger->status = 'approved';
                    $ledger->date = date('d-m-Y H:i');
                    $ledger->save();

                    Bonus::where('id', $bonus->id)->update([
                        'counter'=> $bonus->counter + 1
                    ]);

                    $bonus_ledger = new BonusLedger();
                    $bonus_ledger->user_id = $user->id;
                    $bonus_ledger->bonus_id = $bonus->id;
                    $bonus_ledger->bonus_code = $request->code;
                    $bonus_ledger->save();
                    return redirect()->back()->with('success', 'Successfully get your promotion bonus.');
                } else {
                    return redirect()->back()->with('success', 'Today our Earned Target Bonus members use it');
                }
            } else {
                return redirect()->back()->with('success', 'The code you entered is invalid');
            }
        } else {
            return redirect()->back()->with('success', 'Code not found');
        }
    }



    public function submitbonusamount()
    {
        $amount = rand(5, 15);
        $user = Auth::user();
        $isPremium = Purchase::where('user_id', $user->id)->where('amount', '>', 0)->count();
        if ($isPremium > 0) {
            $bonusTime = BonusLedger::where('user_id', $user->id)->orderByDesc('id')->first();
            if (now()->greaterThanOrEqualTo($bonusTime->date)){
                $bonus_ledger = new BonusLedger();
                $bonus_ledger->user_id = $user->id;
                $bonus_ledger->date = now()->addHours(24);
                $bonus_ledger->amount = $amount;
                $bonus_ledger->save();

                $user->balance = $user->balance + $amount;
                $user->save();

                return response()->json(['status' => false, 'message' => 'congratulations you '. price($amount) .' received']);
            }else{
                return response()->json(['status' => false, 'message' => 'You can get this bonus once per day']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'First you buy a plan']);
        }
    }
}
