@extends($activeTemplate.'layouts.master')
@section('content')

@php
    $yourLinks = getContent('links.content', true);
    $total_task = $user->daily_limit;
    if ($total_task > 0) {
        $remain_task_ratio = 100 * (($total_task - $user->clicks->where('view_date',Date('Y-m-d'))->count()) / $total_task);
        $complete_task_ratio = 100 * ($user->clicks->where('view_date',Date('Y-m-d'))->count() / $total_task);
    }
@endphp

<!-- App download Modal -->
@include('templates.basic.includes.app_down_modal')

<body class="body-scroll d-flex flex-column h-100 menu-overlay" data-page="addmoney">

        @include(activeTemplate().'includes.side_nav')

        <!-- Begin page content -->
        <main class="flex-shrink-0 main has-footer">
            <!-- Fixed navbar -->
            @include(activeTemplate().'includes.top_nav')

            <!-- Profile Wallet Card -->
            <div class="card border-0 mb-3">
                <div class="card-header pb-0 mt-2">
                    <div class="row align-items-end">
                        <div class="col-4 pr-0 text-left">
                            <h6 class="badge badge-warning">
                                @if ($user->level_id)
                                    {{ $user->level->name }}
                                @endif
                            </h6>
                            <h6 class="text-warning">
                                {{ $general->cur_sym }} {{ showAmount($user->balance) }}
                            </h6>
                            <h6 class="mb-0 text-no-shadow font-sm">Main Balance</h6>
                        </div>
                        <div class="col-4 px-1 text-center">
                            <img src="{{asset('assets/images/user/profile')}}/{{$user->image ? $user->image : 'dummy-profile.png'}}"  class="img-thumbnail rounded-circle" style="width: 70px" alt="img">
                            <h6 class="text-no-shadow mt-1 mb-0 font-lg">{{ __($user->fullname) }}</h6>
                            <h6 class="text-no-shadow mt-1 font-sm">Achievement: <b class="font-sm text-warning">{{$user->achievement ? $user->achievement : 'NO'}}</b></h6>
                        </div>
                        <div class="col-4 pl-1 text-right">
                            <h6 class="badge badge-warning">
                                @if($user->plan)
                                    @if($user->expire_date > now())
                                        {{ __($user->plan->name) }}
                                    @endif

                                    @if($user->expire_date < now())
                                        <span>(@lang('Expired'))</span>
                                    @endif
                                @else
                                    @lang('No Plan')
                                @endif
                            </h6>
                            <h6 class="text-warning">{{ $general->cur_sym }} {{ showAmount($user->trade_balance) }}</h6>
                            <h6 class="mb-0 text-no-shadow font-sm">Robot Balance</h6>
                        </div>
                    </div>
                </div>
                <hr class="my-1">
                <div class="card-footer">
                    <div class="row align-items-center">
                        <div class="col-6 text-center" style="border-right: 2px dashed #dee2e6 !important">
                            <h5 class="text-shadow">{{ showAmount($user->deposits->where('status',1)->sum('amount')) }} {{ $general->cur_sym }}</h5>
                            <span class="text-secondary">Total Deposit</span>
                        </div>
                        <hr>
                        <div class="col-6 text-center" style="border-left: 2px dashed #dee2e6 !important">
                            <h5 class="text-shadow">{{ showAmount($user->withdrawals->where('status',1)->sum('amount')) }} {{ $general->cur_sym }}</h5>
                            <span class="text-secondary">Total Withdraw</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card items -->
            <div class="card mb-3">
                <div class="card-body p-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-center">
                            <div class="card-item" data-toggle="modal" data-target="#depositModal">
                                <img src="https://img.icons8.com/fluency/96/deposit.png" alt="">
                                <p>Deposit</p>
                            </div>
                        </div>
                        <div class="col-4 text-center">
                            <div class="card-item"
                                @if ($general->balance_transfer == 0)
                                    onclick="notifyMsg('User balance transfer currently disabled!','error')"
                                @else
                                    data-toggle="modal" data-target="#transferModal"
                                @endif >
                                <img src="https://img.icons8.com/fluency/96/data-in-both-directions.png" alt="">
                                <p>Transfer</p>
                            </div>
                        </div>
                        <div class="col-4 text-center">
                            <div class="card-item" data-toggle="modal" data-target="#withdrawModal">
                                <img src="https://img.icons8.com/fluency/96/withdrawal-limit.png" alt="">
                                <p>Withdraw</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="main-container"> --}}

                <!-- Profile Section -->
                <div class="mb-2">
                    <h6 class="mb-2 text-white pl-2">Profile Section</h6>
                    <a href="{{ route('user.profile.setting') }}" class=" card mb-2">
                        <div class="card-body py-2 px-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <img width="25px" src="https://img.icons8.com/fluency/48/settings.png" alt="">
                                </div>
                                <div class="col pl-0">Account Settings</div>
                                <div class="col-auto"><i class="las la-angle-right"></i></div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('user.address.setting') }}" class=" card mb-2">
                        <div class="card-body py-2 px-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <img width="25px" src="https://img.icons8.com/fluency/48/order-delivered.png" alt="">
                                </div>
                                <div class="col pl-0">Address Settings</div>
                                <div class="col-auto"><i class="las la-angle-right"></i></div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('user.change.password') }}" class=" card mb-2">
                        <div class="card-body py-2 px-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <img width="25px" src="https://img.icons8.com/fluency/48/key-security.png" alt="">
                                </div>
                                <div class="col pl-0">Password Settings</div>
                                <div class="col-auto"><i class="las la-angle-right"></i></div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('user.withdraw.password') }}" class=" card mb-2">
                        <div class="card-body py-2 px-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <img width="25px" src="https://img.icons8.com/fluency/48/sms-token.png" alt="">
                                </div>
                                <div class="col pl-0">Setup Withdraw Password</div>
                                <div class="col-auto"><i class="las la-angle-right"></i></div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('user.withdraw.wallet') }}" class=" card mb-2">
                        <div class="card-body py-2 px-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <img width="25px" src="https://img.icons8.com/fluency/48/card-wallet.png" alt="">
                                </div>
                                <div class="col pl-0">Setup Withdraw Wallet</div>
                                <div class="col-auto"><i class="las la-angle-right"></i></div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Reports -->
                <div class="mb-2">
                    <h6 class="mb-2 text-white pl-2">Reports</h6>
                    <a href="{{ route('user.commissions') }}" class=" card mb-2">
                        <div class="card-body py-2 px-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <img width="25px" src="https://img.icons8.com/fluency/48/stocks-growth--v1.png" alt="">
                                </div>
                                <div class="col pl-0">Commission Logs</div>
                                <div class="col-auto"><i class="las la-angle-right"></i></div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('user.transactions') }}" class=" card mb-2">
                        <div class="card-body py-2 px-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <img width="25px" src="https://img.icons8.com/fluency/48/growing-money.png" alt="">
                                </div>
                                <div class="col pl-0">Transaction Logs</div>
                                <div class="col-auto"><i class="las la-angle-right"></i></div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('user.deposit.history') }}" class=" card mb-2">
                        <div class="card-body py-2 px-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <img width="25px" src="https://img.icons8.com/fluency/48/cash-receipt.png" alt="">
                                </div>
                                <div class="col pl-0">Deposit History</div>
                                <div class="col-auto"><i class="las la-angle-right"></i></div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('user.withdraw.history') }}" class=" card mb-2">
                        <div class="card-body py-2 px-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <img width="25px" src="https://img.icons8.com/fluency/48/payment-history.png" alt="">
                                </div>
                                <div class="col pl-0">Withdraw History</div>
                                <div class="col-auto"><i class="las la-angle-right"></i></div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Others -->
                <div class="mb-2">
                    <h6 class="mb-2 text-white pl-2">Others</h6>
                    <a href="{{ route('user.referred') }}" class=" card mb-2">
                        <div class="card-body py-2 px-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <img width="25px" src="https://img.icons8.com/fluency/48/organization-chart-people.png" alt="">
                                </div>
                                <div class="col pl-0">My Team</div>
                                <div class="col-auto"><i class="las la-angle-right"></i></div>
                            </div>
                        </div>
                    </a>
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#appDownloadModal" class=" card mb-2">
                        <div class="card-body py-2 px-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <img width="25px" src="https://img.icons8.com/fluency/48/download-from-cloud.png" alt="">
                                </div>
                                <div class="col pl-0">Download Official App</div>
                                <div class="col-auto"><i class="las la-angle-right"></i></div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('user.logout') }}" class=" card mb-2" style="background: rgb(194 32 0 / 19%);">
                        <div class="card-body py-2 px-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <img width="25px" src="{{asset('assets/images/3d-logo/logout-2.png')}}" alt="">
                                </div>
                                <div class="col pl-0">Log Out</div>
                                <div class="col-auto"><i class="las la-angle-right"></i></div>
                            </div>
                        </div>
                    </a>
                </div>

            {{-- </div> --}}
        </main>

        <!-- QrCode Modal -->

        <div class="modal fade" id="QrCodeModal" tabindex="-1" role="dialog" aria-labelledby="QrCodeModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="QrCodeModalCenterTitle">Invite with - QR Code</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div align="center" class="modal-body">
                        <img src="https://chart.googleapis.com/chart?cht=qr&chl={{ route('user.register') }}/{{ auth()->user()->username }}&chs=180x180&choe=UTF-8&chld=L|2" alt="QR Code">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

