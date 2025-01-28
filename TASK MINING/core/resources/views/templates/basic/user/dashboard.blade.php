@extends($activeTemplate . 'layouts.mobile')
@section('content')
    @php
        $kycInfo = getContent('kyc_info.content', true);
        $inportentLinks = getContent('links.content', true);
    @endphp
    <style>
        .bg-profile {
            height: 270px;
            background: url("{{ asset('assets/images/bg/profile.png') }}") no-repeat;
            background-size: 100% 100%;
            padding-top: 0;
        }
        .list-group-item {
            background-color: #061412b3;
        }
    </style>
    <div id="appCapsule">
        <div class="bg-profile p-2">
            <div class="row align-items-center pt-5">
                <div class="col-auto">
                    <img style="width: 70px; height: 70px;" src="{{ asset('assets/images/avatar/vestasprof.png') }}" alt="">
                </div>
                <div class="col-auto ps-0">
                    <h6 class="mb-0 bg-secondary rounded-pill w-auto text-white small-font p-1 text-center think-font">
                        LOGIN: {{ $user->username }}
                    </h6>
                    <h6 class="mb-0 mt-1 bg-secondary rounded-pill w-auto text-white small-font p-1 px-3 text-center think-font">
                        VESTAS COMPANY
                    </h6>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-6">
                    <div class="card border border-1 border-secondary glass-bg">
                        <div class="card-body py-1">
                            <center>
                            <h6 class="mb-1 small-font-sm text-white think-font">Current Balance</h6>
                            <h5 class="mb-0 small-font text-white think-font">{{ getAmount($user->balance) }}
                                {{ $general->cur_sym }}</h5>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card border border-1 border-secondary glass-bg">
                        <div class="card-body py-1 text-end">
                            <center>
                            <h6 class="mb-1 small-font-sm text-white think-font">Today Earning</h6>
                            <h5 class="mb-0 small-font text-white think-font">
                                {{ getAmount($today['earning']) }} {{ $general->cur_sym }}
                            </h5>
                             </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" style="margin-top: -70px">

