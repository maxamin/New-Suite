<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>{{env('APP_NAME')}}</title>
    <link rel="stylesheet" href="{{asset('public')}}/static/plugin/bootstrap-4.6.2/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('public')}}/static/plugin/layer/theme/default/layer.css?2">
    <link rel="stylesheet" href="{{asset('public')}}/static/styles/common.css?3">
    <script src="{{asset('public')}}/static/plugin/jquery-3.5.1.min.js"></script>
    <script src="{{asset('public')}}/static/plugin/bootstrap-4.6.2/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('public')}}/static/plugin/layer/layer.js"></script>
    <link rel="stylesheet" href="{{asset('public')}}/static/plugin/layer/theme/default/layer.css?v=3.5.1"
          id="layuicss-layer">
    <script src="{{asset('public')}}/static/js/main.js?2"></script>
</head>
<body>
<link rel="stylesheet" href="{{asset('public')}}/pageCss/wallet.css?4">

<style>
    body {
        background: linear-gradient(rgb(0 0 0 / 28%), rgb(61 61 61 / 61%)), url("{{asset('public/bg.jpg')}}");
        background-attachment: fixed;
        background-size: cover;
    }
    .center-panel {
        background: transparent;
    }
    .box-sts {
        background: #1dcbff33;
    }
</style>
<!-- CENTER PANEL -->
<div class="center-panel">

    <div class="top">
        <div class="title">Deposit assets</div>
        <div class="pr-3">

        </div>
    </div>
    <div id="main" class="main page-main">

        <div class="box-sts">
            <div class="glz-syf">
                <div>
                    <span class="fz13">Assets Overview</span> <span class="fz14">（{{currency()}}）</span>
                </div>
                <span>{{price(user()->balance)}}</span>
            </div>
            <div class="jj-fled">
                <div class="jj-fled-item">
                    <div>Daily Income</div>
                    <span>{{price(\App\Models\Purchase::where('user_id', user()->id)->sum('daily_income'))}}</span>
                </div>
                <div class="jj-fled-item">
                    <div>
                    </div>
                    <span>
          </span>
                </div>
            </div>
        </div>

        <div class="bkb-btn-area">
            <div class="bkb-btn" onclick="go('{{route('recharge')}}')">
                <img src="{{asset('public')}}/static/images/bill/recharge.png" alt="">
                Deposit
            </div>
            <div class="bkb-btn" onclick="go('{{route('user.withdraw')}}')">
                <img src="{{asset('public')}}/static/images/bill/withdraw.png" alt="">
                Withdraw
            </div>
        </div>

        @foreach(\App\Models\UserLedger::where('user_id', user()->id)->where('reason', 'daily_income')->orderByDesc('id')->get() as $element)
        <div class="box-sts" style="height: 80px;margin: 5px 0;">
            <div class="glz-syf">
                <div>
                    <span class="fz13">product income </span>
                </div>
                <span style="font-size: 20px;">{{price($element->amount)}}</span>
                <span style="font-size: 15px;">| {{$element->created_at}}</span>
            </div>
        </div>
        @endforeach
    </div>
    @include('app.layout.manu')

</div>
</body>
</html>
