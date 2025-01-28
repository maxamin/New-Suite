<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\BankList;
use App\Models\BonusLedger;
use App\Models\Category;
use App\Models\Deposit;
use App\Models\Package;
use App\Models\PaymentMethod;
use App\Models\Purchase;
use App\Models\Rebate;
use App\Models\Setting;
use App\Models\Task;
use App\Models\User;
use App\Models\UserLedger;
use App\Models\VipSlider;
use App\Models\VipType;
use App\Models\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = User::find(\auth()->user()->id);

        $packages = Package::where(['status' => 'active'])->get();

        $sliders = VipSlider::where(['page_type' => 'home_page', 'status' => 'active'])->get();

        $rebate = Rebate::first();
        $categorys = Category::where(['status' => 'active'])->get();
        $tasks = Task::where(['status' => 'active'])->take(2)->get();

        return view('app.main.home.index', compact('sliders', 'packages', 'rebate', 'sliders', 'categorys', 'tasks'));
    }
    public function vip()
    {
        $vips = VipType::where(['status' => 'active'])->get();
        return view('app.main.vip', compact('vips'));
    }

    public function profile()
    {
        $user = \auth()->user();
        $total_invest = Purchase::where('user_id', $user->id)->sum('amount');
        return view('app.main.mine.index', compact('total_invest'));
    }

    public function bonus_ledger()
    {
        $datas = BonusLedger::with(['bonus', 'user'])->where('user_id', Auth::id())->orderByDesc('id')->get();
        return view('app.main.bonus.history', compact('datas'));
    }

    public function payment_ledger()
    {
        $payments = Deposit::where('user_id', Auth::id())->orderByDesc('id')->get();
        return view('app.main.recharge.history', compact('payments'));
    }

    public function withdraw_ledger()
    {
        $withdraws = Withdrawal::with('payment_method')->where('user_id', Auth::id())->orderByDesc('id')->get();
        return view('app.main.withdraw.history', compact('withdraws'));
    }

    public function balance_ledger()
    {
        $pending_withdraw = Withdrawal::where('user_id', Auth::id())->where('status', 'pending')->orderByDesc('id')->get()->pluck('amount')->sum();
        $pending_payment = Deposit::where('user_id', Auth::id())->where('status', 'pending')->orderByDesc('id')->get()->pluck('amount')->sum();
        $transactions = UserLedger::where(['user_id' => Auth::id(), 'status' => 'approved'])->whereIn('reason', ['refer_bonus', 'withdraw_request'])->get();
        return view('app.main.balance_ledger', compact('pending_withdraw', 'pending_payment', 'transactions'));
    }

    public function secret()
    {
        return view('app.main.secret');
    }

    public function password()
    {
        return view('app.main.password');
    }

    public function changepassword(Request $request)
    {
        if (Hash::check($request->current_password, Auth::user()->password)){
            if ($request->new_password == $request->confirm_password)
            {
                User::where('id', Auth::id())->update([
                    'password'=> Hash::make($request->new_password)
                ]);
                return back()->with('error', 'Successfully changed.');
            }else{
                return back()->with('error', 'Confirm password does not match');
            }
        }else{
            return back()->with('error', 'Current password incorrect');
        }
    }

    public function emailVerification($email)
    {
        $email = base64_decode($email);
        $user = User::where('email', $email)->first();
        if ($user){
            return view('app.auth.verify', compact('user'));
        }else{
            return redirect()->route('register')->with('error','Registration failed. please try again');
        }
    }

    public function verification_time_out($user_id)
    {
        User::find($user_id)->delete();
        return redirect()->route('register')->with('error','Registration failed. please try again');
    }



    public function bankView()
    {
        $setting = Setting::first();
        $methods = PaymentMethod::where('status', 'active')->where('id', '!=', 4)->get()->unique('type');
        $bank_list = BankList::where(['country' => $setting->country, 'status' => 1])->get();

        return view('app.main.bank_setup', compact('methods', 'bank_list'));
    }



    public function bankAdd(Request $request)
    {
        $this->validate($request, [
            //'full_name' => 'required',
            'address' => 'required',
            'network' => 'required',
            'memo' => '',
            //'phone_number' => 'required',
            //'password' => 'required',
            'is_default' => ''
        ]);

        /*if (!\Hash::check($request->password, auth()->user()->password)) {
            return redirect()->back()->with("error", "Invalid login password");
        }*/

        // Find Bank List
        $bank_list = BankList::where(['bank_code' => $request->network, 'status' => 1])->first();

        // Exception
        if(!$bank_list) redirect()->back()->with("error", "Bank Name not available");

        $bank = Bank::where('user_id', auth()->user()->id)->first();
        if (!$bank) {
            $bank = new Bank();
        }
        $bank->full_name = $bank_list->name;
        $bank->bank_account = $request->address;
        $bank->bank_name = $bank_list->name;
        $bank->bank_code = $request->network;
        $bank->ifsc = $request->memo;
        //$bank->phone_number = $request->phone_number;
        $bank->is_default = ($request->is_default == 'on') ? 1 : 0;
        $bank->user_id = auth()->user()->id;

        if ($bank->save()) {
            return redirect()->back()->with("success", "Updated successfully");
        } else {
            return redirect()->back()->with("error", "Something went wrong. details not update yet.");
        }
    }

    public function invite()
    {
        $vips = Package::where('status', 'active')->get();
        $commissions = UserLedger::where('user_id', Auth::id())
            ->where('reason', '!=', 'vip_request')
            ->where('reason', '!=', 'purchase_package')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('app.main.invite', compact('vips', 'commissions'));
    }


    public function share()
    {
        $rebate = Rebate::first();
        return view('app.main.share', compact('rebate'));
    }


}
