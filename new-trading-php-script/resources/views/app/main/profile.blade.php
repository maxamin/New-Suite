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

<link rel="stylesheet" href="{{asset('public')}}/pageCss/personalCenter.css?3">

<style>
    body {
        background: linear-gradient(rgb(0 0 0 / 28%), rgb(61 61 61 / 61%)), url("{{asset('public/bg.jpg')}}");
        background-attachment: fixed;
        background-size: cover;
    }
    .center-panel {
        background: transparent;
    }
    .personal-menu-list {
        background: #1dcbff33;
    }
    .personal-info-top{
        background: #1dcbff33;
    }
</style>
<div class="center-panel" style="padding: 0;">

    <div id="main" class="main page-main">

        <div class="personal-info">

            <div class="personal-info-top">
                <img class="personal-avatar" style="border-radius: 50px;" src="{{asset(setting('photo'))}}" alt="">
                <div class="personal-info-top-center">
                    <div class="personal-name">
                        {{user()->phone}} <img style="width: 12px" src="{{asset('public')}}/static/images/account/icon-copy.svg?2"
                                    onclick="doCopy('{{user()->phone}}')">
                    </div>
                    <div class="personal-code">
                        Invitation code: {{user()->ref_id}} <img style="width: 12px" src="{{asset('public')}}/static/images/account/icon-copy.svg?2"
                                                     onclick="doCopy('{{user()->ref_id}}')">
                    </div>
                </div>

                <div class="personal-invite" onclick="go('{{route('user.invite')}}')">
                    <img src="{{asset('public')}}/static/images/account/invite.png?2" alt="">
                    <label>Invite friends</label>
                </div>

            </div>

            <div class="personal-menu-list">

                <div class="personal-menu-item" onclick="go('{{route('user.change.password')}}')">
                    <img src="{{asset('public')}}/static/images/account/password.svg">
                    <div>Login password</div>
                    <i></i>
                </div>
                <div class="personal-menu-item" onclick="go('{{route('user.change.tpassword')}}')">
                    <img src="{{asset('public')}}/static/images/account/safe.svg">
                    <div>Transaction password</div>
                    <i></i>
                </div>
                <div class="personal-menu-item" onclick="go('{{route('history')}}')">
                    <img src="{{asset('public')}}/static/images/account/suggest.svg">
                    <div>History</div>
                    <i></i>
                </div>
                <div class="personal-menu-item" onclick="go('{{route('user.service')}}')">
                    <img src="{{asset('public')}}/static/images/account/help.svg">
                    <div>Help center</div>
                    <i></i>
                </div>

                <div class="personal-menu-item" onclick="clear_cache()">
                    <img src="{{asset('public')}}/static/images/account/clear.svg">
                    <div>Clear cache</div>
                    <i></i>
                </div>
                <div class="personal-menu-item" onclick="window.location.href='{{url('download-apk')}}'">
                    <img src="{{asset('public')}}/static/images/account/app.svg">
                    <div>App download</div>
                    <i></i>
                </div>
            </div>

            <button class="button form-button" onclick="logout()" block="">Exit</button>

        </div>


    </div>
    <!--CONTENT END-->
@include('alert-message')
    <script>
        function doCopy(content) {
            const msg = copyContentH5(content)
            if (copyContentH5(content) === 'successful') {
                message("Copy successfully");
            } else {
                message("Copy failed");
            }
        }

        function clear_cache() {
            layer.load(2);

            window.location.href='{{url('clear')}}'
        }

        function logout() {
            layer.load(2);

            window.location.href='{{route('logout')}}'
        }
    </script>


    <style>

        .service {
            display: none;
            position: fixed;
            width: 100%;
            height: 100vh;
            background: #000000a6;
            z-index: 1000;
            top: 0;
        }


        .service-inner {
            display: flex;
            justify-content: space-around;
            align-items: center;
            gap: 8px;
            padding: 16px;
            width: 100%;
            height: 100%;
            max-width: 540px;
        }

        .service-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 8px 4px 0;
            width: 33.33%;
            height: 120px;
            border-radius: 8px;
            background-color: #fff;
        }

        .service-item-icon {
            width: 72px;
        }

        .service-item-title {
            height: 32px;
            line-height: 32px;
            font-size: 14px;
            color: #444;
            text-align: center;
        }
    </style>

    <div id="service-pop" class="service" onclick="document.getElementById('service-pop').style.display='none'">
        <div class="service-inner">
            <a href="https://t.me/" class="service-item">
                <img src="{{asset('public')}}/static/images/service/s-1.png" class="service-item-icon">
                <div class="service-item-title">Telegram</div>
            </a>
        </div>
    </div>

    <!-- Bottom tabBar -->
@include('app.layout.manu')
    <!-- Bottom tabBar End -->

    <div id="float_ico"
         style="position: fixed; bottom: 104px; right: 10px; display: flex; justify-content: center; align-items: center; width: 48px; height: 48px;">
        <div style="cursor: pointer;" onclick="document.getElementById('service-pop').style.display='block'">
            <img src="{{asset('public')}}/static/images/cs.png" style="width: 40px;height: 40px;">
        </div>
    </div>


    <script>
        window.addEventListener('load', function () {
            //return;
            var actionDir = 1;
            var dec = 100;
            var sum = 5;
            var num = sum;
            var handel_t = setInterval(function () {
                try {
                    document.getElementById('float_ico').style.bottom = dec + "px";
                } catch (e) {
                }
                ;
                dec += actionDir;
                num += -1;
                if (num <= 0) {
                    actionDir *= -1;
                    num = sum
                }
            }, 100)
        })
    </script>

</div>
<div class="popup-mask"></div>
<div class="layui-layer-move" id="layui-layer-move"></div>
</body>
</html>