</body>

@include(activeTemplate() . 'includes.bottom_nav')

@push('style-custom')
    <style>
        .blalnceCardBtn {
            height: 50px !important;
            width: 50px !important;
            box-shadow: 0 0 0.5rem 0px #00000040 !important;
            border-radius: 1.3rem !important;
            color: #fff !important;
            align-items: center !important;
            justify-content: center !important;
        }
        .coverPhoto{
            margin-top: 60px !important;
            background-size: cover;
            background-repeat: no-repeat;
            height: 170px;
            width: 100%;
            background-position: center;
            position: cover;
        }

        .top-220 {
            margin-top: -220px;
        }

        .profile-thumb {
            padding: 0.18rem !important;
            background-color: #3d5fa5 !important;
            border: 1px solid #3d5fa5 !important;
            max-width: 100%;
            height: auto;
            transition: ease all 0.5s;
            -webkit-transition: ease all 0.5s;
        }

        .darkmode .profile-thumb {
            background-color: #0f0b04 !important;
            border: 1px solid #0f0b04 !important;
        }
    </style>
    <style>
        .avatar-edit label {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            text-align: center;
            line-height: 41px;
            border: 3px solid #3d5fa5;
            font-size: 18px;
            cursor: pointer;
            position: absolute;
            transition: ease all 0.5s;
            -webkit-transition: ease all 0.5s;
        }
        .avatar-edit{
            transition: ease all 0.5s;
            -webkit-transition: ease all 0.5s;
        }
        .darkmode .avatar-edit {
            background-color: #040910;
        }
        .darkmode .avatar-edit label {
            border: 3px solid #040910 !important;
        }
        .imgEdit {
            margin-left: 6.3rem !important;
            margin-top: -2.6rem !important;
        }
        .coverEdit {
            margin-right: 0.3rem !important;
            margin-top: -45px !important;
        }
    </style>
