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
<link rel="stylesheet" href="{{asset('public')}}/pageCss/password.css?1">
<style>
    .center-panel .main {
        background: linear-gradient(rgb(29 203 255 / 53%), rgb(61 61 61 / 61%)), url("{{asset('public/bg.jpg')}}");
        background-attachment: fixed;
        background-size: cover;
    }
    .form-input-group {
        border-radius: 10px;
        background: #1dcbff33;
    }
</style>
<!-- CENTER PANEL -->
<div class="center-panel">
    <div class="top">
        <svg onclick="go('{{route('profile')}}')" class="back" viewBox="0 0 1024 1024">
            <path
                d="M395.21518 513.604544l323.135538-312.373427c19.052938-18.416442 19.052938-48.273447 0-66.660212-19.053961-18.416442-49.910737-18.416442-68.964698 0L291.75176 480.290811c-19.052938 18.416442-19.052938 48.273447 0 66.660212l357.633237 345.688183c9.525957 9.207709 22.01234 13.796214 34.497699 13.796214 12.485359 0 24.971741-4.588505 34.466999-13.82896 19.052938-18.416442 19.052938-48.242747 0-66.660212L395.21518 513.604544z"></path>
        </svg>
        <div class="title">Set password</div>
        <div class="lang"></div>
    </div>

    <form action="{{route('user.change.password.confirmation')}}" method="post">@csrf
    <div class="main page-main">

        <div class="form-box">
            <div class="form-input-group">
                <div class="label">Old login password</div>
                <div class="form-input-box">

                    <input class="form-input-control form-input" type="password" name="old_password" maxlength="20"
                           placeholder="Please enter your old password">
                    <img class="form-input-icon form-input-eye-ico" src="{{asset('public')}}/static/images/icon/eye-line.png" alt="">

                </div>
            </div>

            <div class="form-input-group">
                <div class="label">New login password</div>
                <div class="form-input-box">
                    <input class="form-input form-input-control" type="password" name="new_password" maxlength="20"
                           placeholder="Please enter a new password">

                    <img class="form-input-icon form-input-eye-ico" src="{{asset('public')}}/static/images/icon/eye-line.png" alt="">

                </div>
            </div>

            <div class="form-input-group">
                <div class="label">Confirm new login password</div>
                <div class="form-input-box">
                    <input class="form-input-control form-input" type="password" name="confirm_password" maxlength="20"
                           placeholder="Enter the new password again">

                    <img class="form-input-icon form-input-eye-ico" src="{{asset('public')}}/static/images/icon/eye-line.png" alt="">

                </div>
            </div>
            <div class="form-footer-msg">
            </div>

            <button class="button form-button" type="button" block="" id="form-btn" onclick="do_login_password()">Submit</button>
        </div>

    </div>
    </form>

</div>
<!--CONTENT END-->
@include('alert-message')
<script>
    // show password
    $('.form-input-eye-ico').on('click', function () {
        var type = $(this).prev('input').attr('type')
        if (type === 'text') {
            $(this).prev('input').attr('type', 'password')
            $(this).attr('src', '{{asset('public')}}/static/images/icon/eye-line.png')
        } else {
            $(this).prev('input').attr('type', 'text')
            $(this).attr('src', '{{asset('public')}}/static/images/icon/eye-off-line.png')
        }
    });

    function do_login_password() {
        var old_password = $("input[name='old_password']").val();
        var new_password = $("input[name='new_password']").val();
        var confirm_password = $("input[name='confirm_password']").val();

        if (!old_password)
            return message("Please enter old login password");

        if (!new_password)
            return message("Please enter new login password");

        if (!confirm_password)
            return message("Please confirm new login password");

        if (confirm_password != new_password)
            return message("The new login password entered twice is inconsistent");

        layer.load(2);

        document.querySelector('form').submit();
    }
</script>

<!-- Bottom tabBar -->
@include('app.layout.manu')
<!-- Bottom tabBar End -->

</body>
</html>
