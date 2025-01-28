<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Rebate;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RebateController extends Controller
{
    public $route = 'admin.rebate';
    public function index()
    {
        $data = Rebate::find(1);
        return view('admin.pages.setting.rebate', compact('data'));
    }

    public function insert_or_update(Request $request)
    {
        $model = Rebate::findOrFail(1);
        $model->interest_commission1 = $request->interest_commission1;
        $model->interest_commission2 = $request->interest_commission2;
        $model->interest_commission3 = $request->interest_commission3;

        $model->interest_commission1_flat = $request->interest_commission1_flat;
        $model->interest_commission2_flat = $request->interest_commission2_flat;
        $model->interest_commission3_flat = $request->interest_commission3_flat;
        
        $model->earn_first_level = $request->earn_first_level;
        $model->earn_second_level = $request->earn_second_level;
        $model->earn_third_level = $request->earn_third_level;

        $model->update();
        return redirect()->back()->with('success', 'Commission Updated Successfully.');
    }
}
