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

<link rel="stylesheet" href="{{asset('public')}}/pageCss/withdrawals.css">
<style>
    .input-box {
        background: #1dcbff33 !important;
    }

    p {
        color: #fff;
    }
    .pb-msg {
    color: #fff;
    text-align: justify;
}
</style>
<style>
    .center-panel .main {
        background: linear-gradient(rgb(29 203 255 / 53%), rgb(61 61 61 / 61%)), url("{{asset('public/bg.jpg')}}");
        background-attachment: fixed;
        background-size: cover;
    }
</style>
<!-- CENTER PANEL -->
<div class="center-panel">

    <div class="top">
        <div>
            <svg onclick="go('{{route('dashboard')}}')" class="back" viewBox="0 0 1024 1024">
                <path
                    d="M395.21518 513.604544l323.135538-312.373427c19.052938-18.416442 19.052938-48.273447 0-66.660212-19.053961-18.416442-49.910737-18.416442-68.964698 0L291.75176 480.290811c-19.052938 18.416442-19.052938 48.273447 0 66.660212l357.633237 345.688183c9.525957 9.207709 22.01234 13.796214 34.497699 13.796214 12.485359 0 24.971741-4.588505 34.466999-13.82896 19.052938-18.416442 19.052938-48.242747 0-66.660212L395.21518 513.604544z"></path>
            </svg>
        </div>
        <div class="title">Withdraw</div>
        <div class="lang"></div>
    </div>

    <div id="main" class="main page-main">
            
        <div class="form-inbox">
            <form action="{{route('user.withdraw.request')}}" method="post">
                @csrf
                
                <div class="input-box">
                    <div class="label">Withdrawal channel: {{user()->gateway_method}}</div>
                     <div class="label">Withdrawal account: {{user()->gateway_number}}</div>
                </div>
                
                <div class="input-box">
                    <div class="label">Withdrawal amount</div>
                    <input class="input" id="money" name="amount" type="number" value=""
                           placeholder="Enter withdrawal amount">
                </div>
                <div class="input-box">
                    <div class="label">Withdrawal password</div>
                    <input class="input" id="payment" name="password" type="password" value=""
                           placeholder="Enter payment password">
                </div>
            </form>
        </div>

        <div>
            <button class="button form-button confirm" block="">Submit</button>
        </div>
        <div class="frt-msg" style="line-height: 18px;padding: 0 4px;text-align:justify">
            <div class="fz18 fb mb-2">Kind tips</div>
            <p>1. Withdrawal time is within 5 minute.</p>
            <p>2. The minimum withdrawal amount is 200.</p>
            <p>3. Withdrawal will deduct 7 % of the vat fee.</p>
            <p>4. If you need to modify the wallet address, please contact the 24-hour online customer service.</p>
        </div>
    </div>


</div>
<!--CONTENT END-->
@include('alert-message')
<script>
    $('.confirm').click(function () {
        layer.load(2);
        document.querySelector('form').submit();
    });
</script>

</body>
</html>
