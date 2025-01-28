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

<link rel="stylesheet" href="{{asset('public')}}/pageCss/purseBind.css?1">
<style>
    .center-panel .main {
        background: linear-gradient(rgb(0 0 0 / 28%), rgb(61 61 61 / 61%)), url("{{asset('public/bg.jpg')}}");
        background-attachment: fixed;
        background-size: cover;
    }
    .form-box-wrap {
        border-radius: 10px;
        background: transparent;
    }
    .pb-msg {
        color: #fff;
    }
    .pb-msg {
    color: #fff;
    text-align: justify;
}
</style>
<div class="center-panel">


    <div class="top">
        <svg onclick="go('{{route('dashboard')}}')" class="back" viewBox="0 0 1024 1024">
            <path d="M395.21518 513.604544l323.135538-312.373427c19.052938-18.416442 19.052938-48.273447 0-66.660212-19.053961-18.416442-49.910737-18.416442-68.964698 0L291.75176 480.290811c-19.052938 18.416442-19.052938 48.273447 0 66.660212l357.633237 345.688183c9.525957 9.207709 22.01234 13.796214 34.497699 13.796214 12.485359 0 24.971741-4.588505 34.466999-13.82896 19.052938-18.416442 19.052938-48.242747 0-66.660212L395.21518 513.604544z"></path>
        </svg>
        <div class="title">Wallet</div>
        <div class="lang"></div>
    </div>

    <div id="main" class="main page-main">
        <form action="{{route('setup.gateway.submit')}}" method="post">
            @csrf
            <div class="form-box-wrap">
                <div class="pb-input-group">
                    <div class="label">Holder's name</div>
                    <div class="form-input-box form-input-box-sm">
                        <input class="form-input" type="text" name="name" maxlength="34"
                               placeholder="Set bank owner name">
                    </div>
                </div>

                <div class="pb-input-group">
                    <div class="label">Wallet type</div>
                    <div class="form-input-box form-input-box-sm">
                        <select name="gateway_method" id="gateway_method" class="form-input">
                            @foreach(\App\Models\PaymentMethod::get() as $element)
                                <option value="{{$element->name}}">{{$element->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="pb-input-group">
                    <div class="label">Wallet address</div>
                    <div class="form-input-box form-input-box-sm">
                        <input class="form-input" type="text" name="gateway_number" maxlength="34"
                               placeholder="Set wallet address">
                    </div>
                </div>

                <div class="pb-input-group">
                    <div class="label">Withdrawal password</div>
                    <div class="form-input-box form-input-box-sm">
                        <input class="form-input" type="password" name="password" maxlength="6"
                               placeholder="Set withdrawal password">
                    </div>

                </div>
            </div>
        </form>

        <button class="button form-button confirm">OK</button>

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

<!-- Bottom tabBar -->
@include('app.layout.manu')

</body>
</html>
