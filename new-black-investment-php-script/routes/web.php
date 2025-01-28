<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BonusController;
use App\Http\Controllers\admin\CommonController;
use App\Http\Controllers\admin\DailyController;
use App\Http\Controllers\admin\ManageUserController;
use App\Http\Controllers\admin\ManageWithdrawController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\NoticeController;
use App\Http\Controllers\admin\PackageController;
use App\Http\Controllers\admin\PaymentMethodController;
use App\Http\Controllers\admin\RebateController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\VipController;
use App\Http\Controllers\admin\VipSliderController;
use App\Http\Controllers\user\BlogController;
use App\Http\Controllers\user\CronController;
use App\Http\Controllers\user\DepositController;
use App\Http\Controllers\user\GetBonusController;
use App\Http\Controllers\user\IpnOxaPayController;
use App\Http\Controllers\user\ProductController;
use App\Http\Controllers\user\PurchaseController;
use App\Http\Controllers\user\TaskController;
use App\Http\Controllers\user\TeamController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\WithdrawController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('clear', function () {
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    return 'Cached Clear';
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('tritonboss/')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });
    Route::get('login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('login', [AdminController::class, 'login_submit'])->name('admin.login-submit');
});

Route::prefix('admin/')->middleware('admin')->group(function () {
    Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    //All Table Status
    Route::post('/table/status', [CommonController::class, 'status']);

    //ADMIN PROFILE
    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('change/password', [AdminController::class, 'change_password'])->name('admin.changepassword');
    Route::post('check/password', [AdminController::class, 'check_password'])->name('admin.check.password');
    Route::post('change/password', [AdminController::class, 'change_password_submit'])->name('admin.changepasswordsubmit');
    Route::get('profile/update', [AdminController::class, 'profile_update'])->name('admin.profile.update');
    Route::post('profile/update', [AdminController::class, 'profile_update_submit'])->name('admin.profile.update-submit');

    //Notice
    Route::get('notice', [NoticeController::class, 'index'])->name('admin.notice.index');
    Route::get('notice/view/{id}', [NoticeController::class, 'view'])->name('admin.notice.view');
    Route::get('notice/create/{id?}', [NoticeController::class, 'create'])->name('admin.notice.create');
    Route::post('notice/insert-update', [NoticeController::class, 'insert_or_update'])->name('admin.notice.insert');
    Route::delete('notice/delete/{id}', [NoticeController::class, 'delete'])->name('admin.notice.delete');

    //Manage Customers
    Route::get('customers', [ManageUserController::class, 'customers'])->name('admin.customer.index');
    Route::get('customers/status/{id}', [ManageUserController::class, 'customersStatus'])->name('admin.customer.status');
    Route::get('customers/login/{id}', [ManageUserController::class, 'user_acc_login'])->name('admin.customer.login');
    Route::post('customers/change-password', [ManageUserController::class, 'user_acc_password'])->name('admin.customer.change-password');
    Route::get('search/user', [ManageUserController::class, 'search'])->name('admin.search.user');
    Route::get('search/user/action', [ManageUserController::class, 'searchSubmit'])->name('admin.search.submit');
    Route::post('provide/bonus/code', [ManageUserController::class, 'bonusCode'])->name('admin.customer.bonus');
    
    Route::get('customer/{id}', [ManageUserController::class, 'viewCustomer'])->name('admin.customer.update');
    Route::post('customer/update', [ManageUserController::class, 'editCustomer'])->name('admin.customer.update_submit');

    //Purchase Record
    Route::get('purchase/record', [ManageUserController::class, 'purchaseRecord'])->name('admin.purchase.index');

    // Package
    Route::get('package', [PackageController::class, 'index'])->name('admin.package.index');
    Route::get('package/create/{id?}', [PackageController::class, 'create'])->name('admin.package.create');
    Route::post('package/insert-update', [PackageController::class, 'insert_or_update'])->name('admin.package.insert');
    Route::delete('package/delete/{id}', [PackageController::class, 'delete'])->name('admin.package.delete');
    Route::get('package/view/{id}', [PackageController::class, 'view'])->name('admin.package.view');

    // VIP Category
    Route::get('vip/category', [VipController::class, 'category'])->name('admin.category.index');
    Route::get('vip/category/create/{id?}', [VipController::class, 'category_create'])->name('admin.category.create');
    Route::post('vip/category/insert-update', [VipController::class, 'category_insert_or_update'])->name('admin.category.insert');
    Route::delete('vip/category/delete/{id}', [VipController::class, 'category_delete'])->name('admin.category.delete');

    // VIP Type
    Route::get('vip/type', [VipController::class, 'type'])->name('admin.type.index');
    Route::get('vip/type/create/{id?}', [VipController::class, 'type_create'])->name('admin.type.create');
    Route::post('vip/type/insert-update', [VipController::class, 'type_insert_or_update'])->name('admin.type.insert');
    Route::delete('vip/type/delete/{id}', [VipController::class, 'type_delete'])->name('admin.type.delete');

    // DAILY TASK
    Route::get('daily/task', [DailyController::class, 'task'])->name('admin.task.index');
    Route::get('daily/task/create/{id?}', [DailyController::class, 'task_create'])->name('admin.task.create');
    Route::post('daily/task/insert-update', [DailyController::class, 'task_insert_or_update'])->name('admin.task.insert');
    Route::delete('daily/task/delete/{id}', [DailyController::class, 'task_delete'])->name('admin.task.delete');

    // DAILY CHECK-INS
    Route::get('daily/checkin', [DailyController::class, 'checkin'])->name('admin.checkin.index');
    Route::get('daily/checkin/create/{id?}', [DailyController::class, 'checkin_create'])->name('admin.checkin.create');
    Route::post('daily/checkin/insert-update', [DailyController::class, 'checkin_insert_or_update'])->name('admin.checkin.insert');
    Route::delete('daily/checkin/delete/{id}', [DailyController::class, 'checkin_delete'])->name('admin.checkin.delete');

    // BONUS
    Route::get('bonus', [BonusController::class, 'index'])->name('admin.bonus.index');
    Route::get('bonus/status/{id}', [BonusController::class, 'status'])->name('admin.bonus.status');
    Route::get('bonus/create/{id?}', [BonusController::class, 'create'])->name('admin.bonus.create');
    Route::post('bonus/insert-update', [BonusController::class, 'insert_or_update'])->name('admin.bonus.insert');
    Route::delete('bonus/delete/{id}', [BonusController::class, 'delete'])->name('admin.bonus.delete');
    Route::get('bonus/uses', [BonusController::class, 'bonuslist'])->name('admin.bonuslist.index');
    
     Route::get('balance-customization/{condition}', [ManageUserController::class, 'customizationBalance'])->name('admin.customization.balance');

    // slider
    Route::get('slider', [VipSliderController::class, 'index'])->name('admin.vipslider.index');
    Route::get('slider/create/{id?}', [VipSliderController::class, 'create'])->name('admin.vipslider.create');
    Route::post('slider/insert-update', [VipSliderController::class, 'insert_or_update'])->name('admin.vipslider.insert');
    Route::delete('slider/delete/{id}', [VipSliderController::class, 'delete'])->name('admin.vipslider.delete');

    //Payment
    Route::get('method', [PaymentMethodController::class, 'index'])->name('admin.method.index');
    Route::get('method/create/{id?}', [PaymentMethodController::class, 'create'])->name('admin.method.create');
    Route::post('method/insert-update', [PaymentMethodController::class, 'insert_or_update'])->name('admin.method.insert');
    Route::delete('method/delete/{id}', [PaymentMethodController::class, 'delete'])->name('admin.method.delete');

    //Handle Customer
    Route::get('customer/pending/payment', [ManageUserController::class, 'pendingPayment'])->name('admin.payment.pending');
    Route::get('customer/approved/payment', [ManageUserController::class, 'approvedPayment'])->name('admin.payment.approved');
    Route::get('customer/rejected/payment', [ManageUserController::class, 'rejectedPayment'])->name('admin.payment.rejected');
    Route::post('customer/payment/status/{id}', [ManageUserController::class, 'paymentStatus'])->name('payment.status.change');

    //Handle Customer Withdraw
    Route::get('customer/pending/withdraw', [ManageWithdrawController::class, 'pendingWithdraw'])->name('admin.withdraw.pending');
    Route::get('customer/approved/withdraw', [ManageWithdrawController::class, 'approvedWithdraw'])->name('admin.withdraw.approved');
    Route::get('customer/rejected/withdraw', [ManageWithdrawController::class, 'rejectedWithdraw'])->name('admin.withdraw.rejected');
    Route::post('customer/withdraw/status/{id}', [ManageWithdrawController::class, 'withdrawStatus'])->name('withdraw.status.change');

    //Settings
    Route::get('setting', [SettingController::class, 'index'])->name('admin.setting.index');
    Route::post('setting/insert-update', [SettingController::class, 'insert_or_update'])->name('admin.setting.insert');

    // Commission
    Route::get('commission', [RebateController::class, 'index'])->name('admin.rebate.index');
    Route::post('commission/insert-update', [RebateController::class, 'insert_or_update'])->name('admin.rebate.insert');

    // News
    Route::get('/news',  [NewsController::class, 'indexNormal'])->name("admin.news");
    Route::get('/news/create',  [NewsController::class, 'createNormal'])->name("admin.news.create");
    Route::post('/news/store',  [NewsController::class, 'storeNormal'])->name("admin.news.store");
    Route::get('/news/edit/{id}',  [NewsController::class, 'editNormal'])->name("admin.news.edit");
    Route::post('/news/update/{id}',  [NewsController::class, 'updateNormal'])->name("admin.news.update");
    Route::get('/news/delete/{id}',  [NewsController::class, 'deleteNormal'])->name("admin.news.delete");
});

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function(){
    return redirect()->route('login');
});

