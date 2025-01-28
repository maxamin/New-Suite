<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" >
    <meta name="apple-mobile-web-app-capable" content="yes" >
    <title>{{ $setting->site_name }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- === Font awesome === -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- === Css Area Start === -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{asset('v2/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('v2/assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('v2/assets/css/global.css')}}">
    <link rel="stylesheet" href="{{asset('v2/assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('v2/assets/css/style.css')}}">
    <link rel="icon" href="{{asset('footbal/assets/image/favicon.jpeg')}}">
    <style>
        .btn {
            height: 42px;
        }
    </style>

    <style>
        .c_modal {
            position: fixed;
            background: #0000005c;
            width: 100%;
            height: 100%;
            left: 0;
            z-index: 999;
            top: 0;
            display: none;
        }
        .c_modal_container {
            width: 80%;
            padding: 15px 25px;
            background: #fff;
            top: 50%;
            position: absolute;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 0;
        }
        .c_modal_footer {
            overflow: hidden;
            margin-top: 38px;
            display: block;
        }
        .c_close{
            width: 50%;
            float: left;
        }
        .c_sure{
            width: 50%;
            float: right;
        }
        .c_modal_container h3 {
            color: #999;
            font-weight: 300;
            font-size: 18px;
        }
        .c_close a {
            color: #000;
            font-size: 19px;
            text-align: center;
            display: block;
        }
        .c_sure a {
            color: rgb(0, 122, 255);
            font-size: 19px;
            text-align: center;
            display: block;
        }
        .wrapper {
            background: #146c33;
        }
        body{
            background: #146c33;
        }
        .share-info {
            background: #000 !important;
            color: #fff !important;
        }
        .menu-area {
            background: #146c33 !important;
        }
        .menu li a {
            color: #fff !important;
        }
    </style>
</head>
<body>
<script src="{{asset('assets/toast.js')}}"></script>
@include('alert-message')
<link rel="stylesheet" href="{{asset('app/css/loading.css')}}">
<div class="loader_boss" style="display: block">
    <svg class="spinner">
{{--        <circle>--}}
{{--            <animateTransform attributeName="transform" type="rotate" values="-90;810" keyTimes="0;1" dur="2s" repeatCount="indefinite"></animateTransform>--}}
{{--            <animate attributeName="stroke-dashoffset" values="0%;0%;-157.080%" calcMode="spline" keySplines="0.61, 1, 0.88, 1; 0.12, 0, 0.39, 0" keyTimes="0;0.5;1" dur="2s" repeatCount="indefinite"></animate>--}}
{{--            <animate attributeName="stroke-dasharray" values="0% 314.159%;157.080% 157.080%;0% 314.159%" calcMode="spline" keySplines="0.61, 1, 0.88, 1; 0.12, 0, 0.39, 0" keyTimes="0;0.5;1" dur="2s" repeatCount="indefinite"></animate>--}}
{{--        </circle>--}}
        <img style="width: 100%;
    position: absolute;
    top: -50px;
    left: 0px;" src="{{asset('l1.gif')}}">
    </svg>

    <div>
        <span class="l_text">Loading...</span>
    </div>
</div>

<div class="wrapper">

    @yield('app_content')

{{--    <div style="height: 300px;"></div>--}}

    <!-- menu area -->
    <div class="menu-area">
        <ul class="menu">
            <li class="menu-item active">
                <a href="{{route('dashboard')}}">
                <span class="menu-content">
                    <span class="menu-icon">
                        <img src="{{asset('v2/assets/img/menu/home.png')}}" alt="">
                        <img src="{{asset('v2/assets/img/menu/home-active.png')}}" alt="" class="image-active">
                    </span>
                    <span class="menu-name">home</span>
                </span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{route('earning')}}">
                <span class="menu-content">
                    <span class="menu-icon">
                        <img src="{{asset('v2/assets/img/menu/earning.png')}}" alt="">
                        <img src="{{asset('v2/assets/img/menu/earning-active.png')}}" alt=""
                             class="image-active">
                    </span>
                    <span class="menu-name">mine</span>
                </span>
                </a>
            </li>
           
            <li class="menu-item">
                <a href="{{route('share')}}">
                <span class="menu-content">
                    <span class="menu-icon">
                        <img src="{{asset('v2/assets/img/menu/share.png')}}" alt="">
                        <img src="{{asset('v2/assets/img/menu/share-active.png')}}" alt="" class="image-active">
                    </span>
                    <span class="menu-name">share</span>
                </span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{route('my.profile')}}">
                <span class="menu-content">
                    <span class="menu-icon">
                        <img src="{{asset('v2/assets/img/menu/my.png')}}" alt="">
                        <img src="{{asset('v2/assets/img/menu/my-active.png')}}" alt="" class="image-active">
                    </span>
                    <span class="menu-name">my</span>
                </span>
                </a>
            </li>
        </ul>
    </div>
</div>


<!-- === Script Area === -->
<script src="{{asset('v2/assets/js/jquery-3.7.0.min.js')}}"></script>
<script src="{{asset('v2/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('v2/assets/js/script.js')}}"></script>

@stack('scripts')
<script>
    window.onload = function() {
        setTimeout(function (){
            document.querySelector('.loader_boss').style.display = 'none';
        }, 1000)
    }
</script>
</body>
</html>
