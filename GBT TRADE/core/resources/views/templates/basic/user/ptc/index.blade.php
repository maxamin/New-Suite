@extends($activeTemplate . 'layouts.master')
@section('content')
    @php
        header('Access-Control-Allow-Origin: *');
    @endphp
    <style>
        .StyleFont {
            font-family: "Times New Roman", Times, serif;
        }

        body {
            text-align: center;
            background-color: #3d5fa5;
        }

        .button {
            position: relative;
            display: inline-block;
            margin: 20px;
        }

        .buttonOff {
            position: relative;
            display: inline-block;
            margin: 20px;
        }

        .button a {
            color: white;
            font-family: Helvetica, sans-serif;
            font-weight: bold;
            font-size: 36px;
            text-align: center;
            text-decoration: none;
            background-color: #FFA12B;
            display: block;
            position: relative;
            padding: 20px 23px;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            text-shadow: 1px 2px 6px #0000007a;
            filter: dropshadow(color=#000, offx=0px, offy=1px);
            -webkit-box-shadow: inset 0 1px 0 #FFE5C4, 0 10px 0 #915100;
            -moz-box-shadow: inset 0 1px 0 #FFE5C4, 0 10px 0 #915100;
            box-shadow: inset 0 1px 0 #FFE5C4, 0 10px 0 #915100;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 75px;
        }

        .buttonOff a {
            color: white;
            font-family: Helvetica, sans-serif;
            font-weight: bold;
            font-size: 36px;
            text-align: center;
            text-decoration: none;
            background-color: #bbbbbb;
            display: block;
            position: relative;
            padding: 20px 23px;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            text-shadow: 1px 2px 6px #0000007a;
            filter: dropshadow(color=#000, offx=0px, offy=1px);
            -webkit-box-shadow: inset 0 1px 0 #FFE5C4, 0 10px 0 #14141499;
            -moz-box-shadow: inset 0 1px 0 #FFE5C4, 0 10px 0 #14141499;
            box-shadow: inset 0 1px 0 #FFE5C4, 0 10px 0 #14141499;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 75px;
        }

        .button a:active {
            top: 10px;
            background-color: #2b2b2b;

            -webkit-box-shadow: inset 0 1px 0 #FFE5C4, inset 0 -3px 0 #14141499;
            -moz-box-shadow: inset 0 1px 0 #FFE5C4, inset 0 -3pxpx 0 #14141499;
            box-shadow: inset 0 1px 0 #FFE5C4, inset 0 -3px 0 #14141499;
        }

        .buttonOff a:active {
            top: 10px;
            background-color: #605d59;

            -webkit-box-shadow: inset 0 1px 0 #FFE5C4, inset 0 -3px 0 #14141499;
            -moz-box-shadow: inset 0 1px 0 #FFE5C4, inset 0 -3pxpx 0 #14141499;
            box-shadow: inset 0 1px 0 #FFE5C4, inset 0 -3px 0 #14141499;
        }

        .button:after {
            content: "";
            height: 100%;
            width: 100%;
            padding: 4px;
            position: absolute;
            bottom: -15px;
            left: -4px;
            z-index: -1;
            background-color: #2B1800;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }

        .buttonOff:after {
            content: "";
            height: 100%;
            width: 100%;
            padding: 4px;
            position: absolute;
            bottom: -15px;
            left: -4px;
            z-index: -1;
            background-color: #2B1800;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }
    </style>

    <body class="body-scroll d-flex flex-column h-100 menu-overlay" data-page="homepage">
        <!-- Top navbar -->
        @include($activeTemplate . 'includes.side_nav')

        <!-- Begin page content -->
        <main class="flex-shrink-0 main has-footer">
            <!-- Fixed navbar -->
            @include($activeTemplate . 'includes.top_nav')

            <!-- Balance Card -->
            @include('templates.basic.component.balance_card')

            <div class="main-container">
                {{-- @if (@$general->holiday1 == Date('D') || @$general->holiday2 == Date('D'))
                    <h2 class="text-center">Today is Holiday</h2>
                    <div class="row">
                        <div class="col text-center">
                            <img width="90%" class="border-custom" src="{{ asset('assets/images/custom-mining/holiday-2.png') }}" alt="Holiday">
                        </div>
                    </div>
                @else
                @endif --}}
                <div class="row">
                    <div class="col-12 text-center">
                        @if (auth()->user()->isClick < date('Ymd') && auth()->user()->plan && auth()->user()->expire_date < now())
                            <h5 class="text-primary" id="btnMsg">Click this button to collect
                                {{ $user->plan?->ads_rate }} {{ $general->cur_sym }}</h5>
                        @endif
                    </div>

                    <div class="col-12 text-center">
                        @if (auth()->user()->isClick < date('Ymd'))
                            @if (auth()->user()->plan && auth()->user()->expire_date > now())
                                <div id="loadBtn">
                                    <button id="runTask" class="btn btn-lg shadow mineBtn">Collect Profit</button>
                                </div>
                            @else
                                <div id="loadBtn">
                                    <button id="runTask" class="btn btn-lg shadow mineBtn">Start Mining</button>
                                </div>
                            @endif
                        @else
                            <button class="btn btn-lg shadow mineOffBtn">Mining is ON</button>
                        @endif
                    </div>

                    {{-- <div class="col-12 py-2 text-center">
                        @if (auth()->user()->isClick < date('Ymd'))
                            <div id="countTimer" class="card mx-auto d-none" style="width: 90%">
                                <h5 class="text-white mb-0" id="counter"></h5>
                            </div>
                        @else
                            <div id="countTimer" class="card mx-auto" style="width: 90%">
                                <h5 class="text-white mb-0" id="counter"></h5>
                            </div>
                        @endif
                    </div> --}}

                    <div class="col-12 mt-3">

                        <div id="container">
                            <div id="bot" class="neutral">
                                <div id="head">
                                    <div id="left-ear">
                                        <div id="left-ear-inner"></div>
                                    </div>
                                    <div id="face">
                                        <div id="eyes">
                                            <div id="left-eye"></div>
                                            <div id="right-eye"></div>
                                        </div>
                                        <div id="mouth"></div>
                                    </div>
                                    <div id="right-ear">
                                        <div id="right-ear-inner"></div>
                                    </div>
                                </div>
                            </div>
                            <ul id="switches">
                                <li onmouseover="setStatus('')"> Neutral </li>
                                <li onmouseover="setStatus('speaking')"> Speaking </li>
                                <li onmouseover="setStatus('thinking')"> Thinking </li>
                                <li onmouseover="setStatus('listening')"> Listening </li>
                                <li onmouseover="setStatus('computing')"> Computing </li>
                            </ul>
                        </div>


                        {{-- @if (auth()->user()->isClick < date('Ymd'))
                            <img id="miningOnImg" class="img-fluid shadow" style="border-radius: 20px; height:200px" width="90%" src="{{ asset('assets/images/robot-mining/mining-off.png') }}" alt="">
                        @else
                            <img class="img-fluid shadow" style="border-radius: 20px; height:200px" width="90%" src="{{ asset('assets/images/robot-mining/mining-on.gif') }}" alt="">
                        @endif --}}
                    </div>
                    {{-- <div class="col-12">
                        <div class="container">
                            <label for="" class="text-start mt-2">Daily History</label>
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
                                                {{ Carbon\Carbon::now() }}
                                            </p>
                                            <h5 class="mb-0 text-success">
                                                {{$general->cur_sym}} {{showAmount(@$todayMining)}}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>

            </div>
            @if ($user->plan_id > 0)
                <div class="main-container my-3">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <img class="img-fluid" src="{{ asset('assets/images/plan/' . @$user->plan->image) }}"
                                    alt="image">
                            </div>
                            <div class="col-8 text-left">
                                <h5 class="text-white">{{ __($user->plan->name) }}</h5>
                                <p class="mb-0">Price: <b
                                        class="text-white text-no-shadow">{{ __(showAmount($user->plan->price)) }}
                                        {{ $general->cur_sym }}</b></p>
                                <p class="mb-0">Daily Earn: <b
                                        class="text-white text-no-shadow">{{ $user->plan->ads_rate }}
                                        {{ $general->cur_sym }} </b></p>
                                <p class="mb-0">Validity: <b class="text-white text-no-shadow">{{ $user->plan->validity }}
                                        Days</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </main>

        <!-- footer-->
        @include($activeTemplate . 'includes.bottom_nav')



    </body>
@endsection

@push('style')
    <style>
        body {
            background-color: #000;
            color: #FFF;
        }

        #switches {
            width: 100%;
            padding: 0;
            list-style-type: none;
            text-align: center;
        }

        #switches li {
            display: inline-block;
            font-size: large;
            padding: 0.5em 0.5em;
            cursor: pointer;
        }

        /* BOT */

        #bot {
            position: relative;
            text-align: left;
            width: 12rem;
            height: 12rem;
            min-width: 10em;
            min-height: 10em;
            /*border: 1px solid lightblue;*/
            margin: 0 auto;
        }

        #head {
            position: relative;
            display: inline-block;
            margin-top: 15%;
            margin-left: 10%;
            width: 80%;
            height: 70%;
            /*border : 1px solid yellow;*/
        }

        #face {
            position: absolute;
            margin-left: 0%;
            margin-right: 0%;
            width: 100%;
            height: 100%;
            border: 0.4em solid #FFF;
            border-radius: 1.5em;
            /*border : 1px solid red;*/
        }

        #left-ear,
        #right-ear {
            position: absolute;
            top: 30%;
            width: 6%;
            height: 25%;
            border: 0.15em solid #FFF;
            background-color: lightgray;
            border-radius: 0.1em;
        }

        #left-ear {
            left: -6%;
        }

        #right-ear {
            right: -6%;
        }

        #left-ear-inner,
        #right-ear-inner {
            position: absolute;
            top: 20%;
            width: 100%;
            height: 60%;
            background-color: lightgray;
            border-radius: 0.1em;
        }

        #left-ear-inner {
            left: -150%;
        }

        #right-ear-inner {
            right: -150%;
        }

        #eyes {
            position: absolute;
            width: 70%;
            height: 20%;
            margin-left: 16%;
            /* 16 */
            margin-top: 20%;
            /* 20 */
            /*border : 1px solid lightseagreen;*/
        }

        #left-eye,
        #right-eye {
            position: absolute;
            width: 35%;
            height: 100%;
            background-color: lightseagreen;
            border-radius: 0.5em;
            /*border: 0.15em solid #FFF;*/
        }

        #right-eye {
            right: 0%;
        }

        #mouth {
            position: absolute;
            width: 30%;
            height: 4%;
            border-left: 0.2em solid #FFF;
            border-right: 0.2em solid #FFF;
            border-bottom: 0.2em solid #FFF;
            border-top: 0.0em solid #FFF;
            border-radius: 0.5em;
            left: 35%;
            bottom: 20%;
        }

        /* Animations */
        #bot.neutral #left-eye,
        #bot.neutral #right-eye {
            animation: blink-eyes 3s infinite ease-in alternate;
            animation-delay: 2s;
        }

        #bot.neutral #left-ear-inner {
            animation: move-left-ear-inner 5.0s infinite ease alternate;
        }

        #bot.neutral #right-ear-inner {
            animation: move-right-ear-inner 5.0s infinite ease alternate;
        }

        @keyframes blink-eyes {
            0% {
                height: 10%;
                margin-top: 10%
            }

            10% {
                height: 100%;
                margin-top: 0%
            }

            100% {
                height: 100%;
                margin-top: 0%
            }
        }

        /* Speaking */
        #bot.speaking #mouth {
            border-top: 0.2em solid #FFF;
            background-color: #FFF;
            animation: speak-mouth 1.0s infinite ease alternate;
        }

        @keyframes speak-mouth {
            0% {
                width: 10%;
                height: 4%;
                left: 45%;
            }

            25% {
                width: 30%;
                height: 10%;
                left: 35%;
            }

            50% {
                width: 6%;
                height: 4%;
                left: 47%;
            }

            75% {
                width: 40%;
                height: 8%;
                left: 30%;
            }

            100% {
                width: 30%;
                height: 4%;
                left: 35%;
            }
        }

        /* Waiting (Thinking) */
        #bot.thinking #eyes {
            animation: glance-eyes 8s infinite ease-in-out;
            animation-delay: 2s;
        }

        #bot.thinking #mouth {
            animation: pinch-mouth 6.0s infinite ease alternate;
            animation-delay: 4s;
        }

        #bot.thinking #left-ear-inner {
            animation: move-left-ear-inner 6.0s infinite ease alternate;
            animation-delay: 4s;
        }

        #bot.thinking #right-ear-inner {
            animation: move-right-ear-inner 6.0s infinite ease alternate;
            animation-delay: 4s;
        }

        @keyframes glance-eyes {
            0% {
                margin-left: 16%;
            }

            10% {
                margin-left: 6%;
            }

            40% {
                margin-left: 6%;
            }

            60% {
                margin-left: 24%;
            }

            70% {
                margin-left: 24%;
            }

            80% {
                margin-left: 16%;
            }

            100% {
                margin-left: 16%;
            }
        }

        @keyframes pinch-mouth {
            0% {
                width: 30%;
                left: 35%;
            }

            48% {
                width: 30%;
                left: 35%;
            }

            50% {
                width: 10%;
                left: 45%;
            }

            52% {
                width: 30%;
                left: 35%;
            }

            100% {
                width: 30%;
                left: 35%;
            }
        }

        @keyframes move-left-ear-inner {
            0% {
                left: -150%;
            }

            48% {
                left: -150%;
            }

            50% {
                left: -100%;
            }

            52% {
                left: -150%;
            }

            100% {
                left: -150%;
            }
        }

        @keyframes move-right-ear-inner {
            0% {
                right: -150%;
            }

            48% {
                right: -150%;
            }

            50% {
                right: -100%;
            }

            52% {
                right: -150%;
            }

            100% {
                right: -150%;
            }
        }

        /* Listening */
        #bot.listening #left-eye,
        #bot.listening #right-eye {
            background-color: lightgreen;
            border-radius: 1em;
            transition: border-radius 0.25s linear;
            animation: none;
        }

        #bot.listening #left-ear,
        #bot.listening #right-ear,
        #bot.listening #left-ear-inner,
        #bot.listening #right-ear-inner {
            background-color: lightgreen;
        }

        #bot.listening #face,
        #bot.listening #left-ear,
        #bot.listening #right-ear {
            border-color: lightgreen;
            transition: border-color 0.25s linear;
        }

        #bot.listening #left-ear-inner,
        #bot.listening #right-ear-inner {
            /*outline: 0.4em dotted lightgreen;*/
            animation: border-bump 0.4s infinite ease alternate;
            animation-delay: 0.5s;
        }

        @keyframes border-bump {
            0% {
                outline: 0.4em dotted lightgreen;
            }

            100% {
                outline: 0.2em dotted black;
            }
        }


        /* Computing */
        #bot.computing #left-eye,
        #bot.computing #right-eye {
            height: 100%;
            width: 25%;
            border-radius: 100%;
            transition: all 0.25s linear;
            border: 0.3em dashed black;
            animation-delay: 0.5s;
            background-color: #99FFFF;
        }

        #bot.computing #left-eye {
            animation: border-dance 1s infinite linear reverse;
        }

        #bot.computing #right-eye {
            animation: border-dance 1s infinite linear;
        }

        #bot.computing #face,
        #bot.computing #left-ear,
        #bot.computing #right-ear,
        #bot.computing #left-ear-inner,
        #bot.computing #right-ear-inner {
            border-color: #99FFFF;
            transition: border-color 0.25s linear;
        }

        #bot.computing #left-ear,
        #bot.computing #right-ear,
        #bot.computing #left-ear-inner,
        #bot.computing #right-ear-inner {
            background-color: #99FFFF;
            transition: background-color 0.25s linear;
            animation: none;
        }

        #bot.computing #mouth {
            border: 0.5em solid #FFF;
            width: 10%;
            left: 45%;
        }

        @keyframes border-dance {
            100% {
                transform: rotateZ(360deg);
            }
        }
    </style>
