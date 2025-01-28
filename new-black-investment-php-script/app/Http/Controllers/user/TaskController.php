<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Bonus;
use App\Models\BonusLedger;
use App\Models\Task;
use App\Models\TaskLedger;
use App\Models\User;
use App\Models\UserLedger;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/**
 * Laravel/Symfony Developer
 * Name: Muongozo
 * Telegram: @muongozotrader
 * Hire me via Telegram: muongozotrader
 */
class TaskController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $tasks = Task::where(['status' => 'active'])->get();
        $today = TaskLedger::where('user_id', $user->id)->where('created_at','>=', date("Y-m-d"))->count();
        $activeRefNumber = getActiveTodayRefMember($user->id);

        return view('app.main.tasks.index', compact('tasks', 'today', 'activeRefNumber'));
    }
    
    public function taskSubmit(Request $request)
    {
        try {

            // Validation
            $validate = Validator::make($request->all(), [
                'id' => 'required|numeric'
            ]);
    
            // Exception
            if ($validate->fails()) throw new \Exception(implode(',', $validate->errors()->all()));

            $user = Auth::user();
            
            // Find Task
            $task = Task::where(['id' => $request->id, 'status' => 'active'])->first();

            if(!$task) throw new \Exception("No checkin data");

            // Verify if Eligible
            if($task->vip != $user->vip && $task->for_vip) throw new \Exception("Your not eligible for this task");
            
            // Count total ref user today
            $countUser = getActiveTodayRefMember($user->id);

            // Verify Number
            if($countUser < $task->number) throw new \Exception('Sorry! Your not eligible. You have only invite '.$countUser.' friends.');

            // Check this user if already claimed
            $check = TaskLedger::where(['user_id'=> $user->id, 'task_id' => $task->id])->where('created_at','>=', date("Y-m-d"))->count();

            // Already Claimed
            if ($check) throw new \Exception('Sorry! You have already received your today reward');
            
    
            $checkAmount = $task->amount;
    
            // Create checkin record
            $model = new TaskLedger();
            $model->task_id = $task->id;
            $model->user_id = $user->id;
            $model->amount = $checkAmount;
            $model->save();
    
    
            // Added balance in user account
            User::where('id', $user->id)->update([
                'income'=> $user->income + $checkAmount
            ]);

            return response()->json(['status' => true, 'message' => 'Daily Task claimed successfully' ]);
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
