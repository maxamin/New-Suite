<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\BonusLedger;
use App\Models\Checkin;
use App\Models\Commission;
use App\Models\Deposit;
use App\Models\Fund;
use App\Models\Improvment;
use App\Models\Mining;
use App\Models\Notice;
use App\Models\Package;
use App\Models\PaymentMethod;
use App\Models\Purchase;
use App\Models\Task;
use App\Models\TaskRequest;
use App\Models\User;
use App\Models\UserLedger;
use App\Models\VipSlider;
use App\Models\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('app.main.index');
    }
    public function apiPayment(Request $request)
    {
        $model = new Deposit();

        $path = uploadImage(false ,$request, 'photo', 'upload/package/', 200, 200 ,$model->photo);
        $model->photo = $path ?? $model->photo;

        $model->user_id = auth()->id();
        $model->method_name = $request->channel;
        $model->address = $request->address;
        $model->order_id = rand(0,999999);
        $model->transaction_id = $request->transaction;
        $model->amount = $request->amount;
        $model->date = date('d-m-Y H:i:s');
        $model->status = 'pending';
        $model->save();

        return redirect('deposit')->with('success', 'Successful');
    }

    public function single_deposit__pay($amount, $channel)
    {
        $channel = PaymentMethod::where('name', $channel)->first();

        return view('app.main.deposit.recharge_confirm', compact('amount', 'channel'));
    }
    public function return_pay_number($method){
        $method = DB::table('payment_methods')->where('type', $method)->inRandomOrder()->first();
        return response()->json(['status'=> true, 'data'=> $method]);
    }

    public function rechargeApi(Request $request)
    {
        if (Deposit::where('order_id', $request->oid)->first()){
            return response()->json(['status', false, 'message'=> 'Submitted successfully']);
        }
        if ($request->has('amount') && $request->has('channel') && $request->has('transaction_id') && $request->has('number') && $request->has('uid')){
            $model = new Deposit();
            $model->user_id = $request->uid;
            $model->channel = $request->channel;
            $model->number = $request->number;
            $model->order_id = $request->oid;
            $model->transaction_id = $request->transaction_id;
            $model->amount = $request->amount;
            $model->date = date('d-m-Y H:i:s');
            $model->status = 'pending';
            $model->save();
            return response()->json(['status', true, 'message'=> 'Submitted successfully']);
        }
    }

    public function apply_task_commission($task_id){
        $task = Task::where('id', $task_id)->first();
        $apply = TaskRequest::where('task_id', $task_id)->where('user_id', auth()->id())->first();
        if ($apply){
            return redirect('task')->with('success', 'Already you have received the reward');
        }

        if ($task){
            $referUser = User::where('ref_by', auth()->user()->ref_id)->where('investor', 1)->get();
            if ($referUser->count() >= $task->team_size){
                $model = new TaskRequest();
                $model->task_id = $task->id;
                $model->user_id = auth()->id();
                $model->team_invest = $task->invest;
                $model->team_size = $task->team_size;
                $model->save();

                $ledger = new UserLedger();
                $ledger->user_id = auth()->id();
                $ledger->reason = 'rebate';
                $ledger->perticulation = 'Team Investor Reward received successful';
                $ledger->amount = $task->bonus;
                $ledger->debit = $task->bonus;
                $ledger->status = 'approved';
                $ledger->date = now();
                $ledger->save();

                $auth = auth()->user();
                $auth->balance = $auth->balance + $task->bonus;
                $auth->save();

                return redirect('task')->with('success', 'Request sent successful.');
            }else{
                return redirect('task')->with('error', 'Please improve your team.');
            }
        }
        return back();
    }


    public function vip()
    {
        return view('app.main.vip');
    }


    public function bill()
    {
        return view('app.main.bill');
    }


    public function vip_details($id)
    {
        $package = Package::where('id', $id)->first();
        return view('app.main.vip_details', compact('package'));
    }

    public function message()
    {
        return view('app.main.message');
    }

    public function purchase_history()
    {
        return view('app.main.purchase_history');
    }

    public function history()
    {
        return view('app.main.history');
    }

    public function history_all()
    {
        return view('app.main.history_all');
    }

    public function ordered()
    {
        return view('app.main.ordered');
    }


    public function exchange()
    {
        return view('app.main.exchange');
    }

    public function checkin()
    {
        $user = \auth()->user();
        if ($user->checkin > 0){
            $checkin = new Checkin();
            $checkin->user_id = $user->id;
            $checkin->date = date('Y-m-d');
            $checkin->amount = $user->checkin;
            $checkin->save();

            $userUpdate = User::where('id', $user->id)->first();
            $userUpdate->balance = $user->balance + $user->checkin;
            $userUpdate->checkin = 0;
            $userUpdate->save();

            $ledger = new UserLedger();
            $ledger->user_id = $user->id;
            $ledger->reason = 'checkin';
            $ledger->perticulation = 'checkin commission received';
            $ledger->amount = $user->checkin;
            $ledger->debit = $user->checkin;
            $ledger->status = 'approved';
            $ledger->step = 'third';
            $ledger->date = date('d-m-Y H:i');
            $ledger->save();

            return response()->json(['message'=>'Check-in balance received.']);
        }else{
            return response()->json(['message'=>'Check-in balance 0']);
        }
    }

    public function vip_commission()
    {
        return view('app.main.vip_commission');
    }

    public function task()
    {
        $user = Auth::user();
        //First Level Users
        $first_level_users = User::where('ref_by', $user->ref_id)->get();
        $first_level_users_ids = [];
        foreach ($first_level_users as $user) {
            array_push($first_level_users_ids, $user->id);
        }

        //Second Level Users
        $second_level_users_ids = [];
        foreach ($first_level_users as $element) {
            $users = User::where('ref_by', $element->ref_id)->get();
            foreach ($users as $user) {
                array_push($second_level_users_ids, $user->id);
            }
        }
        $second_level_users = User::whereIn('id', $second_level_users_ids)->get();

        //Third Level Users
        $third_level_users_ids = [];
        foreach ($second_level_users as $element) {
            $users = User::where('ref_by', $element->ref_id)->get();
            foreach ($users as $user) {
                array_push($third_level_users_ids, $user->id);
            }
        }
        $third_level_users = User::whereIn('id', $third_level_users_ids)->get();
        $team_size = $first_level_users->count() + $second_level_users->count() + $third_level_users->count();

        //Get level wise user ids
        $first_ids = $first_level_users->pluck('id'); //first
        $second_ids = $second_level_users->pluck('id'); //Second
        $third_ids = $third_level_users->pluck('id'); //Third

        $lv1Recharge = Deposit::whereIn('user_id', $first_ids)->where('status', 'approved')->sum('amount');
        $lv2Recharge = Deposit::whereIn('user_id', $second_ids)->where('status', 'approved')->sum('amount');
        $lv3Recharge = Deposit::whereIn('user_id', $third_ids)->where('status', 'approved')->sum('amount');
        $lvTotalDeposit = $lv1Recharge + $lv2Recharge + $lv3Recharge;

        $lv1Withdraw = Withdrawal::whereIn('user_id', $first_ids)->where('status', 'approved')->sum('amount');
        $lv2Withdraw = Withdrawal::whereIn('user_id', $second_ids)->where('status', 'approved')->sum('amount');
        $lv3Withdraw = Withdrawal::whereIn('user_id', $third_ids)->where('status', 'approved')->sum('amount');
        $lvTotalWithdraw = $lv1Withdraw + $lv2Withdraw + $lv3Withdraw;

        $activeMembers1 = Deposit::whereIn('user_id', $first_ids)->where('status', 'approved')->groupBy('user_id')->count();
        $activeMembers2 = Deposit::whereIn('user_id', $second_ids)->where('status', 'approved')->groupBy('user_id')->count();
        $activeMembers3 = Deposit::whereIn('user_id', $third_ids)->where('status', 'approved')->groupBy('user_id')->count();


        $Lv1active = 0;
        $Lv2active = 0;
        $Lv3active = 0;

        foreach ($first_level_users as $uuss) {
            $purchase = Purchase::where('user_id', $uuss->id)->first();
            if ($purchase) {
                $Lv1active = $Lv1active + 1;
            }
        }
        foreach ($second_level_users as $uuss) {
            $purchase = Purchase::where('user_id', $uuss->id)->first();
            if ($purchase) {
                $Lv2active = $Lv2active + 1;
            }
        }
        foreach ($third_level_users as $uuss) {
            $purchase = Purchase::where('user_id', $uuss->id)->first();
            if ($purchase) {
                $Lv3active = $Lv3active + 1;
            }
        }

        $teamTotalActiveMembers = $Lv1active + $Lv2active + $Lv3active;


        return view('app.main.task', compact('team_size', 'teamTotalActiveMembers', 'lv1Recharge', 'lv2Recharge', 'lv3Recharge', 'lv1Withdraw', 'lv2Withdraw', 'lv3Withdraw', 'first_level_users', 'second_level_users', 'third_level_users'));
    }

    public function task_history()
    {
        return view('app.main.task_history');
    }

    public function reword_history()
    {
        return view('app.main.reword_history');
    }

    public function recharge_history()
    {
        return view('app.main.deposit_history');
    }

    public function commission()
    {
        return view('app.main.commission');
    }

    public function amount_history()
    {
        return view('app.main.amount_history');
    }

    public function package_details($id)
    {
        $package = Package::find($id);
        return view('app.main.package_details', compact('package'));
    }

    public function profile()
    {
        return view('app.main.profile');
    }

    public function team()
    {
        return view('app.main.team.index');
    }


    public function setting()
    {
        return view('app.main.mine.setting');
    }

    public function recharge()
    {
        return view('app.main.deposit.index');
    }

    public function recharge_amount($oid, $amount, $root_url, $number_url, $uid)
    {
        session()->put('root_url', base64_decode($root_url));
        session()->put('number_url', base64_decode($number_url));
        session()->put('amount', $amount);
        session()->put('oid', $oid);
        session()->put('uid', $uid);
        return view('app.main.deposit.payment-method', compact('amount', 'oid'));
    }

    public function payment_confirm($amount, $channel, $number)
    {
        return view('app.main.deposit.payment-confirm', compact('amount', 'channel', 'number'));
    }

    public function depositSubmit(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'acc_acount' => 'required',
            'amount' => 'required',
            'payment_method' => 'required',
            'transaction_id' => 'required',
            'photo' => 'required',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors());
        }

        $model = new Deposit();
        $model->user_id = Auth::id();

        $path = uploadImage(false ,$request, 'photo', 'upload/payment/', 200, 200 ,$model->photo);
        $model->photo = $path ?? $model->photo;

        $model->method_name = $request->payment_method;
        $model->method_number = $request->acc_acount;
        $model->order_id = rand(00000,99999);
        $model->transaction_id = $request->transaction_id;
        $model->amount = $request->amount;
        $model->final_amount = $request->amount;
        $model->date = date('d-m-Y H:i:s');
        $model->status = 'pending';
        $model->save();
        return redirect()->route('user.deposit')->with('success', 'Successful');
    }

    public function update_profile(Request $request)
    {
        $user = User::find(Auth::id());
        $path = uploadImage(false, $request, 'photo', 'upload/profile/', 200, 200, $user->photo);
        $user->photo = $path ?? $user->photo;

        $user->update();
        return redirect()->route('my.profile')->with('success', 'Successful');
    }

    public function personal_details()
    {
        return view('app.main.update_personal_details');
    }

    public function card()
    {
        $methods = PaymentMethod::where('status', 'active')->where('id', '!=', 4)->get();

        return view('app.main.gateway_setup', compact('methods'));
    }

    public function setupGateway(Request $request)
    {
        if ($request->name == '' || $request->gateway_method == '' || $request->gateway_number == '' || $request->password == ''){
            return redirect()->back()->with('success', 'Please enter correct wallet information');
        }
        User::where('id', Auth::id())->update([
            'name' => $request->name,
            'gateway_method' => $request->gateway_method,
            'gateway_number' => $request->gateway_number,
            'withdraw_password' => $request->password,
        ]);
        return redirect()->back()->with('success', 'Your e-wallet information updated');
    }

    public function invite()
    {
        return view('app.main.invite');
    }

    public function level()
    {
        return view('app.main.level');
    }


    public function service()
    {
        return view('app.main.service');
    }


    public function appreview()
    {
        return view('app.main.appreview');
    }

    public function rule()
    {
        return view('app.main.rule');
    }

    public function partner()
    {
        return view('app.main.partner');
    }

    public function climRecord()
    {
        return view('app.main.climRecord');
    }

    public function add_bank_create()
    {
        return view('app.main.add_bank_create');
    }

    public function setting_change_password(Request $request)
    {
        //Check current password
        $user = User::find(Auth::id());
        if (Hash::check($request->old_password, $user->password)) {
            if ($request->new_password == $request->confirm_password) {
                $user->password = Hash::make($request->new_password);
                $user->update();
                return redirect()->route('login_password')->with('success', 'Password changed');
            } else {
                return redirect()->route('login_password')->with('success', 'Password not match.');
            }
        } else {
            return redirect()->route('login_password')->with('success', 'Password not match');
        }
    }

    public function confirm_submit(Request $request)
    {
        $data = $request->all();
        $model = new Deposit();
        $model->user_id = $data['ui'];
        $model->method_name = $data['pm'];
        $model->method_number = '01000000000';
        $model->order_id = $data['oid'];
        $model->transaction_id = $data['tid'];
        $model->number = $data['aca'];
        $model->amount = $data['amount'];
        $model->final_amount = $data['amount'];
        $model->usdt = $data['amount'] / setting('rate');
        $model->date = Carbon::now();
        $model->status = 'pending';
        $model->save();
        return response()->json(['status' => true, 'data' => $data]);
    }

    public function download_apk()
    {
        $file = public_path('pfizer.apk');
        return response()->file($file, [
            'Content-Type' => 'application/vnd.android.package-archive',
            'Content-Disposition' => 'attachment; filename="pfizer.apk"',
        ]);
    }

    // Introduced Modules

    public function generateWalletAddress(Request $request)
    {
        $user = $request->user();

        if (!$user->wallet_address) {
            $merchantApiKey = env('OXAPAY_MERCHANT_API_KEY');

            $callbackUrl = route('wallet.callback', ['userId' => $user->id]);

            $response = Http::post('https://api.oxapay.com/merchants/request/staticaddress', [
                'merchant' => $merchantApiKey,
                'network' => 'trc20',
                'currency' => 'USDT',
                'callbackUrl' => $callbackUrl
            ]);

            if ($response->successful()) {
                $responseData = $response->json();

                if ($responseData['result'] == 100) {
                    $user->update(['wallet_address' => $responseData['address']]);
                } else {
                    return response()->json(['error' => $responseData['message']], 500);
                }
            } else {
                return response()->json(['error' => 'Failed to generate wallet address'], $response->status());
            }
        }

        return view('app.main.deposit.index', ['walletAddress' => $user->wallet_address]);
    }


       public function paymentCallback(Request $request, $userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $hmacHeader = $request->header('Hmac');
        
        if (!$this->validateHmac($request->getContent(), $hmacHeader)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $paymentData = $request->all();

        $status = ($paymentData['status'] === 'Paid') ? 'approved' : 'pending';

        $transaction = Deposit::updateOrCreate(
            ['transaction_id' => $paymentData['txID']],
            [
                'user_id' => $userId,
                'method_name' => $paymentData['currency'],
                'order_id' => $paymentData['orderId'] ?? rand(0, 999999) . rand(0, 999999),
                'amount' => number_format($paymentData['amount'], 2),
                'final_amount' => number_format($paymentData['amount'], 2),
                'date' => date('Y-m-d H:i:s', $paymentData['date']),
                'status' => $status,
            ]
        );

        if ($status === 'approved') {
            // Update user balance
            $user->balance += $transaction->amount;
            $user->save();

            $ledger = new UserLedger();
            $ledger->user_id = $userId;
            $ledger->reason = 'user_deposit';
            $ledger->perticulation = 'User deposit using Automatic Gateway';
            $ledger->amount = $transaction->amount;
            $ledger->debit = $transaction->amount;
            $ledger->status = 'approved';
            $ledger->date = date('Y-m-d H:i:s', $paymentData['date']);
            $ledger->save();
        }

        Log::info('Payment received for user ' . $userId . ':', $paymentData);

        return response()->json(['message' => 'Payment status stored'], 200);
    }

    private function validateHmac($data, $hmacHeader)
    {
        $secretKey =  env('OXAPAY_MERCHANT_API_KEY');
         // Calculate HMAC
        $calculatedHmac = hash_hmac('sha512', $data, $secretKey);
        
        return $calculatedHmac === $hmacHeader;
    }
    
    public function getUserBalance()
    {
        $balance = Auth::user()->balance;

        return response()->json(['balance' => $balance]);
    }
}









