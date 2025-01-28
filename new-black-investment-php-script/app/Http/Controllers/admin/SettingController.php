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
        $timezones = json_decode(file_get_contents(resource_path('views/admin/partials/timezone.json')));
        $paymentMethod = PaymentMethod::where(['open_payout' => 1, 'status' => 'active'])->get();
        return view('admin.pages.setting.index', compact('data', 'timezones', 'paymentMethod'));
    }

    public function insert_or_update(Request $request)
    {
        $this->validate($request,[
            'site_name'=> 'required',
            'site_title'=> 'required',
            'cur_text'=> 'required',
            'cur_sym'=> 'required',
            'timezone'=> 'required',
        ]);
        $model = Setting::findOrFail(1);

        $path = uploadImage(false ,$request, 'logo', 'upload/setting/', null, null ,$model->logo);
        $path1 = uploadImage(false ,$request, 'favicon', 'upload/setting/', null, null ,$model->favicon);
        $model->logo = $path ?? $model->logo;
        $model->favicon = $path1 ?? $model->favicon;

        $model->site_name = $request->site_name;
        $model->site_title = $request->site_title;
        $model->cur_text = $request->cur_text;
        $model->cur_sym = $request->cur_sym;
        //$model->company_dob = $request->company_dob;
        $model->welcome_bonus = $request->welcome_bonus;

        $model->checkin_bonus = $request->checkin_bonus;
        $model->telegram = $request->telegram;
        $model->whatsapp = $request->whatsapp;
        //$model->telegram_channel = $request->telegram_channel;

        //$model->task_summery = $request->task_summery;

        //$model->minimum_withdraw_usdt = $request->minimum_withdraw_usdt;
        //$model->maximum_withdraw_usdt = $request->maximum_withdraw_usdt;
        //$model->withdraw_charge_usdt = $request->withdraw_charge_usdt;
        $model->rate = $request->rate;
        $model->about = $request->about;
        $model->popup_message = $request->popup_message;
        $model->income_summery = $request->income_summery;
        $model->purchase_summery = $request->purchase_summery;
        $model->recharge_notice = $request->recharge_notice;
        $model->withdraw_notice = $request->withdraw_notice;
        $model->invite_summery = $request->invite_summery;
        $model->invite_summery_2 = $request->invite_summery_2;
        $model->invite_summery_3 = $request->invite_summery_3;
        $model->w_one = $request->w_one;
        $model->w_two = $request->w_two;
        //$model->w_three = $request->w_three;

        $model->open_deposit = $request->open_deposit;
        $model->open_payout = $request->open_payout;

        $model->auto_deposit = $request->auto_deposit;
        $model->auto_transfer = $request->auto_transfer;
        $model->auto_transfer_default = $request->auto_transfer_default;

        // ADMIN CONFIG SETTING
        $settingFile = config_path('adminsettings.php');
        $content = '<?php 
                        $currency = [
                            "cur_text" => "'.$request->cur_text.'",
                            "cur_sym" => "'.$request->cur_sym.'"
                        ];
                        $timezone = '.$request->timezone.';
                    ?>';
        file_put_contents($settingFile, $content);

        $model->update();
        return redirect()->route($this->route.'.index')->with('success', 'Settings Updated Successfully.');
    }
}
