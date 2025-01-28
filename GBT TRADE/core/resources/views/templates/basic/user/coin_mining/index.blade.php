@extends($activeTemplate . 'layouts.master')
@section('content')

<style>
    .rotateCoin {
        animation: rotation 2s;
        animation-timing-function: linear;
        animation-iteration-count: infinite;
    }

    @keyframes rotation {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(359deg);
    }
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

            <div class="main-container mb-3 py-0">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col mt-1">
                            <marquee behavior="scroll" direction="left">
                                {{ @$coin->notice }}
                            </marquee>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-container">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="card">
                                <div class="card-body">
                                    {{-- <img width="100px" height="100px" class="img-thumbnail rounded-circle"  src="{{ asset('assets/images/custom_coin/'. $coin->image) }}" alt=""> --}}
                                    <h6 class="text-light mb-0">{{@$coin->name}} - {{showAmount($user->coin_balance)}} {{@$coin->symbol}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-3 text-center">
                            <img width="140px" height="140px" class="img-thumbnail rounded-circle gptCoin @if($user->isCoinMining) rotateCoin @endif"  src="{{ asset('assets/images/custom_coin/'. $coin->image) }}" alt="">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 my-3 text-center">
                            @if ($user->isCoinMining)
                                <a class="btn btn-success text-white">Mining is On</a>
                            @else
                                <a class="btn btn-outline-success startMining">Start Mining</a>
                            @endif
                        </div>
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
    $(document).on('click', '.startMining', function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "{{route('user.coin.mining.on')}}",
            success: function (res) {
                notifyMsg(res.msg, res.cls)
                $('.startMining').html('Mining is On').addClass('btn-success text-light');
                $('.gptCoin').addClass('rotateCoin');

                // $('.miningImg').attr('src', `{{asset('assets/images/coin-mining/gpt-mining-on.gif')}}`);
            }
        });


    });
</script>
@endpush
