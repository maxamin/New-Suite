@extends($activeTemplate . 'layouts.master')
@section('content')

    <body class="body-scroll d-flex flex-column h-100 menu-overlay" data-page="homepage">
        <!-- Top navbar -->
        @include($activeTemplate . 'includes.side_nav')

        <!-- Begin page content -->
        <main class="flex-shrink-0 main has-footer">
            <!-- Fixed navbar -->
            @include($activeTemplate . 'includes.top_nav')

            <!-- Balance Card -->
            @include('templates.basic.component.balance_card')

            <div class="main-container mb-3 py-0">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col mt-1">
                            <marquee behavior="scroll" direction="left">
                                {{ @$general->trade_notice }}
                            </marquee>
                        </div>
                    </div>
                </div>
            </div>

            @php
                $time1 = date_create(@$general->trade_time_start ? $general->trade_time_start : '05:00pm');
                $time2 = date_create(@$general->trade_time_stop ? $general->trade_time_stop : '06:00pm');
            @endphp
            <div class="main-container mb-3">
                @if (@$general->holiday1 == Date('D') || @$general->holiday2 == Date('D'))
                    <h2 class="text-center">Today is Holiday</h2>
                    <div class="row">
                        <div class="col text-center">
                            <img width="90%" class="border-custom" src="{{ asset('assets/images/custom-mining/holiday-2.png') }}" alt="Holiday">
                        </div>
                    </div>
                @else
                    <div class="container">



                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="mb-0">
                                    Trading Status
                                </h4>
                            </div>
                            <div class="col-auto">
                                <div id="trigerBtn">
                                    @if ($user->isTrading)
                                        @if ($user->tradingDate <= date('Y-m-d'))
                                            <button class="btn btn-default border-0 collectBonus">Collect</button>
                                        @else
                                            <button class="btn btn-success" disabled>ON</button>
                                        @endif
                                    @else
                                        @if (getTime($time1) <= getTime(now()) && getTime($time2) >= getTime(now()))
                                            <button class="btn btn-warning aiTradeOn">OFF</button>
                                        @else
                                            <button class="btn btn-warning offMsg disabled">OFF</button>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mt-2">
                                {{-- @if ($user->isTrading)
                                    <img width="100%" class="border-custom shadow aiTradeImg" src="{{asset('assets/images/ai-mining/ai-mining-on-2.gif')}}" alt="">
                                @else
                                    <img width="100%" class="border-custom shadow aiTradeImg" src="{{asset('assets/images/ai-mining/ai-mining-off-2.png')}}" alt="">
                                @endif --}}
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-2">
                                <h6 class="text-center mt-2 mb-2">Daily History</h6>
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col text-left">
                                                <h5 class="mb-1 text-white">
                                                    {{@$general->coin_one}}/{{@$general->coin_two}}, <span class="text-{{$general->buy_sell=='Buy'?'success':'danger'}} ">{{@$general->buy_sell}}</span>
                                                </h5>
                                                <h6 class="mb-0">
                                                    1 {{@$general->coin_one}} <i class="las la-arrow-right"></i> <span class="text-warning" id="coinPrice"> <div class="spinner-border spinner-border-sm" role="status"></div> </span> {{@$general->coin_two}}
                                                </h6>
                                            </div>
                                            <div class="col-auto text-right">
                                                <p class="mb-0">
                                                    {{ date_format(Carbon\Carbon::now(), 'd M Y') }}
                                                </p>
                                                <span class="todayProfit">
                                                    @if (@$todayAiProfit->trx_type == '+')
                                                        <h5 class="mb-0 text-success">
                                                            + {{$general->cur_sym}} {{showAmount(@$todayAiProfit->amount)}}
                                                        </h5>
                                                    @elseif(@$todayAiProfit->trx_type == '-')
                                                        <h5 class="mb-0 text-danger">
                                                            - {{$general->cur_sym}} {{showAmount(@$todayAiProfit->amount)}}
                                                        </h5>
                                                    @else
                                                        <h5 class="mb-0 text-success">
                                                            {{$general->cur_sym}} {{showAmount(@$todayAiProfit->amount)}}
                                                        </h5>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="main-container mb-3 py-1">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col text-center">
                            <h6 class="text-shadow mb-0">My Level - {{ $user->level_id ? $user->level->name : 'NO' }}</h6>
                        </div>
                    </div>
                </div>
            </div>

            <!-- All Levels -->
            <div class="main-container mb-2">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-12 text-center">
                            <h5 class="mb-0">
                                All Levels
                            </h5>
                        </div>
                    </div>

                    <div class="row mt-3">
                        @foreach ($levels as $lev)
                        <div class="col-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                            <div class="col-auto">
                                                <img width="50" height="50" src="https://img.icons8.com/fluency/100/stairs-up.png" alt="level-up"/>
                                            </div>
                                            <div class="col">
                                                <h5 class="">{{$lev->name}}</h5>
                                                <p class="mb-0">Min: {{$lev->min}} {{$general->cur_text}}</p>
                                                <p class="mb-0">Max: {{$lev->max}} {{$general->cur_text}}</p>
                                                <p class="mb-0">Profit: {{$lev->profit}}% (approx)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </main>

        <!-- footer-->
        @include($activeTemplate . 'includes.bottom_nav')

    </body>