Route::get('email-verification-confirm/{e}', [UserController::class, 'emailVerification']);
Route::get('user-verification_time_out/{user_id}', [UserController::class, 'verification_time_out']);

Route::middleware(['auth', 'validity'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/product', [UserController::class, 'product'])->name('product');
    Route::get('my-profile', [UserController::class, 'profile'])->name('my.profile');

    // Recharge
    Route::get('recharge', [DepositController::class, 'index'])->name('user.onepay');
    Route::get('recharge/pay/{network?}', [DepositController::class, 'index'])->name('user.deposit.pay');
    Route::post('deposit-submit', [DepositController::class, 'depositSubmit'])->name('user.onepay.submit');

    //Withdraw
    Route::get('withdraw', [WithdrawController::class, 'withdraw'])->name('user.withdraw');
    Route::post('withdraw-confirm-submit', [WithdrawController::class, 'withdrawRequest'])->name('user.withdraw.request');

    // BONUS
    Route::post('submit-bonus', [GetBonusController::class, 'submitBonusCode'])->name('user.submit-bonus');
    Route::post('submit-secret_submit', [GetBonusController::class, 'secret_submit'])->name('user.secret_submit');
    Route::get('checkin', [GetBonusController::class, 'checkin'])->name('user.checkin');
    Route::post('checkin', [GetBonusController::class, 'checkinSubmit'])->name('user.checkin');

    // TASK
    Route::get('task', [TaskController::class, 'index'])->name('user.task');
    Route::post('task', [TaskController::class, 'taskSubmit'])->name('user.task');

    // Ledger
    Route::get('bonus/history', [UserController::class, 'bonus_ledger'])->name('user.bonus.ledger');
    Route::get('recharge/history', [UserController::class, 'payment_ledger'])->name('user.recharge.ledger');
    Route::get('withdraw/history', [UserController::class, 'withdraw_ledger'])->name('user.withdraw.ledger');
    Route::get('balance/history', [UserController::class, 'balance_ledger'])->name('balance.record');
    Route::get('balance/secret', [UserController::class, 'secret'])->name('user.secret');
    Route::get('my/password', [UserController::class, 'password'])->name('user.change-password');
    Route::post('my/change/password', [UserController::class, 'changepassword'])->name('user.change.password');

    // Purchase
    Route::get('purchase/{id}', [PurchaseController::class, 'purchase_vip'])->name('user.purchase.vip');
    Route::get('purchase/confirmation/{id?}', [PurchaseController::class, 'purchaseConfirmation'])->name('purchase.confirmation');

    // invite
    Route::get('/invite', [UserController::class, 'invite'])->name('user.invite');

    // Bank
    Route::get('/add/bank', [UserController::class, 'bankView'])->name('user.card');
    Route::post('/add/bank', [UserController::class, 'bankAdd'])->name('setup.gateway.submit');

    // Team
    Route::get('my-team/{id?}', [TeamController::class, 'team'])->name('user.team');
    Route::get('my-team-result/{ids}', [TeamController::class, 'team_result'])->name('user.refer-user-result');

    // Refer ledger
    Route::get('refer/ledger', [TeamController::class, 'refer_ledger'])->name('user.refer.ledeger');
    Route::get('subscribers/{step}', [TeamController::class, 'refer_subscribers'])->name('user.subscribers-details');

    // Income
    Route::get('invite', [UserController::class, 'share'])->name('share');
    Route::get('income', [ProductController::class, 'earning'])->name('earning');
    Route::post('received-amount', [ProductController::class, 'received_amount'])->name('user.received.amount');

    // Blog
    Route::get('news', [BlogController::class, 'index'])->name('user.blog');
    Route::get('news/{id?}', [BlogController::class, 'page'])->name('user.blog.page');

    // VIP
    Route::get('vip', [UserController::class, 'vip'])->name('user.vip');

});

// CronJob
Route::post('ipn/oxapa0023', [IpnOxaPayController::class, 'ipn'])->name('ipn.oxapay');
Route::get('cron0001', [CronController::class, 'daily']);
Route::get('cron0002', [CronController::class, 'days']);

require __DIR__.'/auth.php';

