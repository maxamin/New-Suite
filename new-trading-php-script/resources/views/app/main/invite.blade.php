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

<link rel="stylesheet" href="{{asset('public')}}/pageCss/invite.css">
<style>
    .center-panel .main {
        background: linear-gradient(rgb(0 0 0 / 28%), rgb(61 61 61 / 61%)), url("{{asset('public/bg.jpg')}}");
        background-attachment: fixed;
        background-size: cover;
    }

    .invite-box {
        background: #1dcbff33 !important;
    }
    .invite-text p {
        line-height: 26px;
        text-indent: 2em;
        color: #fff;
    }

</style>
<!-- CENTER PANEL -->
<div class="center-panel">


    <div class="top">
        <svg onclick="go('{{route('dashboard')}}')" class="back" viewBox="0 0 1024 1024">
            <path
                d="M395.21518 513.604544l323.135538-312.373427c19.052938-18.416442 19.052938-48.273447 0-66.660212-19.053961-18.416442-49.910737-18.416442-68.964698 0L291.75176 480.290811c-19.052938 18.416442-19.052938 48.273447 0 66.660212l357.633237 345.688183c9.525957 9.207709 22.01234 13.796214 34.497699 13.796214 12.485359 0 24.971741-4.588505 34.466999-13.82896 19.052938-18.416442 19.052938-48.242747 0-66.660212L395.21518 513.604544z"></path>
        </svg>
        <div class="title">Invite friends</div>
        <div class="lang"></div>
    </div>

    <div id="main" class="main invite-main">
        <div class="invite-box invite-link-block">
            <div class="invite-box-header">Invitation code:</div>
            <div class="invite-container">
                <input type="text" class="invite-text" value="{{auth()->user()->ref_id}}" disabled="disabled">
            </div>
        </div>
        <button class="form-button" onclick="doCopy('{{auth()->user()->ref_id}}')">Copy invitation code</button>
        <br>
        <br>
        <div class="invite-box invite-link-block">
            <div class="invite-box-header">Invitation link:</div>
            <div class="invite-container">
                <input type="text" class="invite-text" value="{{url('account/register').'?inviteCode='.auth()->user()->ref_id}}"
                       disabled="disabled">
            </div>
        </div>
        <button class="form-button" onclick="doCopy('{{url('account/register').'?inviteCode='.auth()->user()->ref_id}}')">Copy invitation link</button>

        <div style="margin-top: 20px;">
            <img style="width: 100%;border-radius: 10px;" src="{{asset('public/invite.jpg')}}" alt="">
        </div>

        <div class="invite-text">
            <p>Commission</p>
            <p>LV1 20% | LV2 3% | LV3 1%</p>

            <p>Invite your friends to join and make money through Diposit . Everyone can create their own team and business on Diposit and you will continue to receive at least 20%,3%,1% commission. No matter how much your friends make every day, week, or month, your commission will increase accordingly. Build your network, expand your influence, and increase your passive income.
            </p>
            <p>For example, if the friend you invite makes 350 a day through Diposit  , you will receive at least 70 bdt in commissions every day. As your network expands, your potential income will grow significantly.</p>
        </div>
    </div>


</div>
<!--CONTENT END-->
@include('alert-message')
<script>
    function doCopy(content) {
        if (copyContentH5(content) === 'successful') {
            message("Copy successfully");
        } else {
            message("Copy failed");
        }
    }
</script>

</body>
</html>
