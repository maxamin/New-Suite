@extends('admin.layouts.app')

@section('panel')

@if(@json_decode($general->system_info)->version > systemDetails()['version'])
    <div class="row">
        <div class="col-md-12">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">
                    <h3 class="card-title"> @lang('New Version Available') <button
                            class="btn btn--dark float-end">@lang('Version')
                            {{ json_decode($general->system_info)->version }}</button> </h3>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-dark">@lang('What is the Update ?')</h5>
                    <p>
                        <pre class="f-size--24">{{ json_decode($general->system_info)->details }}</pre>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endif
@if(@json_decode($general->system_info)->message)
    <div class="row">
        @foreach(json_decode($general->system_info)->message as $msg)
            <div class="col-md-12">
                <div class="alert border border--primary" role="alert">
                    <div class="alert__icon bg--primary"><i class="far fa-bell"></i></div>
                    <p class="alert__message">@php echo $msg; @endphp</p>
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
        @endforeach
    </div>
@endif

<div class="card my-4">
    <div class="card-header text--danger">
        Please Set Cron Url To Your Server
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 mb-2">
                <div class="input-group mb-3">
                    <input type="text" id="cron1" class="form-control" value="curl -s {{route('cron.set.user.level')}}" readonly>
                    <button type="button" class="input-group-text btn btn--primary" onclick="copyInput('cron1')">Copy Cron Url</button>
                </div>
            </div>
            <div class="col-12">
                <div class="input-group">
                    <input type="text" id="cron2" class="form-control" value="curl -s {{route('cron.add.coin.balance')}}" readonly>
                    <button type="button" class="input-group-text btn btn--primary" onclick="copyInput('cron2')">Copy Cron Url</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row gy-4">
    <div class="col-xxl-3 col-sm-6">
        <div class="card bg--primary has-link overflow-hidden box--shadow2">
            <a href="{{ route('admin.users.all') }}" class="item-link"></a>
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-4">
                        {{-- <i class="las la-users f-size--56"></i> --}}
                        <img class="overlay-icon" style="height: 100%; width: 100%; max-width: 100px" src="https://img.icons8.com/fluency/100/group.png" alt="">
                    </div>
                    <div class="col-8 text-end">
                        <span class="text-white text--small">@lang('Total Users')</span>
                        <h2 class="text-white">{{ $widget['total_users'] }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- dashboard-w1 end -->
    <div class="col-xxl-3 col-sm-6">
        <div class="card bg--success has-link box--shadow2">
            <a href="{{ route('admin.users.active') }}" class="item-link"></a>
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-4">
                        {{-- <i class="las la-user-check f-size--56"></i> --}}
                        <img class="overlay-icon" style="height: 100%; width: 100%; max-width: 100px" src="https://img.icons8.com/fluency/96/conference-call.png" alt="">
                    </div>
                    <div class="col-8 text-end">
                        <span class="text-white text--small">@lang('Active Users')</span>
                        <h2 class="text-white">{{ $widget['active_user'] }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- dashboard-w1 end -->
    <div class="col-xxl-3 col-sm-6">
        <div class="card bg--danger has-link box--shadow2">
            <a href="{{ route('admin.users.email.unverified') }}" class="item-link"></a>
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-4">
                        {{-- <i class="lar la-envelope f-size--56"></i> --}}
                        <img class="overlay-icon" style="height: 100%; width: 100%; max-width: 100px" src="https://img.icons8.com/fluency/100/unsubscribed.png" alt="">
                    </div>
                    <div class="col-8 text-end">
                        <span class="text-white text--small">@lang('Email Unverified Users')</span>
                        <h2 class="text-white">{{ $widget['email_unverified_users'] }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- dashboard-w1 end -->
    <div class="col-xxl-3 col-sm-6">
        <div class="card bg--red has-link box--shadow2">
            <a href="{{ route('admin.users.mobile.unverified') }}" class="item-link"></a>
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-4">
                        {{-- <i class="las la-comment-slash f-size--56"></i> --}}
                        <img class="overlay-icon" style="height: 100%; width: 100%; max-width: 100px" src="https://img.icons8.com/fluency/96/no-mobile-devices.png" alt="">
                    </div>
                    <div class="col-8 text-end">
                        <span class="text-white text--small">@lang('Mobile Unverified Users')</span>
                        <h2 class="text-white">{{ $widget['mobile_unverified_users'] }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- dashboard-w1 end -->
</div><!-- row end-->

<div class="row gy-4 mt-2">
    <div class="col-xxl-3 col-sm-6">
        <div class="widget-two box--shadow2 b-radius--5 bg--4">
            <img src="https://img.icons8.com/fluency/96/safe-ok.png" class="overlay-icon" style="height: 100%; width: 100%; max-width: 100px" alt="">
            <div class="widget-two__icon b-radius--5">
                <img src="https://img.icons8.com/fluency/96/safe-ok.png" style="height: 100%; width: 100%; max-width: 100px" alt="">
            </div>
            <div class="widget-two__content">
                <h3>{{ $general->cur_sym }}{{ showAmount($deposit['total_deposit_amount']) }}
                </h3>
                <p>@lang('Total Deposited')</p>
            </div>
            <a href="{{ route('admin.deposit.list') }}"
                class="widget-two__btn border border--success btn-outline--success">@lang('View All')</a>
        </div>
    </div><!-- dashboard-w1 end -->
    <div class="col-xxl-3 col-sm-6">
        <div class="widget-two box--shadow2 b-radius--5 bg--4">
            <img src="https://img.icons8.com/fluency/96/hourglass-sand-top.png" class="overlay-icon" style="height: 100%; width: 100%; max-width: 100px" alt="">
            <div class="widget-two__icon b-radius--5">
                <img src="https://img.icons8.com/fluency/96/hourglass-sand-top.png" style="height: 100%; width: 100%; max-width: 100px" alt="">
            </div>
            <div class="widget-two__content">
                <h3>{{ $deposit['total_deposit_pending'] }}
                </h3>
                <p>@lang('Pending Deposits')</p>
            </div>
            <a href="{{ route('admin.deposit.pending') }}"
                class="widget-two__btn border border--warning btn-outline--warning">@lang('View All')</a>
        </div>
    </div><!-- dashboard-w1 end -->
    <div class="col-xxl-3 col-sm-6">
        <div class="widget-two box--shadow2 b-radius--5 bg--4">
            <img src="https://img.icons8.com/fluency/96/no-credit-cards.png" class="overlay-icon" style="height: 100%; width: 100%; max-width: 100px" alt="">
            <div class="widget-two__icon b-radius--5">
                <img src="https://img.icons8.com/fluency/96/no-credit-cards.png" style="height: 100%; width: 100%; max-width: 100px" alt="">
            </div>
            <div class="widget-two__content">
                <h3>{{ $deposit['total_deposit_rejected'] }}
                </h3>
                <p>@lang('Rejected Deposits')</p>
            </div>
            <a href="{{ route('admin.deposit.rejected') }}"
                class="widget-two__btn border border--danger btn-outline--danger">@lang('View All')</a>
        </div>
    </div><!-- dashboard-w1 end -->
    <div class="col-xxl-3 col-sm-6">
        <div class="widget-two box--shadow2 b-radius--5 bg--4">
            <img src="https://img.icons8.com/fluency/96/hot-price.png" class="overlay-icon" style="height: 100%; width: 100%; max-width: 100px" alt="">
            <div class="widget-two__icon b-radius--5">
                <img src="https://img.icons8.com/fluency/96/hot-price.png" style="height: 100%; width: 100%; max-width: 100px" alt="">
            </div>
            <div class="widget-two__content">
                <h3>{{ $general->cur_sym }}{{ showAmount($deposit['total_deposit_charge']) }}
                </h3>
                <p>@lang('Deposited Charge')</p>
            </div>
            <a href="{{ route('admin.deposit.list') }}"
                class="widget-two__btn border border--primary btn-outline--primary">@lang('View All')</a>
        </div>
    </div><!-- dashboard-w1 end -->
</div><!-- row end-->

<div class="row gy-4 mt-2">
    <div class="col-xxl-3 col-sm-6">
        <div class="widget-two box--shadow2 b-radius--5 bg--4">
            <img src="https://img.icons8.com/fluency/96/cash-in-hand.png" class="overlay-icon" style="height: 100%; width: 100%; max-width: 100px" alt="">
            <div class="widget-two__icon b-radius--5">
                <img src="https://img.icons8.com/fluency/96/cash-in-hand.png" style="height: 100%; width: 100%; max-width: 100px" alt="">
            </div>
            <div class="widget-two__content">
                <h3>{{ $general->cur_sym }}{{ showAmount($withdrawals['total_withdraw_amount']) }}
                </h3>
                <p>@lang('Total Withdrawan')</p>
            </div>
            <a href="{{ route('admin.withdraw.log') }}"
                class="widget-two__btn border border--success btn-outline--success">@lang('View All')</a>
        </div>
    </div>
    <div class="col-xxl-3 col-sm-6">
        <div class="widget-two box--shadow2 b-radius--5 bg--4">
            <img src="https://img.icons8.com/fluency/96/payment-history.png" class="overlay-icon" style="height: 100%; width: 100%; max-width: 100px" alt="">
            <div class="widget-two__icon b-radius--5">
                <img src="https://img.icons8.com/fluency/96/payment-history.png" style="height: 100%; width: 100%; max-width: 100px" alt="">
            </div>
            <div class="widget-two__content">
                <h3>{{$withdrawals['total_withdraw_pending']}}</h3>
                <p>@lang('Pending Withdrawals')</p>
            </div>
            <a href="{{ route('admin.withdraw.pending') }}"
                class="widget-two__btn border border--warning btn-outline--warning">@lang('View All')</a>
        </div>
    </div>
    <div class="col-xxl-3 col-sm-6">
        <div class="widget-two box--shadow2 b-radius--5 bg--4">
            <img src="https://img.icons8.com/fluency/96/split-money.png" class="overlay-icon" style="height: 100%; width: 100%; max-width: 100px" alt="">
            <div class="widget-two__icon b-radius--5">
                <img src="https://img.icons8.com/fluency/96/split-money.png" style="height: 100%; width: 100%; max-width: 100px" alt="">
            </div>
            <div class="widget-two__content">
                <h3>{{$withdrawals['total_withdraw_rejected']}}</h3>
                <p>@lang('Rejected Withdrawals')</p>
            </div>
            <a href="{{ route('admin.withdraw.rejected') }}"
                class="widget-two__btn border border--danger btn-outline--danger">@lang('View All')</a>
        </div>
    </div>
    <div class="col-xxl-3 col-sm-6">
        <div class="widget-two box--shadow2 b-radius--5 bg--4">
            <img src="https://img.icons8.com/fluency/96/crypto-trading-margin.png" class="overlay-icon" style="height: 100%; width: 100%; max-width: 100px" alt="">
            <div class="widget-two__icon b-radius--5">
                <img src="https://img.icons8.com/fluency/96/crypto-trading-margin.png" style="height: 100%; width: 100%; max-width: 100px" alt="">
            </div>
            <div class="widget-two__content">
                <h3>{{ $general->cur_sym }}{{ showAmount($withdrawals['total_withdraw_charge']) }}
                </h3>
                <p>@lang('Withdrawal Charge')</p>
            </div>
            <a href="{{ route('admin.withdraw.log') }}"
                class="widget-two__btn border border--primary btn-outline--primary">@lang('View All')</a>
        </div>
    </div>
</div><!-- row end-->


<!--Today Reports-->
<div class="row gy-4 mt-2">
    <div class="col-xxl-3 col-sm-6">
        <div class="widget-two style--two box--shadow2 b-radius--5 bg--primary">
            <img src="https://img.icons8.com/fluency/96/estimate.png" class="overlay-icon" style="height: 100%; width: 100%; max-width: 100px" alt="">
            <div class="widget-two__icon b-radius--5">
                <img src="https://img.icons8.com/fluency/96/estimate.png" style="height: 100%; width: 100%; max-width: 100px" alt="">
            </div>
            <div class="widget-two__content">
                <h3 class="text-white">{{ showAmount($total['user_balance']) }}
                    {{ $general->cur_text }}</h3>
                <p class="text-white">@lang('Current Balance')</p>
            </div>
            {{-- <a href="{{ route('admin.ptc.index') }}" class="widget-two__btn">@lang('View All')</a> --}}
        </div>
    </div><!-- dashboard-w1 end -->
    <div class="col-xxl-3 col-sm-6">
        <div class="widget-two style--two box--shadow2 b-radius--5 bg--1">
            <img src="https://img.icons8.com/fluency/96/today.png" class="overlay-icon" style="height: 100%; width: 100%; max-width: 100px" alt="">
            <div class="widget-two__icon b-radius--5">
                <img src="https://img.icons8.com/fluency/96/today.png" style="height: 100%; width: 100%; max-width: 100px" alt="">
            </div>
            <div class="widget-two__content">
                <h3 class="text-white">{{ showAmount($today['deposit']) }}
                    {{ $general->cur_text }}</h3>
                <p class="text-white">@lang('Today Deposit')</p>
            </div>
            {{-- <a href="{{ route('admin.report.ptcview') }}" class="widget-two__btn">@lang('View All')</a> --}}
        </div>
    </div><!-- dashboard-w1 end -->
    <div class="col-xxl-3 col-sm-6">
        <div class="widget-two style--two box--shadow2 b-radius--5 bg--14">
            <img src="https://img.icons8.com/fluency/96/today.png" class="overlay-icon" style="height: 100%; width: 100%; max-width: 100px" alt="">
            <div class="widget-two__icon b-radius--5">
                <img src="https://img.icons8.com/fluency/96/today.png" style="height: 100%; width: 100%; max-width: 100px" alt="">
            </div>
            <div class="widget-two__content">
                <h3 class="text-white">{{ showAmount($today['withdraw']) }}
                    {{ $general->cur_text }}</h3>
                <p class="text-white">@lang('Today Withdraw')</p>
            </div>
            {{-- <a href="{{ route('admin.report.commissions') }}" class="widget-two__btn">@lang('View All')</a> --}}
        </div>
    </div><!-- dashboard-w1 end -->
    <div class="col-xxl-3 col-sm-6">
        <div class="widget-two style--two box--shadow2 b-radius--5 bg--19">
            <img src="https://img.icons8.com/fluency/96/discount--v1.png" class="overlay-icon" style="height: 100%; width: 100%; max-width: 100px" alt="">
            <div class="widget-two__icon b-radius--5">
                <img src="https://img.icons8.com/fluency/96/discount--v1.png" style="height: 100%; width: 100%; max-width: 100px" alt="">
            </div>
            <div class="widget-two__content">
                <h3 class="text-white">{{ showAmount($today['commission']) }}
                    {{ $general->cur_text }}</h3>
                <p class="text-white">@lang('Today Commission')</p>
            </div>
            {{-- <a href="{{ route('admin.report.transaction') }}?remark=subscribe_plan" class="widget-two__btn">@lang('View All')</a> --}}
        </div>
    </div><!-- dashboard-w1 end -->
</div><!-- row end-->

<div class="row gy-4 mt-2">
    <div class="col-xxl-3 col-sm-6">
        <div class="widget-two style--two box--shadow2 b-radius--5 bg--14">
            <img src="https://img.icons8.com/fluency/96/share--v1.png" class="overlay-icon" style="height: 100%; width: 100%; max-width: 100px" alt="">
            <div class="widget-two__icon b-radius--5">
                <img src="https://img.icons8.com/fluency/96/share--v1.png" style="height: 100%; width: 100%; max-width: 100px" alt="">
            </div>
            <div class="widget-two__content">
                <h3 class="text-white">{{ showAmount($widget['referral_commissions']) }}
                    {{ $general->cur_text }}</h3>
                <p class="text-white">@lang('Referral Commissions')</p>
            </div>
            {{-- <a href="{{ route('admin.report.commissions') }}" class="widget-two__btn">@lang('View All')</a> --}}
        </div>
    </div><!-- dashboard-w1 end -->
    <div class="col-xxl-3 col-sm-6">
        <div class="widget-two style--two box--shadow2 b-radius--5 bg--19">
            <img src="https://img.icons8.com/fluency/96/membership-card.png" class="overlay-icon" style="height: 100%; width: 100%; max-width: 100px" alt="">
            <div class="widget-two__icon b-radius--5">
                <img src="https://img.icons8.com/fluency/96/membership-card.png" style="height: 100%; width: 100%; max-width: 100px" alt="">
            </div>
            <div class="widget-two__content">
                <h3 class="text-white">{{ showAmount($widget['plan_purchased']) }}
                    {{ $general->cur_text }}</h3>
                <p class="text-white">@lang('Total Plan Purchased')</p>
            </div>
            {{-- <a href="{{ route('admin.report.transaction') }}?remark=subscribe_plan" class="widget-two__btn">@lang('View All')</a> --}}
        </div>
    </div><!-- dashboard-w1 end -->

    <div class="col-xxl-3 col-sm-6">
        <div class="widget-two style--two box--shadow2 b-radius--5 bg--primary">
            <img src="https://img.icons8.com/fluency/96/add--v1.png" class="overlay-icon" style="height: 100%; width: 100%; max-width: 100px" alt="">
            <div class="widget-two__icon b-radius--5">
                <img src="https://img.icons8.com/fluency/96/add--v1.png" style="height: 100%; width: 100%; max-width: 100px" alt="">
            </div>
            <div class="widget-two__content">
                <h3 class="text-white">{{ showAmount($total['admin_add']) }}
                    {{ $general->cur_text }}</h3>
                <p class="text-white">@lang('Total ADD')</p>
            </div>
            {{-- <a href="{{ route('admin.ptc.index') }}" class="widget-two__btn">@lang('View All')</a> --}}
        </div>
    </div><!-- dashboard-w1 end -->
    <div class="col-xxl-3 col-sm-6">
        <div class="widget-two style--two box--shadow2 b-radius--5 bg--1">
            <img src="https://img.icons8.com/fluency/96/minus.png" class="overlay-icon" style="height: 100%; width: 100%; max-width: 100px" alt="">
            <div class="widget-two__icon b-radius--5">
                <img src="https://img.icons8.com/fluency/96/minus.png" style="height: 100%; width: 100%; max-width: 100px" alt="">
            </div>
            <div class="widget-two__content">
                <h3 class="text-white">{{ showAmount($total['admin_cut']) }}
                    {{ $general->cur_text }}</h3>
                <p class="text-white">@lang('Total CUT')</p>
            </div>
            {{-- <a href="{{ route('admin.report.ptcview') }}" class="widget-two__btn">@lang('View All')</a> --}}
        </div>
    </div><!-- dashboard-w1 end -->
</div><!-- row end-->

{{-- <div class="row mb-none-30 mt-30">
    <div class="col-xl-6 mb-30">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">@lang('Monthly Deposit & Withdraw Report') (@lang('Last 12 Month'))</h5>
                <div id="apex-bar-chart"> </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 mb-30">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">@lang('Transactions Report') (@lang('Last 30 Days'))</h5>
                <div id="apex-line"></div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-none-30 mt-5">
    <div class="col-xl-4 col-lg-6 mb-30">
        <div class="card overflow-hidden">
            <div class="card-body">
                <h5 class="card-title">@lang('Login By Browser') (@lang('Last 30 days'))</h5>
                <canvas id="userBrowserChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 mb-30">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">@lang('Login By OS') (@lang('Last 30 days'))</h5>
                <canvas id="userOsChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 mb-30">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">@lang('Login By Country') (@lang('Last 30 days'))</h5>
                <canvas id="userCountryChart"></canvas>
            </div>
        </div>
    </div>
</div> --}}


@endsection


@push('script')

    <script src="{{asset('assets/admin/js/vendor/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/vendor/chart.js.2.8.0.js')}}"></script>

    <script>
        const copyInput = (id) => {
            var copyText = document.getElementById(id);
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
            // notifyMsg("<p class='text-success text-no-shadow'>Copied: " + copyText.value + " </p>", 'success')
            notify('success', "Copied: " + copyText.value);
        }
    </script>

    {{-- <script>
        "use strict";
        var options = {
            series: [{
                name: 'Total Deposit',
                data: [
                  @foreach($months as $month)
                    {{ getAmount(@$depositsMonth->where('months',$month)->first()->depositAmount) }},
                  @endforeach
                ]
            }, {
                name: 'Total Withdraw',
                data: [
                  @foreach($months as $month)
                    {{ getAmount(@$withdrawalMonth->where('months',$month)->first()->withdrawAmount) }},
                  @endforeach
                ]
            }],
            chart: {
                type: 'bar',
                height: 450,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '50%',
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
                categories: @json($months),
            },
            yaxis: {
                title: {
                    text: "{{__($general->cur_sym)}}",
                    style: {
                        color: '#7c97bb'
                    }
                }
            },
            grid: {
                xaxis: {
                    lines: {
                        show: false
                    }
                },
                yaxis: {
                    lines: {
                        show: false
                    }
                },
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return "{{__($general->cur_sym)}}" + val + " "
                    }
                }
            }
        };
        var chart = new ApexCharts(document.querySelector("#apex-bar-chart"), options);
        chart.render();
        var ctx = document.getElementById('userBrowserChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: @json($chart['user_browser_counter']->keys()),
                datasets: [{
                    data: {{ $chart['user_browser_counter']->flatten() }},
                    backgroundColor: [
                        '#ff7675',
                        '#6c5ce7',
                        '#ffa62b',
                        '#ffeaa7',
                        '#D980FA',
                        '#fccbcb',
                        '#45aaf2',
                        '#05dfd7',
                        '#FF00F6',
                        '#1e90ff',
                        '#2ed573',
                        '#eccc68',
                        '#ff5200',
                        '#cd84f1',
                        '#7efff5',
                        '#7158e2',
                        '#fff200',
                        '#ff9ff3',
                        '#08ffc8',
                        '#3742fa',
                        '#1089ff',
                        '#70FF61',
                        '#bf9fee',
                        '#574b90'
                    ],
                    borderColor: [
                        'rgba(231, 80, 90, 0.75)'
                    ],
                    borderWidth: 0,
                }]
            },
            options: {
                aspectRatio: 1,
                responsive: true,
                maintainAspectRatio: true,
                elements: {
                    line: {
                        tension: 0 // disables bezier curves
                    }
                },
                scales: {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: false
                    }]
                },
                legend: {
                    display: false,
                }
            }
        });
        var ctx = document.getElementById('userOsChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: @json($chart['user_os_counter']->keys()),
                datasets: [{
                    data: {{ $chart['user_os_counter']->flatten() }},
                    backgroundColor: [
                        '#ff7675',
                        '#6c5ce7',
                        '#ffa62b',
                        '#ffeaa7',
                        '#D980FA',
                        '#fccbcb',
                        '#45aaf2',
                        '#05dfd7',
                        '#FF00F6',
                        '#1e90ff',
                        '#2ed573',
                        '#eccc68',
                        '#ff5200',
                        '#cd84f1',
                        '#7efff5',
                        '#7158e2',
                        '#fff200',
                        '#ff9ff3',
                        '#08ffc8',
                        '#3742fa',
                        '#1089ff',
                        '#70FF61',
                        '#bf9fee',
                        '#574b90'
                    ],
                    borderColor: [
                        'rgba(0, 0, 0, 0.05)'
                    ],
                    borderWidth: 0,
                }]
            },
            options: {
                aspectRatio: 1,
                responsive: true,
                elements: {
                    line: {
                        tension: 0 // disables bezier curves
                    }
                },
                scales: {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: false
                    }]
                },
                legend: {
                    display: false,
                }
            },
        });
        // Donut chart
        var ctx = document.getElementById('userCountryChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: @json($chart['user_country_counter']->keys()),
                datasets: [{
                    data: {{ $chart['user_country_counter']->flatten() }},
                    backgroundColor: [
                        '#ff7675',
                        '#6c5ce7',
                        '#ffa62b',
                        '#ffeaa7',
                        '#D980FA',
                        '#fccbcb',
                        '#45aaf2',
                        '#05dfd7',
                        '#FF00F6',
                        '#1e90ff',
                        '#2ed573',
                        '#eccc68',
                        '#ff5200',
                        '#cd84f1',
                        '#7efff5',
                        '#7158e2',
                        '#fff200',
                        '#ff9ff3',
                        '#08ffc8',
                        '#3742fa',
                        '#1089ff',
                        '#70FF61',
                        '#bf9fee',
                        '#574b90'
                    ],
                    borderColor: [
                        'rgba(231, 80, 90, 0.75)'
                    ],
                    borderWidth: 0,
                }]
            },
            options: {
                aspectRatio: 1,
                responsive: true,
                elements: {
                    line: {
                        tension: 0 // disables bezier curves
                    }
                },
                scales: {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: false
                    }]
                },
                legend: {
                    display: false,
                }
            }
        });
        // apex-line chart
        var options = {
        chart: {
            height: 450,
            type: "area",
            toolbar: {
            show: false
            },
            dropShadow: {
            enabled: true,
            enabledSeries: [0],
            top: -2,
            left: 0,
            blur: 10,
            opacity: 0.08
            },
            animations: {
            enabled: true,
            easing: 'linear',
            dynamicAnimation: {
                speed: 1000
            }
            },
        },
        dataLabels: {
            enabled: false
        },
        series: [
            {
            name: "Plus Transactions",
            data: [
                @foreach($trxReport['date'] as $trxDate)
                    {{ @$plusTrx->where('date',$trxDate)->first()->amount ?? 0 }},
                @endforeach
            ]
            },
            {
            name: "Minus Transactions",
            data: [
                    @foreach($trxReport['date'] as $trxDate)
                        {{ @$minusTrx->where('date',$trxDate)->first()->amount ?? 0 }},
                    @endforeach
                ]
            }
        ],
        fill: {
            type: "gradient",
            gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.7,
            opacityTo: 0.9,
            stops: [0, 90, 100]
            }
        },
        xaxis: {
            categories: [
                @foreach($trxReport['date'] as $trxDate)
                    "{{ $trxDate }}",
                @endforeach
            ]
        },
        grid: {
            padding: {
            left: 5,
            right: 5
            },
            xaxis: {
            lines: {
                show: false
            }
            },
            yaxis: {
            lines: {
                show: false
            }
            },
        },
        };
        var chart = new ApexCharts(document.querySelector("#apex-line"), options);
        chart.render();


    </script> --}}
@endpush