@endpush

@push('script')
    <script>

        $(".profilePicUpload").on('change', function(e) {
            e.preventDefault();
            //loading
            $('.loadProfilePhoto').attr('src', "{{asset('assets/images/profile_loading.gif')}}");
            $.ajax({
                method: "POST",
                url: "{{route('user.profile.photo')}}",
                data: new FormData($("#imgForm")[0]),
                processData: false,
                dataType: 'json',
                contentType: false,
                success: function (res) {
                    console.log(res.msg);
                    $('.loadProfilePhoto').attr('src', "{{route('home')}}/"+res.img);
                    // $('.profilePhoto').attr('style', '');
                    $('.profilePhoto').attr('style', "background-image: url('{{route('home')}}/"+res.img+"');");
                    notifyMsg(res.msg,res.cls)
                },
                error: function (err) {
                    let msg = err.responseJSON['message'];
                    notifyMsg(msg,'error')
                }
            });

        });

        //cover-photo Upload//
        $(".coverPicUpload").on('change', function(e) {
            e.preventDefault();
            //loading
            $('.coverPhoto').attr('style', "background-image: url('{{asset('assets/images/cover_loading.gif')}}');");
            $.ajax({
                method: "POST",
                url: "{{route('user.cover.photo')}}",
                data: new FormData($("#coverImgForm")[0]),
                processData: false,
                dataType: 'json',
                contentType: false,
                success: function (res) {
                    console.log(res.msg);
                    notifyMsg(res.msg,res.cls);
                    $('.coverPhoto').attr('style', "background-image: url('{{route('home')}}/"+res.img+"');");
                },
                error: function (err) {
                    let msg = err.responseJSON['message'];
                    notifyMsg(msg,'error')
                }
            });

        });
    </script>
@endpush
@endsection