@endsection

@push('script')
<script>
    //userinFo
    const userInfo = function() {
        $.ajax({
            type: "GET",
            url: "{{ route('user.userinfo') }}",
            success: function(res) {
                console.log(res);
                isClicked = res.isClick
                if (res.plan) {
                    adsRate = res.plan.ads_rate;
                    planID = res.plan.id;
                }
                $('.user_balance').html('{{ $general->cur_sym }} '+parseFloat(res.balance).toFixed(2));
                $('.user_trade_balance').html('{{ $general->cur_sym }} ' + parseFloat(res.trade_balance).toFixed(2));
            }
        });
    }

    // const getCryptoPrice = (coin1, coin2) =>{
    //     $.ajax({
    //         type: "GET",
    //         url: `https://min-api.cryptocompare.com/data/price?fsym=${coin1}&tsyms=${coin2}`,
    //         success: function (res) {
    //             console.log(res);
    //         }
    //     });
    // }
    // getCryptoPrice('BTC', 'USDT')

    //coinPrice function
    const coinPrice = function() {
        $.ajax({
            type: "GET",
            url: "{{route('user.ptc.coin.price')}}",
            success: function (res) {
                let price = res.data;
                // console.log(price);
                $('#coinPrice').text(`${price}`);
            }
        });
    }

    //run on window load
    userInfo()

    //coin price get
    setTimeout(() => {
        coinPrice();
    }, 500);
    setInterval(() => {
        coinPrice();
    }, 6000);

    // trade on
    $(document).on('click', '.aiTradeOn', function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "{{route('user.ai.trade.on')}}",
            success: function (res) {
                notifyMsg(res.msg, res.cls)
                if (res.cls=='success') {
                    $('#trigerBtn').html(`<button class="btn btn-success" disabled>ON</button>`);
                    $('.aiTradeImg').attr('src', `{{asset('assets/images/ai-mining/ai-mining-on-2.gif')}}`);
                }
            }
        });
    });

    // collect bonus
    $(document).on('click', '.collectBonus', function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "{{route('user.ai.collect.bonus')}}",
            success: function (res) {
                let profit = res.profit;
                notifyMsg(res.msg, res.cls)
                if (res.cls == 'success') {
                    $('#trigerBtn').html(`<button class="btn btn-warning offMsg disabled">OFF</button>`);
                    $('.aiTradeImg').attr('src', `{{asset('assets/images/ai-mining/ai-mining-off-2.png')}}`);

                    // $('#todayProfit').html(profit.toFixed(2)); // update today profit

                    if (res.type == '+') {
                        $('.todayProfit').html(`
                            <h5 class="mb-0 text-success">
                                + {{$general->cur_sym}} ${profit.toFixed(2)}
                            </h5>
                        `);
                    } else {
                        $('.todayProfit').html(`
                            <h5 class="mb-0 text-danger">
                                - {{$general->cur_sym}} ${profit.toFixed(2)}
                            </h5>
                        `);
                    }
                }
                userInfo() // update balance
            }
        });
    });

    // off Msg
    $(document).on('click', '.offMsg', function () {
        notifyMsg('Please, Wait till '+'{{$general->trade_time_start}}', 'warning');

    });

</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const labels = [
        '','','','','','','','','','','','','','','','','','','','',
    ];
    // const labels = ['12:00am', '01:00am', '02:00am', '03:00am', '04:00am', '05:00am', '06:00am', '07:00am', '08:00am', '09:00am', '10:00am', '11:00am', '12:00pm', '01:00pm', '02:00pm', '03:00pm', '04:00pm', '05:00pm', '06:00pm', '07:00pm', '08:00pm', '09:00pm', '10:00pm', '11:00pm'];

    const config = {
        type: 'bar',
        data: {
        labels: labels,
        datasets: [{
            label: '',
            data: [
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor()
            ],
            backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
            'rgb(255, 99, 132)',
            'rgb(75, 192, 192)',
            ],
            borderWidth: 1
        }]
    },
        options: {
            scales: {
            y: {
                beginAtZero: false
            }
            }
        },
    };

    var myChart = new Chart(ctx, config);
    setInterval(() => {
        config.data.datasets.forEach(function(dataset) {
            dataset.data = dataset.data.map(function() {
                return randomScalingFactor();
            });
        });
        myChart.update();
    }, 1000);

</script>

@endpush