@endpush

@push('script')
    <script>
        let isClicked = {{ auth()->user()->isClick ? auth()->user()->isClick : '0' }};
        let adsRate = {{ $user->plan?->ads_rate ? $user->plan?->ads_rate : '0' }};
        let planID = {{ $user->plan?->id ? $user->plan?->id : '0' }};

        let plan = '{{ $user->plan }}';
        let expire_date = '{{ $user->expire_date }}';

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
                    $('.user_balance').html('{{ $general->cur_sym }} ' + parseFloat(res.balance).toFixed(
                        2));
                    $('.user_trade_balance').html('{{ $general->cur_sym }} ' + parseFloat(res
                        .trade_balance).toFixed(2));
                }
            });
        }

        //coinPrice function
        const coinPrice = function() {
            $.ajax({
                type: "GET",
                url: "{{ route('user.ptc.coin.price') }}",
                success: function(res) {
                    let price = res.data;
                    console.log(price);
                    $('#coinPrice').text(`${price}`);
                }
            });
        }

        //run on window load
        userInfo()

        //coin price get
        // setTimeout(() => {
        //     coinPrice();
        // }, 500);
        // setInterval(() => {
        //     coinPrice();
        // }, 1000);

        //noTask
        $(document).on('click', '#noTask', function(e) {
            e.preventDefault();
            notifyMsg('You have already collect Todays Reward!', 'error');
        });

        //runTask
        $(document).on('click', '#runTask', function(e) {
            e.preventDefault();
            if (planID > 0 && expire_date > '{{ now() }}') {
                if (isClicked < {{ date('Ymd') }}) {
                    let reward = adsRate;
                    $.ajax({
                        type: "POST",
                        url: "{{ route('user.runtask') }}",
                        data: {
                            reward: reward
                        },
                        success: function(res) {
                            notifyMsg(res.msg, res.cls);
                            $("#btnMsg").html('');
                            $('#miningOnImg').attr('src',
                                `{{ asset('assets/images/robot-mining/mining-on.gif') }}`);
                            $("#loadBtn").html(
                                `<button class="btn btn-lg shadow mineOffBtn">Mining is ON</button>`
                            );
                            $('#countTimer').removeClass('d-none');

                            userInfo()
                        }
                    });
                } else {
                    notifyMsg('You have already collect Todays Reward!', 'error');
                }
            } else {
                notifyMsg('Buy a Robot at first!', 'warning');
            }
        });

        function setStatus(newstatus)
        {
            $("#bot").removeClass("speaking thinking listening computing");
            $("#bot").addClass(newstatus);
        }


        //create CountDown
        function createCountDown(elementId, sec) {
            var tms = sec;

            var x = setInterval(function() {
                if (isClicked >= {{ date('Ymd') }}) {
                    var distance = tms * 1000;
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    document.getElementById(elementId).innerHTML = days + "d: " + hours + "h " + minutes +
                        "m " + seconds + "s ";
                    if (distance < 0) {
                        clearInterval(x);
                        document.getElementById(elementId).innerHTML = "{{ __('COMPLETE') }}";

                    }
                    tms--;
                }

            }, 1000);
        }
        createCountDown('counter', {{ \Carbon\Carbon::tomorrow()->diffInSeconds() }});
    </script>
@endpush
