<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Bonus;
use App\Models\BonusLedger;
use App\Models\Checkin;
use App\Models\CheckinType;
use App\Models\User;
use App\Models\UserLedger;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GetBonusController extends Controller
{
    public function checkin()
    {
        $user = Auth::user();

        $checkins = CheckinType::where(['status' => 'active'])->get();
        $today = Checkin::where('user_id', $user->id)->where('created_at','>=', date("Y-m-d"))->count();
        return view('app.main.bonus.checkin', compact('checkins', 'today'));
    }
    
    public function checkinSubmit(Request $request)
    {
        try {

            // Validation
            $validate = Validator::make($request->all(), [
                'id' => 'required|numeric'
            ]);
    
            // Exception
            if ($validate->fails()) throw new \Exception(implode(',', $validate->errors()->all()));

            $user = Auth::user();
            
            // Find Type
            $type = CheckinType::where(['id' => $request->id, 'status' => 'active'])->first();

            if(!$type) throw new \Exception("No checkin data");

            // Verify if Eligible
            if($type->vip != $user->vip) throw new \Exception("Your not eligible for this offer");
            
            // check this user already check it
            $check = Checkin::where('user_id', $user->id)->where('created_at','>=', date("Y-m-d"))->count();

            // Already Claimed
            if ($check) throw new \Exception('Sorry! You have already received your today reward');
            
    
            $checkAmount = $type->amount;
    
            // Create checkin record
            $model = new Checkin();
            $model->type_id = $request->id;
            $model->user_id = $user->id;
            $model->date = Carbon::now();
            $model->amount = $checkAmount;
            $model->save();
    
    
            // Added balance in user account
            User::where('id', $user->id)->update([
                'income'=> $user->income + $checkAmount
            ]);

            // Create Ledger
            $ledger = new UserLedger();
            $ledger->user_id = $user->id;
            $ledger->reason = 'get_bonus';
            $ledger->perticulation = 'Checkin was successfully';
            $ledger->amount = $checkAmount;
            $ledger->credit = $checkAmount;
            $ledger->status = 'approved';
            $ledger->date = date('d-m-Y H:i');
            $ledger->save();

            return response()->json(['status' => true, 'message' => 'Daily checkin claimed successfully' ]);
        } catch (\Exception $th) {
            //throw $th;
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        }
    }

    public function submitBonusCode(Request $request)
    {
        Validator::make($request->all(), [
            'bonus_code' => 'required'
        ]);

        $code = $request->bonus_code;
        $bonus = Bonus::where('status', 'active')->first();
        $user = Auth::user();
        if ($bonus) {
            if ($code == $bonus->code) {
                //Check this bonus use this user.
                $checkBonusUses = BonusLedger::where('bonus_id',$bonus->id )->where('user_id', $user->id)->first();
                if ($checkBonusUses){
                    return response()->json(['status' => false, 'message' => 'You are already use this bonus code.']);
                }

                $amount = $bonus->amount;

                if ($bonus->counter < $bonus->set_service_counter) {
                    User::where('id', $user->id)->update([
                        'income'=> $user->income + $amount
                    ]);

                    //User Ledger
                    $ledger = new UserLedger();
                    $ledger->user_id = $user->id;
                    $ledger->reason = 'get_bonus';
                    $ledger->perticulation = 'Congratulations '.$user->name. ' you are successfully get your bonus.';
                    $ledger->amount = $amount;
                    $ledger->debit = $amount;
                    $ledger->status = 'approved';
                    $ledger->date = date('d-m-Y H:i');
                    $ledger->save();

                    Bonus::where('id', $bonus->id)->update([
                        'counter'=> $bonus->counter + 1
                    ]);

                    $bonus_ledger = new BonusLedger();
                    $bonus_ledger->user_id = $user->id;
                    $bonus_ledger->bonus_id = $bonus->id;
                    $bonus_ledger->bonus_code = $request->bonus_code;
                    $bonus_ledger->amount = $bonus->amount;
                    $bonus_ledger->save();

                    return response()->json(['status' => true, 'message' => 'Congratulations. get '.price($amount) ]);
                } else {
                    return response()->json(['status' => false, 'message' => 'Our targeted member fulfil.']);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Bonus code invalid. '.$request->bonus_code]);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Bonus not available.']);
        }
    }

    public function preview()
    {
        $datas = BonusLedger::with(['bonus', 'user'])->where('user_id', Auth::id())->orderByDesc('id')->get();
        return view('app.main.bonus.bonus-preview', compact('datas'));
    }
}
