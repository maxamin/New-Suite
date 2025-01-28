<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CheckinType;
use App\Models\Task;
use App\Models\TaskType;
use App\Models\VipType;
use Illuminate\Http\Request;

/**
 * Laravel/Symfony Developer
 * Name: Muongozo
 * Telegram: @muongozotrader
 * Hire me via Telegram: muongozotrader
 */
class DailyController extends Controller
{
    ################################ TASK #########################################
    public function task()
    {
        $tasks = Task::get();
        return view('admin.pages.daily.task.index', compact('tasks'));
    }
    public function task_create($id=null)
    {
        $data = null;
        if ($id){
            $data = Task::find($id);
        }
        $vipTypes = VipType::get();
        $types = TaskType::get();
        
        return view('admin.pages.daily.task.insert', compact('data', 'vipTypes', 'types'));
    }

    public function task_insert_or_update(Request $request)
    {
        $this->validate($request,[
            'type_id'=> 'required',
            'for_vip'=> 'required',
            'vip_id'=> 'required',
            'name'=> 'required',
            'number'=> 'required',
            'amount'=> 'required',
            'text_desc'=> 'required',
            'status'=> 'required'
        ]);

        $isUpdate = true;

        if ($request->id){
            $model = Task::findOrFail($request->id);
        }else{
            $isUpdate = false;
            $model = new Task();
        }
        $model->type_id = $request->type_id;
        $model->for_vip = $request->for_vip;
        $model->vip_id = $request->vip_id;
        $model->name = $request->name;
        $model->number = $request->number;
        $model->amount = $request->amount;
        $model->text_desc = $request->text_desc;
        $model->status = $request->status;
        $model->save();
        
        // Return for Update
        if($isUpdate) return redirect()->back()->with('success', $request->id ? 'Updated Successful.' : 'Created Successful.');

        // Return for new created
        return redirect()->route('admin.task.index')->with('success', $request->id ? 'Updated Successful.' : 'Created Successful.');
    }

    public function task_delete($id)
    {
        $model = Task::find($id);
        $model->delete();
        return redirect()->route('admin.task.index')->with('success','Deleted Successful.');
    }
    ################################ TASK #########################################

    ################################ CHECK-INS #########################################
    public function checkin()
    {
        $checkins = CheckinType::get();
        return view('admin.pages.daily.checkin.index', compact('checkins'));
    }
    public function checkin_create($id=null)
    {
        $data = null;
        if ($id){
            $data = CheckinType::find($id);
        }
        $vipTypes = VipType::get();
        
        return view('admin.pages.daily.checkin.insert', compact('data', 'vipTypes'));
    }

    public function checkin_insert_or_update(Request $request)
    {
        $this->validate($request,[
            'vip_id'=> 'required',
            'name'=> 'required',
            'amount'=> 'required',
            'text_desc'=> 'required',
            'status'=> 'required'
        ]);

        $isUpdate = true;

        if ($request->id){
            $model = CheckinType::findOrFail($request->id);
        }else{
            $isUpdate = false;
            $model = new CheckinType();
        }
        $model->vip_id = $request->vip_id;
        $model->name = $request->name;
        $model->amount = $request->amount;
        $model->text_desc = $request->text_desc;
        $model->status = $request->status;
        $model->save();
        
        // Return for Update
        if($isUpdate) return redirect()->back()->with('success', $request->id ? 'Updated Successful.' : 'Created Successful.');

        // Return for new created
        return redirect()->route('admin.checkin.index')->with('success', $request->id ? 'Updated Successful.' : 'Created Successful.');
    }

    public function checkin_delete($id)
    {
        $model = CheckinType::find($id);
        $model->delete();
        return redirect()->route('admin.checkin.index')->with('success','Deleted Successful.');
    }
    ################################ CHECK-INS #########################################
}
