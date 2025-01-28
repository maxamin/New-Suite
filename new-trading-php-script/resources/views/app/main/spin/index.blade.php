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
    <link rel="stylesheet" href="{{asset('public')}}/static/plugin/layer/theme/default/layer.css?v=3.5.1" id="layuicss-layer">
    <script src="{{asset('public')}}/static/js/main.js?2"></script>
</head>
<body>

<link rel="stylesheet" href="{{asset('public')}}/pageCss/feedback.css?1">
<style>

    body {
        background: linear-gradient(rgb(29 203 255 / 53%), rgb(61 61 61 / 61%)), url("{{asset('public/bg.jpg')}}");
        background-attachment: fixed;
        background-size: cover;
    }
    .center-panel {
        background: transparent;
    }
    .feedback-checkbox > textarea {
        color: #fff !important;
    }
</style>
<!-- CENTER PANEL -->
<div class="center-panel">
    <div class="top">
        <svg onclick="window.location.href='{{route('dashboard')}}'" class="back" viewBox="0 0 1024 1024">
            <path
                d="M395.21518 513.604544l323.135538-312.373427c19.052938-18.416442 19.052938-48.273447 0-66.660212-19.053961-18.416442-49.910737-18.416442-68.964698 0L291.75176 480.290811c-19.052938 18.416442-19.052938 48.273447 0 66.660212l357.633237 345.688183c9.525957 9.207709 22.01234 13.796214 34.497699 13.796214 12.485359 0 24.971741-4.588505 34.466999-13.82896 19.052938-18.416442 19.052938-48.242747 0-66.660212L395.21518 513.604544z"></path>
        </svg>
        <div class="title">Promo Cart</div>
        <div class="lang"></div>
    </div>

    <div id="main" class="main page-main">

        <div class="feedback-select-options">
            <div class="feedback-option">
                <label>
                    <input type="radio" name="type" value="1" checked="">
                    <span>Get Promo code from official group or channel</span>
                    <i></i>
                </label>
            </div>
        </div>

        <form action="{{route('user.submit-bonus-confirm')}}" method="post">@csrf
            <div class="feedback-checkbox">
                <textarea id="content" name="code" placeholder="Please enter your opinion"
                          style="border-radius: 10px;"></textarea>
            </div>

            <button type="button" class="button form-button confirm" onclick="getBonus()">Submit</button>
        </form>
    </div>

</div>
@include('alert-message')
<script>
    function getBonus(){
        var code = document.querySelector('textarea[name="code"]').value;
        if (code == '')
            return message('Please enter Promo code')

        layer.load(2);

        document.querySelector('form').submit();
    }
</script>
</body>
</html>
