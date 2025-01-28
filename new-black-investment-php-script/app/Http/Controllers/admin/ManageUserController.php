<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminLedger;
use App\Models\Bonus;
use App\Models\Deposit;
use App\Models\Purchase;
use App\Models\Usdt;
use App\Models\User;
use App\Models\UserLedger;
use App\Models\VipType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ManageUserController extends Controller
{
    public function customers()
    {
        $users = User::where('id', '!=', '1')->orderByDesc('id')->paginate(20);
        return view('admin.pages.users.users', compact('users'));
    }
    
    public function customizationBalance(Request $request, $condion)
    {
        $user = User::where('id', $request->user_id)->orderByDesc('id')->first();
        
        if($user){
            if($condion == 'plus'){
                $user->balance = $user->balance + $request->plus;
                $user->save();
            }
            if($condion == 'minus'){
                $user->balance = $user->balance - $request->minus;
                $user->save();
            }
        }
        
        return back()->with('success', 'Balance customization success');
    }


    public function customersStatus($id)
    {
        $user = User::find($id);
        if ($user->status == 'active') {
            $user->status = 'inactive';
        } else {
            $user->status = 'active';
        }
        $user->update();
        return redirect()->back()->with('success', 'Successfully changed user status.');
    }

    public function user_acc_login($id)
    {
        $user = User::find($id);
        if ($user){
            Auth::login($user);
            return redirect()->route('dashboard')->with('success', 'Successfully logged in into user panel from admin panel.');
        }else{
            abort(403);
        }
    }

    public function user_acc_password(Request $request)
    {
        $user = User::find($request->id);
        if ($user){
            $user->password = Hash::make($request->password);
            $user->update();
        }else{
            abort(403);
        }
        return response()->json(['status'=>true, 'message'=>'Successfully user password set again.']);
    }

    public function pendingPayment()
    {
        $title = 'Pending';
        $payments = Deposit::with('user')->where('status', 'pending')->orderByDesc('id')->get();
        return view('admin.pages.payment.list', compact('payments', 'title'));
    }

    public function rejectedPayment()
    {
        $title = 'Rejected';
        $payments = Deposit::with('user')->where('status', 'rejected')->orderByDesc('id')->get();
        return view('admin.pages.payment.list', compact('payments', 'title'));
    }

    public function approvedPayment()
    {
        $title = 'Approved';
        $payments = Deposit::with('user')->where('status', 'approved')->orderByDesc('id')->get();
        return view('admin.pages.payment.list', compact('payments', 'title'));
    }

    public function paymentStatus(Request $request, $id)
    {
        $payment = Deposit::find($id);
        if ($request->status == 'approved'){
            $user = User::find($payment->user_id);
            $user->balance += $payment->final_amount;
            $user->update();

            Admin::where('id', Admin::select('id')->first()->id)->update([
                'balance' => Admin::select('balance')->first()->balance + $payment->charge_amount
            ]);

            $ledger = new AdminLedger();
            $ledger->admin_id = Admin::first()->id;
            $ledger->reason = 'payment_'.'charge';
            $ledger->perticulation = 'Payment approval charge';
            $ledger->amount = $payment->amount;
            $ledger->debit = $payment->charge_amount;
            $ledger->status = $request->status;
            $ledger->date = date('d-m-Y H:i');
            $ledger->save();

            // Upgrade User VIP if eligible
            upgradeVIP($user->id);
        }
        $ledger = new UserLedger();
        $ledger->user_id = $payment->user_id;
        $ledger->reason = 'payment_'.$request->status;
        $ledger->perticulation = 'Your payment already '.$request->status. '. thanks for invest in our '.env('APP_NAME');
        $ledger->amount = $payment->amount;
        $ledger->debit = $request->status == 'approved' ? $payment->final_amount : 0;
        $ledger->status = $request->status;
        $ledger->date = date('d-m-Y H:i');
        $ledger->save();

        $payment->status = $request->status;
        $payment->feedback = $request->note;
        $payment->update();
        return redirect()->back()->with('success', 'Payment status change successfully.');
    }

    public function search()
    {
        return view('admin.pages.users.search');
    }

    public function searchSubmit(Request $request)
    {
        if ($request->search) {
            $user = User::where('username', $request->search)->orWhere('phone', $request->search)->orWhere('ref_id', $request->search)->orWhere('name', $request->search)->first();
            if ($user) {
                return view('admin.pages.users.search', compact('user'));
            }
        }
        return redirect()->route('admin.search.user')->with('error', 'OOPs User not found.');
    }

    public function purchaseRecord()
    {
        $purchases = Purchase::with(['user', 'package'])->orderByDesc('id')->paginate(25);
        return view('admin.pages.users.purchase-record', compact('purchases'));
    }

    //Bonus
    public function bonusCode(Request $request)
    {
        $bonus = Bonus::where('code', trim($request->bonus))->first();
        if ($bonus){
            if ($bonus->status == 'active'){
                User::where('id', $request->id)->update([
                    'bonus_code'=> trim($request->bonus)
                ]);
                return response()->json(['status'=>true, 'message'=>'Successfully sent bonus code.']);
            }else{
                return response()->json(['status'=>true, 'message'=>'Bonus code not activate.']);
            }
        }else{
            return response()->json(['status'=>true, 'message'=>'Bonus not found.']);
        }
    }


    public function usdtPayment()
    {
        $title = 'USDT ';
        return view('admin.pages.payment.usdt', compact('title'));
    }

    public function usdtPaymentChangeStatus($id, $status)
    {
        $usdt = Usdt::with('user')->find($id);

        if ($status == 'approved' && $usdt->status != 'approved'){
            User::where('id', $usdt->user->id)->update(['balance'=> ($usdt->amount * setting('rate')) + $usdt->user->balance]);
            $usdt->status = 'approved';
            $usdt->update();
        }
        if ($status == 'rejected'){
            if ($usdt->status == 'approved')
            {
                User::where('id', $usdt->user->id)->update(['balance'=> $usdt->user->balance - ($usdt->amount * setting('rate'))]);
            }
            $usdt->status = 'rejected';
            $usdt->update();
        }
        return back()->with('success', 'Status changed successful.');
    }

    public function viewCustomer(Request $request)
    {
        $user = User::find($request->id);

        //Verify User
        if(!$user) return redirect()->route('admin.customer.index')->with('success', 'User not found.');

        $vipTypes = VipType::where(['status' => 'active'])->get();

        $title = 'Update User @'.$user->username;
        return view('admin.pages.users.update', compact('title', 'user', 'vipTypes'));
    }

    public function editCustomer(Request $request)
    {
        $user = User::find($request->id);

        //Verify User
        if(!$user) return redirect()->route('admin.customer.index')->with('success', 'User not found.');

        // Update
        $user->vip_id = $request->vip_id;
        $user->balance = $request->balance;
        $user->income = $request->income;
        $user->open_deposit = $request->open_deposit;
        $user->open_payout = $request->open_payout;
        $user->status = $request->status;
        $user->receive_able_amount = $request->receive_able_amount;
        $user->receive_daily_earn = $request->receive_daily_earn;
        $user->update();
        return redirect()->back()->with('success', 'User updated.');
    }
}
