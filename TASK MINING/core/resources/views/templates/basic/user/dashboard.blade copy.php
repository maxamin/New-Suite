@extends($activeTemplate.'layouts.mobile')
@section('content')
@php
    $kycInfo = getContent('kyc_info.content',true);
@endphp
<div id="appCapsule">
    <!-- Profile Card -->
    <div>
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
                            @if($user->plan)
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

    </div>



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





{{-- <section class="cmn-section">
    <div class="container">
        <div class="row cmn-text">
            <div class="col-md-12 mb-4">
                @if(auth()->user()->kv == 0)
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
                            @if($user->plan)
                                {{ __($user->plan->name) }} @if($user->expire_date < now()) (@lang('Expired')) @endif
                            @else
                                @lang('No Plan')
                            @endif
                        </h2>
                        <div class="d-flex flex-wrap justify-content-between position-relative">
                            <p>@lang('My Plan')</p>
                        <a href="{{ route('plans') }}" class="btn cmn-btn">@if($user->expire_date >= now()) @lang('Change Plan') @else @lang('Plans') @endif <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                        @if($user->expire_date >= now())
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
@push('script')
<script src="{{ asset('assets/admin/js/vendor/apexcharts.min.js') }}"></script>
<script>
(function ($) {
    "use strict";
    // apex-bar-chart js
    var options = {
      series: [{
      name: 'Clicks',
      data: [
        @foreach($chart['click'] as $key => $click)
            {{ $click }},
        @endforeach
      ]
    }, {
      name: 'Earn Amount',
      data: [
            @foreach($chart['amount'] as $key => $amount)
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
      @foreach($chart['amount'] as $key => $amount)
                '{{ $key }}',
            @endforeach
    ],
    },
    fill: {
      opacity: 1
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return val
        }
      }
    }
    };
    // var chart = new ApexCharts(document.querySelector("#apex-bar-chart"), options);
    // chart.render();
        function createCountDown(elementId, sec) {
            var tms = sec;
            var x = setInterval(function() {
                var distance = tms*1000;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById(elementId).innerHTML =days+"d: "+ hours + "h "+ minutes + "m " + seconds + "s ";
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById(elementId).innerHTML = "{{__('COMPLETE')}}";
                }
                tms--;
            }, 1000);
        }
      createCountDown('counter', {{\Carbon\Carbon::tomorrow()->diffInSeconds()}});
})(jQuery);
</script>
@endpush
