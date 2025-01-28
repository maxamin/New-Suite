<?php


use App\Http\Controllers\InvestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\User\UserController;

/*****************/
/* Cron Jobs Links
/*****************/
Route::prefix('cron')->name('cron.')->group(function(){
    // sent bonus cron //
    Route::get('get-invest-bonus', [InvestController::class, 'getInvestBonus'])->name('get.invest.bonus'); //optional

    // set level cron
    Route::get('set-user-level', [InvestController::class, 'setUserLevel'])->name('set.user.level');

    //add coin balance cron
    Route::get('add-coin-balance', [UserController::class, 'addCoinBalance'])->name('add.coin.balance');
});

Route::middleware('web2')->prefix('user')->group(function(){
    Route::namespace('User\Auth')->name('user.')->group(function () {

        Route::controller('LoginController')->group(function(){
            Route::get('/login', 'showLoginForm')->name('login');
            Route::post('/login', 'login');
            Route::get('logout', 'logout')->name('logout');
        });

        //new signup
        Route::get('signup/{ref_code?}', [OtpController::class, 'otpPage'])->name('signup');
        Route::post('signup/otp', [OtpController::class, 'otpstore'])->name('otp.store');
        Route::post('signup/submit', [OtpController::class, 'signupSubmit'])->name('signup.submit');
        //otp-template
        Route::get('otp-template', [OtpController::class, 'otpTemplate'])->name('otp.template');
        //send otp mail
        Route::get('send-otp-to-mail', [OtpController::class, 'sendOtpMail'])->name('send.otp.mail');


        Route::controller('RegisterController')->group(function(){
            Route::get('register', 'showRegistrationForm')->name('register');
            Route::post('register', 'register');
            // Route::post('register', 'register')->middleware('registration.status');
            Route::get('register/{reference}', 'referralRegister')->name('refer.register');
            Route::post('check-mail', 'checkUser')->name('checkUser');
        });

        Route::controller('ForgotPasswordController')->group(function(){
            Route::get('password/reset', 'showLinkRequestForm')->name('password.request');
            Route::post('password/email', 'sendResetCodeEmail')->name('password.email');
            Route::get('password/code-verify', 'codeVerify')->name('password.code.verify');
            Route::post('password/verify-code', 'verifyCode')->name('password.verify.code');
        });
        Route::controller('ResetPasswordController')->group(function(){
            Route::post('password/reset', 'reset')->name('password.update');
            Route::get('password/reset/{token}', 'showResetForm')->name('password.reset');
        });
    });

    Route::middleware('auth')->name('user.')->group(function () {
        //authorization
        Route::namespace('User')->controller('AuthorizationController')->group(function(){

            Route::get('analytics', 'ProfileController@analytics')->name('analytics');

            Route::get('display-profile', 'ProfileController@display_profile')->name('display_profile');

            Route::get('authorization', 'authorizeForm')->name('authorization');
            Route::get('resend-verify/{type}', 'sendVerifyCode')->name('send.verify.code');
            Route::post('verify-email', 'emailVerification')->name('verify.email');
            Route::post('verify-mobile', 'mobileVerification')->name('verify.mobile');
            Route::post('verify-g2fa', 'g2faVerification')->name('go2fa.verify');
        });

        Route::middleware(['check.status'])->group(function () {

            Route::get('user-data', 'User\UserController@userData')->name('data');
            Route::post('user-data-submit', 'User\UserController@userDataSubmit')->name('data.submit');

            Route::middleware('registration.complete')->namespace('User')->group(function () {

                Route::controller('UserController')->group(function(){
                    Route::get('dashboard', 'home')->name('home');

                    //userInfo
                    Route::get('user-info', 'userInfo')->name('userinfo');

                    //runTask
                    Route::post('run-task', 'runTask')->name('runtask');

                    //2FA
                    Route::get('twofactor', 'show2faForm')->name('twofactor');
                    Route::post('twofactor/enable', 'create2fa')->name('twofactor.enable');
                    Route::post('twofactor/disable', 'disable2fa')->name('twofactor.disable');

                    //KYC
                    Route::get('kyc-form','kycForm')->name('kyc.form');
                    Route::get('kyc-data','kycData')->name('kyc.data');
                    Route::post('kyc-submit','kycSubmit')->name('kyc.submit');

                    //Report
                    Route::any('deposit/history', 'depositHistory')->name('deposit.history');
                    Route::get('commissions', 'commissions')->name('commissions');
                    Route::get('referred-users/{level?}', 'referredUsers')->name('referred');
                    Route::get('attachment-download/{fil_hash}','attachmentDownload')->name('attachment.download');

                    //Transactions
                    Route::get('transactions','transactions')->name('transactions');

                    //Plans
                    Route::post('plans/buy','buyPlan')->name('buyPlan');
                    Route::post('plans/stop','stopPlan')->name('stopPlan');

                    //Balance Transfer
                    Route::get('transfer-balance','transfer')->name('transfer.balance');
                    Route::post('transfer-balance','transferSubmit')->name('transfer.submit');
                });

                //Profile setting
                Route::controller('ProfileController')->group(function(){
                    Route::get('profile-setting', 'profile')->name('profile.setting');
                    Route::post('profile-setting', 'submitProfile')->name('profile.submit');
                    Route::get('address-setting', 'Address')->name('address.setting');
                    Route::post('address-setting', 'submitAddress')->name('address.submit');
                    Route::get('change-password', 'changePassword')->name('change.password');
                    Route::post('change-password', 'submitPassword')->name('password.submit');
                    // withdraw pin
                    Route::get('withdraw-password', 'withdrawPassword')->name('withdraw.password');
                    Route::post('withdraw-password', 'submitWithdrawPassword')->name('withdraw.password.submit');
                    // withdraw wallet
                    Route::get('withdraw-wallet', 'withdrawWallet')->name('withdraw.wallet');
                    Route::post('withdraw-wallet', 'submitWithdrawWallet')->name('withdraw.wallet.submit');

                    Route::post('ajax-profile-photo', 'AjaxProfilePhoto')->name('profile.photo');
                    Route::post('ajax-cover-photo', 'AjaxCoverPhoto')->name('cover.photo');
                });


                // Withdraw
                Route::controller('WithdrawController')->prefix('withdraw')->name('withdraw')->group(function(){
                    Route::middleware('kyc')->group(function(){
                        Route::get('/', 'withdrawMoney');
                        Route::post('/', 'withdrawStore')->name('.money');
                        Route::get('preview', 'withdrawPreview')->name('.preview');
                        Route::post('preview', 'withdrawSubmit')->name('.submit');
                    });
                    Route::get('history', 'withdrawLog')->name('.history');
                });

                //PTC
                Route::controller('PtcController')->name('ptc.')->prefix('ptc')->group(function(){
                    Route::get('/','index')->name('index');
                    Route::get('show/{hash}','show')->name('show');
                    Route::post('confirm/{hash}','confirm')->name('confirm');
                    Route::get('my-ads','ads')->name('ads');
                    Route::get('create','create')->name('create');
                    Route::post('store','store')->name('store');
                    Route::get('edit/{id}','edit')->name('edit');
                    Route::post('update/{id}','update')->name('update');
                    Route::get('status/{id}','status')->name('status');
                    Route::get('clicks','clicks')->name('clicks');

                    Route::get('get-coin-price', 'coinPrice')->name('coin.price');
                });

                //custom coin mining
                Route::get('coin-mining', [UserController::class, 'coinMining'])->name('coin.mining');
                Route::post('coin-mining-on', [UserController::class, 'coinMiningOn'])->name('coin.mining.on');

                // ai smart Trading
                Route::get('ai-smart-trade', [InvestController::class, 'aiSmartTrade'])->name('ai.smart.trade');
                Route::post('ai-trade-on', [InvestController::class, 'aiTradeOn'])->name('ai.trade.on');
                Route::post('ai-collect-bonus', [InvestController::class, 'aiCollectBonus'])->name('ai.collect.bonus');

                //trading Chart
                Route::get('trading-chart', [UserController::class, 'tradingChart'])->name('trading.chart');

                //trading Chart
                Route::get('community', [UserController::class, 'Community'])->name('community');

            });

            // Payment
            Route::middleware('registration.complete')->controller('Gateway\PaymentController')->group(function(){
                Route::any('/deposit', 'deposit')->name('deposit');
                Route::post('deposit/insert', 'depositInsert')->name('deposit.insert');
                Route::get('deposit/confirm', 'depositConfirm')->name('deposit.confirm');
                Route::get('deposit/manual', 'manualDepositConfirm')->name('deposit.manual.confirm');
                Route::post('deposit/manual', 'manualDepositUpdate')->name('deposit.manual.update');

                //curl-edokanpay
                Route::post('/curl-deposit-auto', 'autoDepositcUrl')->name('auto.deposit.curl');
                Route::get('deposit-auto-cancel', 'cancelPage')->name('auto.cancel.page');
                Route::get('deposit-auto-success', 'successPage')->name('auto.success.page');
            });
        });
    });
});