<div class="card border border-0 border-secondary glass-bg">
            <div class="row py-2">
                <a href="{{route('user.deposit.index')}}" class="col-3 px-0 text-center">
                    <img width="25px" src="https://img.icons8.com/?size=48&id=36950&format=png" alt="">
                    <p class="mb-0 small-font-sm text-light">Recharge</p>
                </a>
                <a href="{{route('user.withdraw.new')}}" class="col-3 px-0 text-center">
                    <img width="25px" src="https://img.icons8.com/?size=48&id=39897&format=png" alt="">
                    <p class="mb-0 small-font-sm text-light">Withdraw</p>
                </a>
                <a href="{{route('user.runing.plans')}}" class="col-3 px-0 text-center">
                    <img width="25px" src="https://img.icons8.com/?size=48&id=12132&format=png" alt="">
                    <p class="mb-0 small-font-sm text-light">Device</p>
                </a>
                <a href="{{route('online.service')}}" class="col-3 px-0 text-center">
                      <img width="30px" src="https://i.ibb.co/M2n8rBZ/image-removebg-preview-2.png" alt="">
                    <p class="mb-0 small-font-sm text-light">Online service</p>
                </a>
            </div>
        </div>

            <ul class="list-group"  style="padding-top:10px">
                <li class="list-group-item link-li d-flex justify-content-between align-items-center px-2" style="border-bottom: 1px solid rgb(255 255 255 / 50%) !important;">
                    <a href="{{route('user.twofactor')}}" class="ms-2 me-auto text-white">
                        {{-- <i class="fas fa-key text-orange-light me-2" style="font-size: 18px"></i> --}}
                        <img width="25" height="25" src="https://img.icons8.com/fluency/48/language.png" alt="language"/>
                        <span class="think-font" style="font-size: 13px">Language</span>
                    </a>
                    <span><i class="fas fa-angle-right"></i></span>
                </li>
                <li class="list-group-item link-li d-flex justify-content-between align-items-center px-2" style="border-bottom: 1px solid rgb(255 255 255 / 50%) !important;">
                    <a href="{{route('user.bank.card')}}" class="ms-2 me-auto text-white">
                        {{-- <i class="fas fa-university text-green me-2" style="font-size: 18px"></i> --}}
                        <img width="25" height="25" src="https://img.icons8.com/fluency/48/bank-card-back-side.png" alt="bank-card-back-side"/>
                        <span class="think-font" style="font-size: 13px">My USDT Adress</span>
                    </a>
                    <span><i class="fas fa-angle-right"></i></span>
                </li>
                <li class="list-group-item link-li d-flex justify-content-between align-items-center px-2" style="border-bottom: 1px solid rgb(255 255 255 / 50%) !important;">
                    <a href="{{route('user.change.password')}}" class="ms-2 me-auto text-white">
                        {{-- <i class="fas fa-key text-orange-light me-2" style="font-size: 18px"></i> --}}
                        <img width="25" height="25" src="https://img.icons8.com/fluency/48/key-security.png" alt="key-security"/>
                        <span class="think-font" style="font-size: 13px">Password</span>
                    </a>
                    <span><i class="fas fa-angle-right"></i></span>
                </li>
                <li class="list-group-item link-li d-flex justify-content-between align-items-center px-2" style="border-bottom: 1px solid rgb(255 255 255 / 50%) !important;">
                    <a href="{{route('user.transactions')}}" class="ms-2 me-auto text-white">
                        {{-- <i class="fas fa-hand-holding-usd text-orange me-2" style="font-size: 18px"></i> --}}
                        <img width="25" height="25" src="https://img.icons8.com/fluency/48/bill.png" alt="bill"/>
                        <span class="think-font" style="font-size: 13px">Balance Record</span>
                    </a>
                    <span><i class="fas fa-angle-right"></i></span>
                </li>
                <li class="list-group-item link-li d-flex justify-content-between align-items-center px-2" style="border-bottom: 1px solid rgb(255 255 255 / 50%) !important;">
                    <a href="{{route('user.deposit.history')}}" class="ms-2 me-auto text-white">
                        {{-- <i class="fas fa-piggy-bank text-blue me-2" style="font-size: 18px"></i> --}}
                        <img width="25" height="25" src="https://img.icons8.com/fluency/48/order-history.png" alt="order-history"/>
                        <span class="think-font" style="font-size: 13px">Recharge Record</span>
                    </a>
                    <span><i class="fas fa-angle-right"></i></span>
                </li>
                <li class="list-group-item link-li d-flex justify-content-between align-items-center px-2" style="border-bottom: 1px solid rgb(255 255 255 / 50%) !important;">
                    <a href="{{route('user.withdraw.history')}}" class="ms-2 me-auto text-white">
                        {{-- <i class="fas fa-wallet text-aqua me-2" style="font-size: 18px"></i> --}}
                        <img width="25" height="25" src="https://img.icons8.com/fluency/48/edit-property--v2.png" alt="edit-property--v2"/>
                        <span class="think-font" style="font-size: 13px">Withdrawal Record</span>
                    </a>
                    <span><i class="fas fa-angle-right"></i></span>
                </li>
                <li class="list-group-item link-li d-flex justify-content-between align-items-center px-2" style="border-bottom: 1px solid rgb(255 255 255 / 50%) !important;">
                    <a href="{{route('user.withdraw.fund.pass')}}" class="ms-2 me-auto text-white">
                        {{-- <i class="fas fa-unlock-alt text-pink me-2" style="font-size: 18px"></i> --}}
                        <img width="25" height="25" src="https://img.icons8.com/fluency/48/password-window.png" alt="password-window"/>
                        <span class="think-font" style="font-size: 13px">Payment Password</span>
                    </a>
                    <span><i class="fas fa-angle-right"></i></span>
                </li>
                <li class="list-group-item link-li d-flex justify-content-between align-items-center px-2" style="border-bottom: 1px solid rgb(255 255 255 / 50%) !important;">
                    <a href="{{ @$inportentLinks->data_values->apps_link }}" class="ms-2 me-auto text-white">
                        {{-- <i class="fab fa-android text-yellow me-2" style="font-size: 18px"></i> --}}
                        <img width="25" height="25" src="https://img.icons8.com/fluency/48/download.png" alt="download"/>
                        <span class="think-font" style="font-size: 13px">Download App</span>
                    </a>
                    <span><i class="fas fa-angle-right"></i></span>
                </li>
                <li class="list-group-item link-li d-flex justify-content-between align-items-center px-2">
                    <a href="{{route('user.logout')}}" class="ms-2 me-auto text-white">
                        {{-- <i class="fas fa-sign-out-alt text-red me-2" style="font-size: 18px"></i> --}}
                        <img width="25" height="25" src="https://img.icons8.com/fluency/48/exit--v1.png" alt="exit--v1"/>
                        <span class="think-font" style="font-size: 13px">Logout</span>
                    </a>
                    <span><i class="fas fa-angle-right"></i></span>
                </li>
            </ul>
        </div>



        <!-- Profile Card -->
        {{-- <div>
        <div class="py-3 px-2">
            <div class="row align-items-center">
                <div class="col-auto">
                    <img style="width: 50px; height: 50px;" src="{{asset('assets/images/avatar/man-2.png')}}" alt="">
                </div>
                <div class="col ps-0">
                    <h6 class="mb-0 text-primary small-font">
                        {{ 'Welcome, '.$user->username }}
                    </h6>
                    <h6 class="mb-0 text-white">Keep Going!</h6>
                </div>
            </div>
        </div>
        </div>

        <div class="container">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h6 class="mb-0 small-font text-light">Current Balance</h6>
                    <h5 class="mb-0 text-primary">{{getAmount($user->balance)}} {{$general->cur_text}}</h5>
                </div>
                <div class="col">
                    <div class="card bg-primary rounded">
                        <div class="card-body p-1 text-center">
                            <h6 class="small-font-sm text-light mb-2">Member</h6>
                            <h6 class="small-font-lg text-light mb-0">
                                @if ($user->plan)
                                    <svg style="color: white" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" clip-rule="evenodd" d="M6.26701 3.45496C6.91008 3.40364 7.52057 3.15077 8.01158 2.73234C9.15738 1.75589 10.8426 1.75589 11.9884 2.73234C12.4794 3.15077 13.0899 3.40364 13.733 3.45496C15.2336 3.57471 16.4253 4.76636 16.545 6.26701C16.5964 6.91008 16.8492 7.52057 17.2677 8.01158C18.2441 9.15738 18.2441 10.8426 17.2677 11.9884C16.8492 12.4794 16.5964 13.0899 16.545 13.733C16.4253 15.2336 15.2336 16.4253 13.733 16.545C13.0899 16.5964 12.4794 16.8492 11.9884 17.2677C10.8426 18.2441 9.15738 18.2441 8.01158 17.2677C7.52057 16.8492 6.91008 16.5964 6.26701 16.545C4.76636 16.4253 3.57471 15.2336 3.45496 13.733C3.40364 13.0899 3.15077 12.4794 2.73234 11.9884C1.75589 10.8426 1.75589 9.15738 2.73234 8.01158C3.15077 7.52057 3.40364 6.91008 3.45496 6.26701C3.57471 4.76636 4.76636 3.57471 6.26701 3.45496ZM13.7071 8.70711C14.0976 8.31658 14.0976 7.68342 13.7071 7.29289C13.3166 6.90237 12.6834 6.90237 12.2929 7.29289L9 10.5858L7.70711 9.29289C7.31658 8.90237 6.68342 8.90237 6.29289 9.29289C5.90237 9.68342 5.90237 10.3166 6.29289 10.7071L8.29289 12.7071C8.68342 13.0976 9.31658 13.0976 9.70711 12.7071L13.7071 8.70711Z" fill="white"></path> </svg>
                                    {{ __($user->plan->name) }}
                                @else
                                    @lang('No Plan')
                                @endif
                            </h6>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Deposit -->
            <div class="row mt-2">
                <div class="col-auto pe-1">
                    <a href="#" class="bg-primary rounded text-center p-2 h-100 d-flex align-items-center justify-content-center" style="width: 60px">
                        <i class="fas fa-piggy-bank" style="font-size: 25px;"></i>
                    </a>
                </div>
                <div class="col ps-0">
                    <div class="border border-primary rounded text-center py-2">
                        <p class="mb-0 text-primary small-font-sm">Total Deposit</p>
                        <h6 class="mb-0 small-font-lg text-primary">
                            {{ getAmount($total['deposit']) }} {{ $general->cur_text }}
                        </h6>
                    </div>
                </div>
            </div>

            <!-- Withdraw -->
            <div class="row mt-2">
                <div class="col pe-1">
                    <div class="border border-primary rounded text-center py-2">
                        <p class="mb-0 text-primary small-font-sm">Total Withdraw</p>
                        <h6 class="mb-0 small-font-lg text-primary">
                            {{ getAmount($total['withdraw']) }} {{ $general->cur_text }}
                        </h6>
                    </div>
                </div>
                <div class="col-auto ps-0">
                    <a href="#" class="bg-primary rounded text-center p-2 h-100 d-flex align-items-center justify-content-center" style="width: 60px">
                        <i class="fas fa-wallet" style="font-size: 25px;"></i>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h6 class="mt-3 mb-2 text-primary small-font">Navigations</h6>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <a href="#" class="border border-primary rounded p-1 w-100 mb-1">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="bg-primary rounded text-center p-2 h-100 d-flex align-items-center justify-content-center" style="width: 42px">
                                    <i class="fas fa-id-card" style="font-size: 20px;"></i>
                                </div>
                            </div>
                            <div class="col ps-0">
                                <p class="mb-0 text-primary small-font-lg">Profile Seting</p>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-angle-right text-primary"></i>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="border border-primary rounded p-1 w-100 mb-1">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="bg-primary rounded text-center p-2 h-100 d-flex align-items-center justify-content-center" style="width: 42px">
                                    <i class="fas fa-money-check-alt" style="font-size: 20px;"></i>
                                </div>
                            </div>
                            <div class="col ps-0">
                                <p class="mb-0 text-primary small-font-lg">Deposit Logs</p>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-angle-right text-primary"></i>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="border border-primary rounded p-1 w-100 mb-1">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="bg-primary rounded text-center p-2 h-100 d-flex align-items-center justify-content-center" style="width: 42px">
                                    <i class="fas fa-baby-carriage" style="font-size: 20px;"></i>
                                </div>
                            </div>
                            <div class="col ps-0">
                                <p class="mb-0 text-primary small-font-lg">Withdraw Logs</p>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-angle-right text-primary"></i>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="border border-primary rounded p-1 w-100 mb-1">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="bg-primary rounded text-center p-2 h-100 d-flex align-items-center justify-content-center" style="width: 42px">
                                    <i class="fas fa-file-alt" style="font-size: 20px;"></i>
                                </div>
                            </div>
                            <div class="col ps-0">
                                <p class="mb-0 text-primary small-font-lg">Transactions</p>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-angle-right text-primary"></i>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="border border-primary rounded p-1 w-100 mb-1">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="bg-primary rounded text-center p-2 h-100 d-flex align-items-center justify-content-center" style="width: 42px">
                                    <i class="fas fa-chart-line" style="font-size: 20px;"></i>
                                </div>
                            </div>
                            <div class="col ps-0">
                                <p class="mb-0 text-primary small-font-lg">Commissions</p>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-angle-right text-primary"></i>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="border border-primary rounded p-1 w-100 mb-1">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="bg-primary rounded text-center p-2 h-100 d-flex align-items-center justify-content-center" style="width: 42px">
                                    <i class="fas fa-sign-out-alt" style="font-size: 20px;"></i>
                                </div>
                            </div>
                            <div class="col ps-0">
                                <p class="mb-0 text-primary small-font-lg">Log Out</p>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-angle-right text-primary"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div> --}}



        {{-- <div class="container">
            <div class="card bg-light mt-4 mb-4">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <p class="mb-0 small-font-sm text-primary">
                                Balance
                            </p>
                            <h6 class="mb-0 small-font-lg text-primary">
                                {{ $general->cur_sym }}{{ getAmount($user->balance) }}
                            </h6>
                        </div>
                        <div class="col-6 px-0">
                            <div class="card bg-primary balance-card-2">
                                <div class="card-body text-end row align-items-center">
                                    <div class="col-12">
                                        <p class="mb-0 small-font-sm text-white">
                                            Balance
                                        </p>
                                        <h6 class="mb-0 small-font-lg text-white">
                                            {{ $general->cur_sym }}{{ getAmount($user->balance) }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reports -->
            <div class="row">
                <div class="col-4 mb-2 pe-1">
                    <div class="border border-primary rounded text-center py-2">
                        <p class="mb-0 text-primary small-font-sm">Today's Earning</p>
                        <h6 class="mb-0 small-font-lg text-primary">
                            {{ $general->cur_sym }}{{ getAmount($user->balance) }}
                        </h6>
                    </div>
                </div>
                <div class="col-4 mb-2 px-1">
                    <div class="border border-primary rounded text-center py-2">
                        <p class="mb-0 text-primary small-font-sm">Today's Earning</p>
                        <h6 class="mb-0 small-font-lg text-primary">
                            {{ $general->cur_sym }}{{ getAmount($user->balance) }}
                        </h6>
                    </div>
                </div>
                <div class="col-4 mb-2 ps-1">
                    <div class="border border-primary rounded text-center py-2">
                        <p class="mb-0 text-primary small-font-sm">Today's Earning</p>
                        <h6 class="mb-0 small-font-lg text-primary">
                            {{ $general->cur_sym }}{{ getAmount($user->balance) }}
                        </h6>
                    </div>
                </div>
                <div class="col-4 mb-2 pe-1">
                    <div class="border border-primary rounded text-center py-2">
                        <p class="mb-0 text-primary small-font-sm">Today's Earning</p>
                        <h6 class="mb-0 small-font-lg text-primary">
                            {{ $general->cur_sym }}{{ getAmount($user->balance) }}
                        </h6>
                    </div>
                </div>
                <div class="col-4 mb-2 px-1">
                    <div class="border border-primary rounded text-center py-2">
                        <p class="mb-0 text-primary small-font-sm">Today's Earning</p>
                        <h6 class="mb-0 small-font-lg text-primary">
                            {{ $general->cur_sym }}{{ getAmount($user->balance) }}
                        </h6>
                    </div>
                </div>
                <div class="col-4 mb-2 ps-1">
                    <div class="border border-primary rounded text-center py-2">
                        <p class="mb-0 text-primary small-font-sm">Today's Earning</p>
                        <h6 class="mb-0 small-font-lg text-primary">
                            {{ $general->cur_sym }}{{ getAmount($user->balance) }}
                        </h6>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-3 text-center">
                    <div class="card-box">
                        <i class="fas fa-address-card"></i>
                    </div>
                    <span class="small-font-sm text-primary">PIA</span>
                </div>
                <div class="col-3 text-center">
                    <div class="card-box">
                        <i class="fas fa-donate"></i>
                    </div>
                    <span class="small-font-sm text-primary">Recharge</span>
                </div>
                <div class="col-3 text-center">
                    <div class="card-box">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <span class="small-font-sm text-primary">Withdraw</span>
                </div>
                <div class="col-3 text-center">
                    <div class="card-box">
                        <i class="fas fa-random"></i>
                    </div>
                    <span class="small-font-sm text-primary">Transfer</span>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-3 text-center">
                    <div class="card-box">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <span class="small-font-sm text-primary">Reports</span>
                </div>
                <div class="col-3 text-center">
                    <div class="card-box">
                        <i class="fas fa-book"></i>
                    </div>
                    <span class="small-font-sm text-primary">Transaction</span>
                </div>
                <div class="col-3 text-center">
                    <div class="card-box">
                        <i class="fas fa-cog"></i>
                    </div>
                    <span class="small-font-sm text-primary">Setting</span>
                </div>
                <div class="col-3 text-center">
                    <div class="card-box">
                        <i class="fas fa-sign-out-alt"></i>
                    </div>
                    <span class="small-font-sm text-primary">Log Out</span>
                </div>
            </div>

        </div> --}}

    </div>

 <footer>
<style type="text/css">
#goog-gt-tt {display:none !important;}
.goog-te-banner-frame {display:none !important;}
.goog-te-menu-value:hover {text-decoration:none !important;}
body {top:0 !important;}
.skiptranslate {display:none !important;}
#google_translate_element2 {display:none!important;}
</style>

<div id="google_translate_element2"></div>
<script type="text/javascript">
function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
</script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>

<script type="text/javascript">
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
</script>
<div class="clearfix fixed-bottom"></div>
</footer>



    {{-- <section class="cmn-section">
    <div class="container">
        <div class="row cmn-text">
            <div class="col-md-12 mb-4">
                @if (auth()->user()->kv == 0)
                    <div class="alert alert-info" role="alert">
                        <h4 class="alert-heading">@lang('KYC Verification required')</h4>
                        <hr>
                        <p class="mb-0">{{ __($kycInfo->data_values->verification_content) }} <a
                                href="{{ route('user.kyc.form') }}">@lang('Click Here to Verify')</a>
                        </p>
                    </div>
                @elseif(auth()->user()->kv == 2)
                    <div class="alert alert-warning" role="alert">
                        <h4 class="alert-heading">@lang('KYC Verification pending')</h4>
                        <hr>
                        <p class="mb-0">{{ __($kycInfo->data_values->pending_content) }} <a
                                href="{{ route('user.kyc.data') }}">@lang('See KYC Data')</a></p>
                    </div>
                @endif
            </div>
            <div class="col-md-6 mb-30">
                <div class="widget-two h-100 box--shadow2 b-radius--5 bg--white">
                    <i class="fas fa-dollar-sign overlay-icon text--primary"></i>
                    <div class="widget-two__icon b-radius--5 bg--primary">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="widget-two__content">
                        <h2 class="bal">{{ getAmount($user->balance) }} {{ $general->cur_sym }}</h2>
                        <div class="d-flex flex-wrap justify-content-between position-relative">
                            <p>@lang('My Balance')</p>
                        <a href="{{ route('user.withdraw') }}"
                                class="btn cmn-btn">@lang('Withdraw') <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div><!-- widget-two end -->
            </div>
            <div class="col-md-6 mb-30">
                <div class="widget-two h-100 box--shadow2 b-radius--5 bg--white">
                    <i class="fas fa-gem overlay-icon text--primary"></i>
                    <div class="widget-two__icon b-radius--5 bg--primary">
                        <i class="fas fa-gem"></i>
                    </div>
                    <div class="widget-two__content">
                        <h2>
                            @if ($user->plan)
                                {{ __($user->plan->name) }} @if ($user->expire_date < now()) (@lang('Expired')) @endif
                            @else
                                @lang('No Plan')
                            @endif
                        </h2>
                        <div class="d-flex flex-wrap justify-content-between position-relative">
                            <p>@lang('My Plan')</p>
                        <a href="{{ route('plans') }}" class="btn cmn-btn">@if ($user->expire_date >= now()) @lang('Change Plan') @else @lang('Plans') @endif <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                        @if ($user->expire_date >= now())
                        <small class="text--danger">@lang('expire in') {{ \Carbon\Carbon::parse($user->expire_date)->format('Y-m-d') }}</small>
                        @endif
                    </div>
                </div><!-- widget-two end -->
            </div>
            <div class="col-6 mb-30">
                <div class="widget-three box--shadow2 b-radius--5 bg--white">
                    <div class="widget-three__icon b-radius--rounded bg--primary">
                        <i class="far fa-credit-card"></i>
                    </div>
                    <div class="widget-three__content">
                        <h2>{{ getAmount($user->deposits->sum('amount')) }} {{ $general->cur_sym }}</h2>
                        <p>@lang('Total Deposit')</p>
                        <a href="{{ route('user.deposit.history') }}" class="btn cmn-btn mt-2">@lang('Deposit Log ')<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-6 mb-30">
                <div class="widget-three box--shadow2 b-radius--5 bg--white">
                    <div class="widget-three__icon b-radius--rounded bg--primary">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <div class="widget-three__content">
                        <h2> {{ getAmount($user->withdrawals->where('status',1)->sum('amount')) }} {{ $general->cur_sym }}</h2>
                        <p>@lang('Total Withdraw')</p>
                        <a href="{{ route('user.withdraw.history') }}" class="btn cmn-btn mt-2">@lang('Withdraw Log ')<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <a href="javascript:void(0)" class="col-lg-6 col-md-12 mb-30">
                <div class="widget bb--3 border--success b-radius--10 bg--white p-2 pt-3 box--shadow2">
                    <div class="widget__icon b-radius--rounded bg--success"><i class="fas fa-stopwatch"></i></div>
                    <div class="widget__content">
                        <p class="text-uppercase text-muted mb-0">@lang('Next Reminder')</p>
                        <h2 class="text--base fw-bold timer" id="counter"></h2>
                    </div>
                    <div class="widget__arrow">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
            </a>

            <a href="{{ route('user.commissions') }}" class="col-lg-6 col-md-12 mb-30">
                <div class="widget bb--3 border--success b-radius--10 bg--white p-2 pt-3 box--shadow2">
                    <div class="widget__icon b-radius--rounded bg--success"><i class="fas fa-mouse-pointer"></i></div>
                    <div class="widget__content">
                        <p class="text-uppercase text-muted mb-0">@lang('Referral Commissions')</p>
                        <h2 class="text--base fw-bold">
                            {{ __($commissionCount) }} {{ $general->cur_text }}
                        </h2>
                    </div>
                    <div class="widget__arrow">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
            </a>

        </div>
    </div>
</section> --}}
@endsection
@push('style')
    <style>
        .link-li{
            cursor: pointer;
        }
    </style>
@endpush
@push('script')
    <script src="{{ asset('assets/admin/js/vendor/apexcharts.min.js') }}"></script>
    <script>
        (function($) {
            "use strict";
            // apex-bar-chart js
            var options = {
                series: [{
                    name: 'Clicks',
                    data: [
                        @foreach ($chart['click'] as $key => $click)
                            {{ $click }},
                        @endforeach
                    ]
                }, {
                    name: 'Earn Amount',
                    data: [
                        @foreach ($chart['amount'] as $key => $amount)
                            {{ $amount }},
                        @endforeach
                    ]
                }],
                chart: {
                    type: 'bar',
                    height: 580,
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: [
                        @foreach ($chart['amount'] as $key => $amount)
                            '{{ $key }}',
                        @endforeach
                    ],
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val
                        }
                    }
                }
            };
            // var chart = new ApexCharts(document.querySelector("#apex-bar-chart"), options);
            // chart.render();

            // function createCountDown(elementId, sec) {
            //     var tms = sec;
            //     var x = setInterval(function() {
            //         var distance = tms * 1000;
            //         var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            //         var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            //         var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            //         var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            //         document.getElementById(elementId).innerHTML = days + "d: " + hours + "h " + minutes +
            //             "m " + seconds + "s ";
            //         if (distance < 0) {
            //             clearInterval(x);
            //             document.getElementById(elementId).innerHTML = "{{ __('COMPLETE') }}";
            //         }
            //         tms--;
            //     }, 1000);
            // }
            // createCountDown('counter', {{ \Carbon\Carbon::tomorrow()->diffInSeconds() }});
        })(jQuery);
    </script>

    <script>
        $(document).on('click', 'li.link-li', function () {
            let link = $(this).find('a').attr('href');
            // console.log(link);
            window.location.href = link;
        });
    </script>

@endpush
