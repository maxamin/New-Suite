<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public $route = 'admin.setting';
    public function index()
    {
        $data = Setting::find(1);
        $paymentMethod = PaymentMethod::where(['status' => 'active'])->get();
        return view('admin.pages.setting.index', compact('data', 'paymentMethod'));
    }

    public function insert_or_update(Request $request)
    {
        $model = Setting::findOrFail(1);
        $model->withdraw_charge = $request->withdraw_charge;
        $model->minimum_withdraw = $request->minimum_withdraw;
        $model->maximum_withdraw = $request->maximum_withdraw;
        $model->telegram = $request->telegram;
        $model->w_time_status = $request->w_time_status;
        $model->checkin = $request->checkin;
        $model->registration_bonus = $request->registration_bonus;
        $model->total_member_register_reword_amount = 0;
        $model->total_member_register_reword = 0;
        $model->auto_deposit = $request->auto_deposit;
        $model->auto_transfer = $request->auto_transfer;
        $model->auto_transfer_default = $request->auto_transfer_default;

        $model->update();
        return redirect()->route($this->route.'.index')->with('success', 'Settings Updated Successfully.');
    }
}
