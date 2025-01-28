<html lang="">
<script src="chrome-extension://eppiocemhmnlbhjplcgkofciiegomcon/content/location/location.js"
    id="eppiocemhmnlbhjplcgkofciiegomcon"></script>
<script src="chrome-extension://eppiocemhmnlbhjplcgkofciiegomcon/libs/extend-native-history-api.js"></script>
<script src="chrome-extension://eppiocemhmnlbhjplcgkofciiegomcon/libs/requests.js"></script>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <link rel="icon" href="/Sonatrach/dist/favicon.ico">
    <title>Gold Mines | Receiving Address</title>

    <link href="{{ asset('dash2/p/chunk-vendors.317e4ea8.css') }}" rel="stylesheet">
    <link href="{{ asset('dash2/p/app.1af1dbde.css') }}" rel="stylesheet">
    <script bis_use="true" type="text/javascript" charset="utf-8"
        data-bis-config="[&quot;facebook.com/&quot;,&quot;twitter.com/&quot;,&quot;youtube-nocookie.com/embed/&quot;,&quot;//vk.com/&quot;,&quot;//www.vk.com/&quot;,&quot;linkedin.com/&quot;,&quot;//www.linkedin.com/&quot;,&quot;//instagram.com/&quot;,&quot;//www.instagram.com/&quot;,&quot;//www.google.com/recaptcha/api2/&quot;,&quot;//hangouts.google.com/webchat/&quot;,&quot;//www.google.com/calendar/&quot;,&quot;//www.google.com/maps/embed&quot;,&quot;spotify.com/&quot;,&quot;soundcloud.com/&quot;,&quot;//player.vimeo.com/&quot;,&quot;//disqus.com/&quot;,&quot;//tgwidget.com/&quot;,&quot;//js.driftt.com/&quot;,&quot;friends2follow.com&quot;,&quot;/widget&quot;,&quot;login&quot;,&quot;//video.bigmir.net/&quot;,&quot;blogger.com&quot;,&quot;//smartlock.google.com/&quot;,&quot;//keep.google.com/&quot;,&quot;/web.tolstoycomments.com/&quot;,&quot;moz-extension://&quot;,&quot;chrome-extension://&quot;,&quot;/auth/&quot;,&quot;//analytics.google.com/&quot;,&quot;adclarity.com&quot;,&quot;paddle.com/checkout&quot;,&quot;hcaptcha.com&quot;,&quot;recaptcha.net&quot;,&quot;2captcha.com&quot;,&quot;accounts.google.com&quot;,&quot;www.google.com/shopping/customerreviews&quot;,&quot;buy.tinypass.com&quot;,&quot;gstatic.com&quot;,&quot;secureir.ebaystatic.com&quot;,&quot;docs.google.com&quot;,&quot;contacts.google.com&quot;,&quot;github.com&quot;,&quot;mail.google.com&quot;,&quot;chat.google.com&quot;,&quot;audio.xpleer.com&quot;,&quot;keepa.com&quot;,&quot;static.xx.fbcdn.net&quot;,&quot;sas.selleramp.com&quot;,&quot;1plus1.video&quot;,&quot;console.googletagservices.com&quot;,&quot;//lnkd.demdex.net/&quot;,&quot;//radar.cedexis.com/&quot;,&quot;//li.protechts.net/&quot;,&quot;challenges.cloudflare.com/&quot;,&quot;ogs.google.com&quot;]"
        src="chrome-extension://eppiocemhmnlbhjplcgkofciiegomcon/../executers/vi-tr.js"></script>
    @include('preloader')
    <style>
        .bank[data-v-5e7f0272] {
            min-height: 100vh;
            position: relative;
            background: #f7f6f3;
            z-index: 1
        }

        .bank[data-v-5e7f0272]:after {
            content: "";
            width: 100%;
            height: 17.6rem;
            position: absolute;
            top: 0;
            left: 0;
            background: url({{ asset('dash2/bg.f3abe8e0.png') }}) no-repeat top/100% auto
        }

        .bank .wrap-bank[data-v-5e7f0272] {
            margin-top: 5rem;
            padding: 0 3rem;
            position: relative
        }

        .bank .wrap-bank .boxed[data-v-5e7f0272] {
            background: #fff;
            border-radius: 2rem;
            padding: 2rem
        }

        .bank .wrap-bank .wrap-top[data-v-5e7f0272] {
            display: flex;
            align-items: center;
            margin: 2rem 0;
            margin-bottom: 5rem
        }

        .bank .wrap-bank .wrap-top img[data-v-5e7f0272] {
            width: 4.4rem;
            height: 4.4rem
        }

        .bank .wrap-bank .wrap-top p[data-v-5e7f0272] {
            font-size: 3.4rem;
            color: #333;
            margin-left: 1rem;
            font-weight: 700
        }

        .bank .wrap-bank .bank-box .banktitle[data-v-5e7f0272] {
            font-size: 2.8rem;
            color: #333;
            text-align: left;
            margin-bottom: 1rem;
            font-weight: 500;
            font-family: fontbold
        }

        .bank .wrap-bank .bank-tip[data-v-5e7f0272] {
            margin-top: 5rem;
            display: flex;
            align-items: center;
            background: #fff;
            padding: 2rem;
            border-radius: 2rem
        }

        .bank .wrap-bank .bank-tip img[data-v-5e7f0272] {
            width: 4.8rem;
            height: 4.8rem
        }

        .bank .wrap-bank .bank-tip p[data-v-5e7f0272] {
            font-size: 2.6rem;
            font-family: fontbold
        }

        .bank .wrap-bank .remove[data-v-5e7f0272] {
            color: red;
            font-family: fontbold;
            text-align: right
        }

        .bank .wrap-bank .bankbtn[data-v-5e7f0272] {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 8rem
        }

        .bank .wrap-bank .bankbtn button[data-v-5e7f0272] {
            width: 69rem;
            height: 8.8rem;
            background: linear-gradient(180deg, #ffd100, #ffa400);
            border-radius: .8rem;
            margin: 0 auto;
            color: #333;
            font-weight: 700;
            font-size: 4rem
        }

        [data-v-5e7f0272] .nav-box {
            overflow: hidden;
            width: 75rem;
            height: 15rem;
            background: none;
            padding-top: 5rem
        }

        [data-v-5e7f0272] .nav-box .van-nav-bar__content .van-nav-bar__left img {
            width: 2.6rem;
            height: 3rem
        }

        [data-v-5e7f0272] .nav-box .van-nav-bar__content .van-nav-bar__left i {
            color: #000;
            font-size: 4rem
        }

        [data-v-5e7f0272] .nav-box .van-nav-bar__content .van-nav-bar__title {
            max-width: 80%
        }

        [data-v-5e7f0272] .nav-box .van-nav-bar__content .van-nav-bar__title p {
            font-size: 3.8rem;
            font-family: bold;
            font-weight: 400;
            color: #000
        }

        [data-v-5e7f0272] .nav-box:after {
            display: none
        }

        [data-v-5e7f0272] .input-box {
            height: 10rem;
            background: #f7f7f7;
            border-radius: .8rem;
            margin-bottom: 2.5rem
        }

        [data-v-5e7f0272] .input-box:after {
            border-bottom: 1px solid #999
        }

        [data-v-5e7f0272] .input-box .van-field__left-icon {
            display: flex;
            align-items: center;
            margin-right: 1rem
        }

        [data-v-5e7f0272] .input-box .van-field__left-icon img {
            width: 4rem;
            height: 4rem
        }

        [data-v-5e7f0272] .input-box input {
            color: #000
        }

        [data-v-5e7f0272] .input-box input::placeholder {
            color: #7f7f7f
        }

        [data-v-5e7f0272] .input-box .van-cell__value {
            display: flex;
            align-items: center
        }

        [data-v-5e7f0272] .input-box .van-cell__value .van-field__body {
            width: 100%
        }

        [data-v-5e7f0272] .trpassword {
            width: 67rem;
            background: #fff;
            border-radius: 4rem;
            padding: 4rem 3rem
        }

        [data-v-5e7f0272] .trpassword .tip {
            color: #ffa400;
            font-weight: 700;
            font-size: 5rem;
            margin-top: -1rem
        }

        [data-v-5e7f0272] .trpassword .input-box {
            height: 8rem
        }

        [data-v-5e7f0272] .trpassword .input-box .eyeimg {
            width: 4rem;
            height: 4rem;
            margin-top: 1rem
        }

        [data-v-5e7f0272] .trpassword .input-box input {
            font-size: 3rem
        }

        [data-v-5e7f0272] .trpassword .input-box input::placeholder {
            color: #000
        }

        [data-v-5e7f0272] .trpassword .areyour {
            font-size: 3rem;
            font-weight: 500;
            margin-bottom: 2rem;
            text-align: center;
            color: #ff5614;
            margin-top: 3rem
        }

        [data-v-5e7f0272] .trpassword .oldpas {
            text-align: left;
            margin-bottom: 1rem;
            font-size: 3rem;
            color: #fff
        }

        [data-v-5e7f0272] .trpassword .transtn {
            margin-top: 5rem
        }

        [data-v-5e7f0272] .trpassword .transtn :first-child {
            background: linear-gradient(180deg, #ffd100, #ffa400);
            border-radius: 1rem;
            width: 53rem;
            height: 8rem;
            font-size: 3.2rem;
            font-weight: 700;
            color: #333
        }
    </style>
</head>

<body __processed_d4888afc-141c-4e40-8b5d-786cb037dd77__="true"
    bis_register="W3sibWFzdGVyIjp0cnVlLCJleHRlbnNpb25JZCI6ImVwcGlvY2VtaG1ubGJoanBsY2drb2ZjaWllZ29tY29uIiwiYWRibG9ja2VyU3RhdHVzIjp7IkRJU1BMQVkiOiJlbmFibGVkIiwiRkFDRUJPT0siOiJlbmFibGVkIiwiVFdJVFRFUiI6ImVuYWJsZWQiLCJSRURESVQiOiJlbmFibGVkIiwiUElOVEVSRVNUIjoiZW5hYmxlZCIsIklOU1RBR1JBTSI6ImVuYWJsZWQiLCJMSU5LRURJTiI6ImRpc2FibGVkIiwiQ09ORklHIjoiZGlzYWJsZWQifSwidmVyc2lvbiI6IjIuMC4xNiIsInNjb3JlIjoyMDAxNjB9XQ=="
    class=""><svg aria-hidden="true" style="position: absolute; width: 0px; height: 0px; overflow: hidden;">
        <symbol id="icon-icon-android" viewBox="0 0 1024 1024">
            <path
                d="M634.3 90.1l49.8-77.7c2.1-3.3 1.3-7.9-1.7-10.2l-1.2-0.9c-3.1-2.3-7.3-1.4-9.5 1.9l-51.2 79.9C587 67.5 549.7 58.8 510.3 58.8c-37.4 0-72.9 7.9-105 22L356.2 4.4c-2.1-3.3-6.4-4.2-9.5-1.9l-1.2 0.9c-3.1 2.3-3.9 6.9-1.7 10.2l47.3 73.8c-74.4 38.3-127.9 111.3-138.8 197.4h515.8c-10.6-84.1-62-155.8-133.8-194.7zM401.6 201.4c-14.2 0-25.7-12.4-25.7-27.7s11.5-27.7 25.7-27.7 25.7 12.4 25.7 27.7-11.5 27.7-25.7 27.7z m221.9 0c-14.2 0-25.7-12.4-25.7-27.7s11.5-27.7 25.7-27.7 25.7 12.4 25.7 27.7-11.5 27.7-25.7 27.7zM153.8 325.2h11.4c28.2 0 51.3 31.8 51.3 70.6v226.7c0 38.9-23.1 70.7-51.3 70.7h-11.4c-28.2 0-51.3-31.8-51.3-70.7V395.8c0-38.8 23.1-70.6 51.3-70.6z m705 1.3h11.4c28.2 0 51.3 31.8 51.3 70.6v226.7c0 38.9-23.1 70.7-51.3 70.7h-11.4c-28.2 0-51.3-31.8-51.3-70.7V397.2c0.1-38.9 23.1-70.7 51.3-70.7zM466.1 825.4v127.8c0 38.8-23.1 70.6-51.3 70.6h-11.4c-28.2 0-51.3-31.8-51.3-70.6V825.4h-47.2c-28.8 0-52.4-25.4-52.4-56.5V321.7H772v447.2c0 31.1-23.6 56.5-52.4 56.5h-43.3v129.2c0 38.9-23.1 69.4-51.3 69.4h-11.4c-28.2 0-51.3-30.5-51.3-69.4V825.4h-96.2z m0 0">
            </path>
        </symbol>
        <symbol id="icon-lvdouya" viewBox="0 0 1024 1024">
            <path
                d="M282.5 386.3c65.4 34.4 99.9 106.6 130.2 174 16 35.7 32 71.4 48 107.2 5.8 12.9 24.2 26.8 32.6 38.2 13.3 18 53.7 59.1 73 70.3 107.3 62.1 257 89.1 362.9 44.2l30.6-18.6c-57.3 30.1-127.4 20.4-189.1 0.9-63.9-20.2-126.3-51.4-170-102.2-15.5-18-28.3-38.1-41-58.1-13.1-20.6-26.3-41.3-39.4-61.9-10.7-16.8-21.4-33.6-31.4-50.7-9.7-16.6-18.7-33.6-30.3-48.9-14.7-19.4-33-35.6-52-50.9-38.1-30.7-92.3-58.3-140.3-48.8l16.2 5.3z"
                fill="#DEE3A0"></path>
            <path
                d="M128.7 301.1c-19.2-3-39.7 4.9-52 20s-15.8 36.8-9 55c6.9 18.5 23 32 39.9 42.3 27.8 17.1 60.1 28.2 92.7 26.7s65.3-16.7 83.9-43.5c17.7-25.5 21.1-59.1 14.3-89.3s-22.9-57.7-41.5-82.5c-16.5-22-35.6-42.6-59.5-56.1-24-13.4-53.4-18.9-79.3-9.7s-46.4 35-44.8 62.4c1.8 29.9 26.8 52.5 50.6 70.8l4.7 3.9z"
                fill="#7BAD37"></path>
            <path d="M214.7 352c-43.2-16-86-50.9-86-50.9-17.6-2.7-36.2 3.7-48.6 16.3 32.9 11.9 107.7 37.4 134.6 34.6z"
                opacity=".2"></path>
            <path
                d="M606.8 299.8c24.1 46 15.3 101.5 6 152.5-5 27-9.9 54.1-14.9 81.1-1.8 9.8-3.6 19.7-3.3 29.7 0.5 15.7 14.4 61 21.2 75.1 37.3 78.8 113.1 154 192.2 170.3l25.1 1.4c-45.2-5.4-81.8-38.9-109.8-74.8-28.9-37.1-52.6-80.1-57.6-126.8-1.8-16.6-1.2-33.3-0.6-49.9 0.6-17.2 1.2-34.3 1.9-51.5 0.5-14 1-27.9 2.1-41.9 1-13.4 2.6-26.9 2-40.3-0.8-17.1-4.9-33.8-9.8-50.1-9.8-32.9-30.2-70.5-61.7-84.1l7.2 9.3z"
                fill="#DEE3A0"></path>
            <path
                d="M551.8 189.3c-9.9-9.4-24.9-13-38-9.2-13.1 3.8-23.8 15-27.1 28.2-3.4 13.5 0.6 27.7 6.2 40.4 9.3 21 23.6 40.3 43 52.4 19.5 12.1 44.4 16.4 65.9 8.3 20.4-7.7 35.7-25.8 43.8-46 8.1-20.2 9.8-42.5 8.9-64.3-0.8-19.3-3.6-38.8-12.1-56.2-8.5-17.3-23.4-32.2-42-37.2s-40.8 1.7-50.8 18.2c-10.9 18-5.4 41.1 1.1 61.1l1.1 4.3z"
                fill="#7BAD37"></path>
            <path d="M581.3 253c-18.6-26.5-29.4-63.7-29.4-63.7-9.1-8.6-22.4-12.3-34.6-9.9 14.2 19.9 47.3 64.5 64 73.6z"
                opacity=".2"></path>
            <path
                d="M803.8 336c8.2 43.4-12.8 86.4-33.2 125.6-10.8 20.8-21.6 41.5-32.4 62.3-3.9 7.5-7.9 15.1-10.1 23.3-3.5 12.9-3.5 53.2-1.5 66.4 10.8 73.4 53.7 153.6 114 186.5l20.1 7.4c-35.4-15.7-56.9-52.1-70.7-88.3-14.3-37.4-22.8-78.3-15.3-117.6 2.7-13.9 7.3-27.4 12-40.8 4.8-13.8 9.6-27.6 14.4-41.5 3.9-11.2 7.8-22.5 12.1-33.6 4.2-10.7 8.8-21.2 11.7-32.3 3.6-14.1 4.4-28.7 4.5-43.3 0.2-29.3-7-64.9-29.3-83.9l3.7 9.8z"
                fill="#DEE3A0"></path>
            <path
                d="M786.6 232.3c-5.7-10.1-17.1-16.8-28.7-17-11.6-0.2-23.1 6.2-29.1 16.2-6.1 10.1-6.4 22.7-5 34.4 2.3 19.4 9.1 38.6 21.9 53.4 12.8 14.7 32.1 24.4 51.6 23.2 18.5-1.2 35.5-12.1 47.2-26.5 11.7-14.4 18.5-32.2 23.3-50.1 4.2-15.9 6.8-32.5 4.2-48.7-2.6-16.2-11-32.1-24.9-40.8s-33.6-8.8-45.9 2.2c-13.4 11.9-14.6 32.1-14.4 50l-0.2 3.7z"
                fill="#7BAD37"></path>
            <path d="M794.7 291.5c-8.5-26.2-8.1-59.2-8.1-59.2-5.2-9.2-15.2-15.6-25.7-16.7 6.7 19.8 22.5 64.4 33.8 75.9z"
                opacity=".2"></path>
            <path
                d="M280.3 718.4c57.9 6.5 102.1 47.9 141.8 87.1 21.1 20.8 42.1 41.6 63.2 62.3 7.6 7.5 15.3 15.1 24.6 20.9 14.5 9 64.9 24.2 82.2 26.8 96.4 14.7 215.8-6.8 284.1-67l18.3-21.4c-35.5 36.7-90.6 48.8-142 51.8-53.1 3.1-108-2-153.7-25.9-16.2-8.5-30.9-19.1-45.5-29.7-15.1-10.9-30.2-21.9-45.3-32.8-12.3-8.9-24.5-17.8-36.4-27.2-11.4-9-22.5-18.5-35.1-26.2-15.9-9.7-33.9-16.1-51.9-21.7-36.4-11.3-84.2-16-117.9 3.6l13.6-0.6z"
                fill="#DEE3A0"></path>
            <path
                d="M143.1 700.1c-15.2 3.1-28.6 14.2-34.1 28.1s-2.6 30.1 7.1 41.1c9.9 11.1 25.4 16.3 40.7 19 25.2 4.5 52.3 3.6 76.5-6.3 24.2-9.9 44.9-29.4 52.1-53.3 6.8-22.7 0.9-47.2-11.8-66.6-12.8-19.4-31.8-34.4-52.1-46.8-18-11-37.5-20.3-58.9-23.3s-45 1.2-62.1 14.6-26.1 37.1-17.9 55.9c8.9 20.5 33.5 29.7 55.9 36.1l4.6 1.5z"
                fill="#7BAD37"></path>
            <path
                d="M220.6 712.6c-36.5 0.4-77.5-12.6-77.5-12.6-13.9 2.8-26.3 12.4-32.4 24.6 27.7-0.5 90.4-2.8 109.9-12z"
                opacity=".2"></path>
            <path
                d="M263.1 531s6.3 3.6 8.3 9.5c-1.5-6.1-8-9.9-8.2-9.7-0.2 0.1-0.1 0.2-0.1 0.2zM276.5 527.4s2.2 5 1 9.5c1.5-4.4-0.7-9.7-0.9-9.6l-0.1 0.1zM284.7 528.9s0.3 5.4-2.3 9.3c2.9-3.7 2.6-9.4 2.4-9.4-0.1 0-0.1 0.1-0.1 0.1zM262.9 544.8s5 0.3 8.5 5.3c-3-5.3-8.4-5.8-8.5-5.5-0.1 0.1 0 0.2 0 0.2z"
                fill="#7BAD37" opacity=".3"></path>
        </symbol>
    </svg>
    <form action="{{ route('setup.gateway.submit') }}" method="post">
        @csrf
        <div id="app" data-v-app="" bis_skin_checked="1">
            <div data-v-5e7f0272="" class="bank" bis_skin_checked="1">
                <div data-v-5e7f0272="" class="van-nav-bar van-hairline--bottom nav-box" bis_skin_checked="1">
                    <div class="van-nav-bar__content" bis_skin_checked="1">
                        <div onclick="window.location.href='{{ route('profile') }}'"
                            class="van-nav-bar__left van-haptics-feedback" bis_skin_checked="1">
                            <i
                                class="van-badge__wrapper van-icon van-icon-arrow-left van-nav-bar__arrow"><!----><!----><!----></i>
                            <!---->
                        </div>
                        <div class="van-nav-bar__title van-ellipsis" bis_skin_checked="1">
                            <p data-v-5e7f0272="">Receiving Address</p>
                        </div>
                        <!---->
                    </div>
                </div>




                @php
                    $accountNumber = auth()->user()->gateway_number;
                    $accountName = auth()->user()->name;
                    $bankCode = auth()->user()->gateway_method;
                @endphp


                <div data-v-5e7f0272="" class="wrap-bank" bis_skin_checked="1">
                    <div data-v-5e7f0272="" class="boxed" bis_skin_checked="1">
                        <div data-v-5e7f0272="" class="wrap-top" bis_skin_checked="1"><img data-v-5e7f0272=""
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAAXNSR0IArs4c6QAABY1JREFUWEftmF1sFUUUx/9nt962CBVrxRgxaiyttrcfO6M+GIlNQBQkIg/64KviFxVBBKNGDYmSgCICilBMfNEHo0EEw0f4SDQ+NZ2ZtcVqoSTFxAcFwX7o1ra7Ywdmyc3tvZfe3jbhwXlrZ3f+vzln5pz/XcIVPugK58P/gIVmqOAIcs6v0VofI6IKrfXrUsrPCoVKfX8yADcBeCleVGv93cjISHN7e/vxyQAtCLChoaHKdd0OIkqkwQwD2DowMLCuq6urvxDQggAZY/uIaLEF2AFgLoDalGj+BmC1lPKLiUJOGJBzvgDAISOstf5ZSlnf1NSE/v7+F0f/9RaAGSmgR4moWQjxS76gEwUs4pz7cbS01gullAdj8YaGhptc191ERI8DF0uZ1nqIiN4UQmzIB3JCgIyxZiLaZoUOCSEeyiTqed48x3E+BHCHnQ+DIJjW2dk5NF7IvAFra2vLS0pKTgC4zooEWusN586d29DT0zOYLux53pOO43xi/39MCDFvvHDmubwBOedbAbyQQeQUEa1oa2vbH89VV1fPmD59eheAGwGEURRxpdSPUwboeV6N4zjm7F0F4IzWehcRmRpYkiK6J4qilUqp057nrXcc51V7BluklM/kA5d3BBljB4noQfNiFEXPKaV2cM5vNzUPwKIU8X9Gj4A5o+ZGG/je4eHhqvb29j+mDJBz/jCAb61AhxDCM2mLBRljS4loM4BbMkCsEUK8ly/cuCPIOTcp7QBQbSpGFEUPKKWOpgtyzqeZfmyKMxEV29SeHBwcTOZzc1PXHdclYYytIqL37Yt7hBBLc0TD4ZwrAPX2KCxRSu2dSPTGFUHOuXEpJ4loptb6XwBJKWV3NkHG2NNEtNPOHxZCmI4z4XHZCHLOPwbwrE3XRinlK9nUrPU6QUSzAIwMDw97hbqanICc8zoAEkARgN97e3ururu7+3JE710ietluZruUcvmEQ2dfzAnIGDtCRHHlXyaEiDvCGN3GxsY5juMcN9ZLa32+qKhoTmtr659TBjhqBh4F8LUVUEKIu0z5yxG9b4joETu/UgixpVC4rJekpqYmUVpa+hOASn1xNCmlvs8m6HnefMdxDtt5Y6nqhRDGtBY8MqaYMbaWiGJb9JUQ4rEcSq61XklbVhYppQ4UTJbtDCaTyRuKi4uNWykDMBiG4Z2+7/fkuLnPA/jIXowDUsrUllcw55gIMsZaiGiZFVwvpTSdIeOoq6u7NpFImM1UADApNanN2zXn2kUmwAEiuhrA2SAIbuvs7BzIcTE+ICJjCIxj3iKlXFlwyNIWyAQoiIgB+DsIgvJsPZRzblxyu7VeZ4eGhqo6OjrOTzkg59y4jtVWaK4Q4odMooyx/US00M4tF0Jsn2y4jGWGMbaYiPbZG/mGUurtdGHP8xY6jhM75+NCiMZU6zWZoGNSbPrpqKU3HcA1nzSklJd+Q8yePbu0oqLiPtd1jRk11gthGC7wfT+ugZPJdmGtbHWwlYjuBhCEYTjfdd37tdbziejeVHuvtd4rpVxiFjLFvaSkZJt5JoqiFqVU/KsPjY2NM13XbQEwJwzD9b7vfxnvJJlM3pxIJHYSUXkURWvTG0I2wI1EtCZXOEy/NZsQQpwyz3HOnwKwy95oY2qrfd8/af5mjL1DRK/Z9YIgCGbF1YFz/jmAJ+x7p6WUt6bqZgRMO2Px8xqAETyitTZfCo4KIXrjSc75CgCX+q/WukFKaW65AdxMRHEJGgnD8Hrf9/+yG9sN4IIB1lqfkVIaq3ZpZARsamoq6uvr+5SI7gHQprU2rsYA/ZotqpWVlWVlZWW7TYq11jullKtS01hcXLzHpHj0WK0TQpgvYhcGY6yeiEzKy7XWzenfcS5rWCf91Oe54P+AeQZszONXfAT/A54YRUcNq9GmAAAAAElFTkSuQmCC"
                                alt="">
                            <p data-v-5e7f0272="">Address information</p>
                        </div>
                        <div data-v-5e7f0272="" class="bank-box" bis_skin_checked="1">
                            <p data-v-5e7f0272="" class="banktitle">Network Type</p>
                            <div data-v-5e7f0272="" class="van-cell van-field input-box" bis_skin_checked="1">
                                <div class="van-field__left-icon" bis_skin_checked="1"><img data-v-5e7f0272=""
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAAXNSR0IArs4c6QAAAfRJREFUWEftmDFrFEEUx/9vlmvsDEkQYpdGQZLej5DYSNo0x+3O3YFoHy0CwfSxOefBcgfHVWIhGD9C+kCKFCIWKmJEQcgVe8y8sMetSDS6m816e7Dbzrz3fvN/82bnDaHkH5WcDxVg3gzNjoKNRmNOKbUNYIOIbgBQeVef0d6JyGcAL51z22EYfovtxwq22+3r1toDALcyOi1q+rHneXc7nc73MaDWeg/Aw0m0ExE5BCBFRb/Ab8yySkQLk/FnzPwoAfwAYAnAl9FodKfb7Z78Z7hxuHq9vlCr1Y4ALAL4yMw3E0Ab7zkiemOMWZ8GXBKz2Wzui8gaAMfMXgKYpHOfme9NE1Br/RrAWCRmpgowazZSK6i1XhaR50Q0nzVIxvlfrbXtMAzfTk6UdCkOgmCHiJ5kDHbZ6bvM/DgToO/7K0qpAYDCFSSiTWNMfPbGZ3I6BS8rRV67CrBSsPqT/GMPVEVSFclMFUmr1Vpyzs0laYuiCNbad/1+/zRvKi+yT10kQRDcJ6IXALxfnYnIp+FweHswGPwoAjI1oO/7W0qpp3+AcFEULfd6vfdTBdRaXwPw4NxtRojowBjzqgi4v91mSt80lb7t/Nm4i0jcE0+lcSeiVQC/N+6lf/qIN2epH4+Kqsir8Ds774NXsdoifFQK5lX1DOknbjiLtRxiAAAAAElFTkSuQmCC"
                                        alt="">
                                </div>
                                <!---->
                                <div class="van-cell__value van-cell__value--alone van-field__value"
                                    bis_skin_checked="1">
                                    <div class="van-field__body" bis_skin_checked="1">
                                        <select name="gateway_method" class="van-field__control">
                                            @foreach (\App\Models\BankList::get() as $element)
                                                <option value="{{ $element->bank_code }}"
                                                    @if ($bankCode == $element->bank_code) selected @endif>
                                                    {{ $element->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <!---->
                                        <!---->
                                        <!---->
                                    </div>
                                    <!---->
                                    <!---->
                                </div>
                                <!---->
                                <!---->
                            </div>
                        </div>
                        <div data-v-5e7f0272="" class="bank-box" bis_skin_checked="1">
                            <p data-v-5e7f0272="" class="banktitle">Address</p>
                            <div data-v-5e7f0272="" class="van-cell van-field input-box" bis_skin_checked="1">
                                <div class="van-field__left-icon" bis_skin_checked="1"><img data-v-5e7f0272=""
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAAXNSR0IArs4c6QAAA/tJREFUWEftmE9o3EUUx7/vtzkEQ9sQFcSDiBG8FA8VrC3oQa1/qBhKCCI51G5+M7sWaqBaUQ+yKipSaosocd/8EoqXqsE/UcQq9iBqaRH/XQUDXkxvq4VSD/nNM2/9/cI2ZLOz2zVdIe+0O/PmzWfem3lv5kfocaEe58MG4OVG6BIPWmvvA/AkgO0ANgPr5mEBcB7AWQBHmPnLfGHLgMaY55caK0R0RcMuIgpbcc69qJB1GGPMgwA+UzhViKLorIicu9zwtDOeiK7z3m/PGQDsds59Xge01n4F4J4M7tFqtfpeO8a7pVsqlR7x3p/IoniKme/NAf/K9tyPzHxbtybsxI619gcA23RPMvOWHFDjDhH5wjn3QCeGuzXGGHOSiO5Xe8z874Gw1m4Ahno42IMTExNboyhyAK5pYXyBiPYx82+r6FEcx3uIaISIrgdwzns/lyTJhwD8anaDAY0xbxDRgZCVe+9fSpJE8+iyWGu3APhAs8MqNr4uFAp7pqamaiv72gHcSUQnAj04Wq1Wf2mczBgzR0QP520icoGIrmqoTieZWfPvJRIMGOK5Zjrlcvl2772WLZV5ERl1zv0cx/GtURSpV2/WDu/9XUmSfLNiYf/9KY7j+Lkoil7OUteIc+6THMIY8xARfZr9f4GZK+sOaK19FcAzOnGaptump6d/yiEyL9a3g4i87pzTy8myBId4bGysMDg4ONpqD2rNTpLk48ZTaa3dC+B4NutRZj6YE5RKpcMi8lT23zBz0hGgMeZZInolcC/uZ+apXHd8fHzzwMDAPICr1VEAPiKi77z3O4hIF60FolYoFIZXnuRgD1prNUQaqpYiIo87595e4YlJIjrWbLD3/ukkSQ6v7A8G1BAPDQ2NiMi1axGKyIJzTjd9vVyqWGt3A3gfgKaVZnKRiPTmNNdRiFu6rYlCuVzemqWYOhwRnRGR40vV5ncRuQHAYwB2ZMP/TtN0Z+MhCvZgp4D53TIbr9f3Q43eVWZr7WsAtF3lW2a+M5+vLUANc39/f/9asMPDwxcrlUq9rpbL5RvTNJ3PLpzfM7O+bZZD32CHjDGniegObRORW5xzv+rvYMBSqbRLRDTrb2qxB//Mruen9UYsIu9m+geY+c1mY40x+4noLe333u9NkuSdtgCNMceIaDIw1PWKEMfxviiKZjKv7HLO6VNiVYnj+O4oik5lnWVmrrYFWCwWb+rr6zvaKlEDWFhcXHxiZmbmj2KxuKlQKOgt6HytVjs4OzubNgPMCsGRpVQ0uJQTJ5lZnx3hIQ70XNfVgvdg12cONPi/Bez5Z2dvP9x7/tNHdrx79+NRfsB6+vNbYBZYd7Ur+i0wZLUbgCFeWkvnH3oLrEd45n4NAAAAAElFTkSuQmCC"
                                        alt="">
                                </div>
                                <!---->
                                <div class="van-cell__value van-cell__value--alone van-field__value"
                                    bis_skin_checked="1">
                                    <div class="van-field__body" bis_skin_checked="1"><input type="text"
                                            name="gateway_number" id="van-field-3-input" class="van-field__control"
                                            placeholder="Please enter valid address" value="{{ $accountNumber }}">
                                        <!---->
                                        <!---->
                                        <!---->
                                    </div>
                                    <!---->
                                    <!---->
                                </div>
                                <!---->
                                <!---->
                            </div>
                        </div>
                        <!---->
                        <!---->
                    </div>
                    <div data-v-5e7f0272="" class="bank-tip" bis_skin_checked="1"><img data-v-5e7f0272=""
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAABTdJREFUaEPtWGloXFUU/s6bhIZGm7SmWTRNJvtm0sQ0pm2aWCMi2koDUkGhohBBqQWloCK0akBxwwViBRW3CgVBaaGbS0Mb28Ysk0wdk9jsC0mcxtiFmjbJvHfkzZJMJjPz7rxJKoV5v2a433fO+c45991zH+Emf+gmjx8hAf93BUMVCFUgyAyEWsg9gQxIVyrue4yZngJQDCCSiAbBfIxJ+iC6/qf+IBO+gL5oFbhYuDkakYbvQaj0HiRNSlCqo07XHVhMEYsiQM38pbLKXxi4119wBNgI9FD0mRM/L5aIRRFwqayyWmH+TDCooetTV3JuN5kmBfF+YUEL6DdujliRgG4AiaIBSeCalQ2nXhXFa1Q1ODMT6+95gcHvwzmVqBlhsFejNDe5XJNAuSt/OzkQnHeXV51WxrPKbkWU1EuE1YGboB9iGusfCZw3nxFUC02UlO9RiGu8BSEBx2VFfiXMICXICn0FD5EEcBjL90c3N5wIRoRuAZfzNqyaXi71AYjyFgDLqIhtPfOrujZesvE9gHZ74ghov605vJBw0qZXhG4BF4o3vgXCS74cS+DSmJaGJruA4g01DNrjdXhnfj7W1PDRDRVwNbck/t8IQy9Ay+2OHTvX8ThTwkRV8S1nDzkFfKIwnnGt2eFOPAGXZL6emdDWNq5HhK4KWAtLa0HYOc8huSJ3REbEu2Jbm2rV39ai0oMg2mZfcEXuRmbw5/FtTU/fEAFjheuNBOVPAMsWOJxNB4GY34kzN9lbzFpU2sjA3bNl8njLEpEs2VC62tJoClREwBWwFpZ8ycCTjmx6cedqJ+ID8eaWx1XE2NqSYfWgcxVpluXOJ5yNMzdvUt9OgYgISMDf+cXZNokszAjz6WTO4umEcy3lDJC1YN0UA+FagUlEO+LONX+rhXNfD0jAWH7xdwxsF3FAhMGE303GvwoKYhUOtwpyRg22a1mxHR1XRfBu7wxt+EhOwV2SIaxZnTy10eomxky8pTXiQl5RvkxkFuHYA2J+O6G97WVhvChwNK/oKAMPiuEdbbxshhOnww35DOWYgydU8ClF4fw1nWZ1QNR8hCyO5q7dxEC92s+OMMhjYJs7COYGNoaBeYNMlMPAF/P71j+fCUcS281bNaMXTclITsEpBipEDLpjDMSPygplgPBGoFwGb1nTaTmqxdOswGh23gMypONahrytE7CbgBQFeC5QPgFdlyU5P6+jY9ofV0sADWfdqc4z6wINwNlqHwK8hgFdY7MEvHjH+T/e1S1gKCt3G5gO6gle5TD4igQyMBCpx4bKx3WDMXnIctEX328FhjPyDivgLSLOXYbmH67ix6ovPph3JvV07tMlYDA9ZwLAKu9kX3OEE82YZOBHAieBSP1G5PFo8F1oxv7k3s4ndAkYSMueBlhzBPBqnJWtxr7uI+raYFrWNwzsEKmkJ4aAQ8m956t0CRhMyexVCKkusnu/+WoVF0ZiVCT1d9lvZP2pma8D2BsIfzZgRq2xv2uXLgEDxox9THhWT+YA6gLjTSLEMHgvgBV67EiEh5P7ug/rEjCcmJZuCyMLAxF6nHvbmIHYIcD89UBP8WuAokuASupLTq8G86fOCULMv6+JXuvUmdu46rDyjwSpPHmop8OfUyGTfUkp25npY4Ad33/Um4n71dD9v+etxcsVUoBvMszIO4xjg51aGRMSoBo5FxcXeUt4ZBWglDBhJXjB/UrLl991IrYxaIwUqksd6asTvZkJCwgquiUkhwQsYXKFTIcqIJSmJQSFKrCEyRUyfdNX4D8MQaxAJUQDjQAAAABJRU5ErkJggg=="
                            alt="">
                        <p data-v-5e7f0272="">Please fill in the correct address information. If you put
                            incorrect information, we're not resposible for the loss. </p>
                    </div>
                    <div data-v-5e7f0272="" class="bankbtn" bis_skin_checked="1">

                        <button data-v-5e7f0272="">Save</button>
                    </div>
                </div>
                @include('alert-message')
</body>

</html>
