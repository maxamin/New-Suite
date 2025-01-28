@php
    $yourLinks = getContent('links.content', true);
@endphp
<style>
    /* body-section */
    body {
        background-color: #000000;
        /* background-image: linear-gradient(to left bottom, #051937, #004d7a, #008793, #00bf72, #a8eb12); */
        background: linear-gradient(180deg, rgb(32, 38, 57) 11.4%, rgb(63, 76, 119) 70.2%);
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center top;
    }
    /* Bottom Nav */
    .footer .footer-icon {
        max-width: 35px;
        max-height: 35px;
    }

    .footer .footer-icon-middle {
        max-width: 65px;
        max-height: 65px;
        margin-top: -26px;
    }

    .main.has-footer {
        padding-bottom: 100px;
    }

    /* font-section */

    .font-lg {
        font-size: 14px;
    }
    .font-sm {
        font-size: 12px;
    }

    a.card {
        box-shadow: 1px 1px 3px 0 rgb(6 174 187 / 39%);
    }

    a.card:hover {
        box-shadow: 1px 1px 3px 0 rgb(6 174 187);
    }

    /* header-section */
    .header {
        background: rgb(0 0 0 / 13%);
        box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
        backdrop-filter: blur( 8px );
        -webkit-backdrop-filter: blur( 8px );
        border: 1px solid rgba( 255, 255, 255, 0.18 ) !important;
    }
    .header {
        padding: 4px 15px;
        border-radius: 5px;
        width: 98%;
        margin: auto;
        top: 4px;
        left: 0px;
        right: 0px;
    }
    .header.active {
        background: rgb(0 0 0 / 13%);
    }

    .main {
        /* background-color: #ffffff00;
        background: #ffffff00; */

        /* background-image: url('{{asset('assets/images/custom-Img/main-bg.png')}}'); */
        /* background-image: url("{{asset('assets/images/frontend/links/' . $yourLinks->data_values->background_image)}}"); */
        /* background-image: linear-gradient(to left top, #051937, #004d7a, #008793, #00bf72, #a8eb12); */
        /* background-image: linear-gradient(to left bottom, #051937, #004d7a, #008793, #00bf72, #a8eb12);
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center top; */
    }
    .main {
        padding: 65px 10px 10px 10px;
    }
    .main .main-container {
        background: rgb(0 0 0 / 13%);
        box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
        /* backdrop-filter: blur( 2.5px ); */
        backdrop-filter: blur( 8px );
        -webkit-backdrop-filter: blur( 2.5px );
        border-radius: 5px;
        border: 1px solid rgba( 255, 255, 255, 0.18 );
        color: #fff;
    }

    /* sidebar-section */
    .menu-overlay .main-menu {
        background: rgb(0 0 0 / 13%);
        box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
        backdrop-filter: blur( 10px );
        -webkit-backdrop-filter: blur( 10px );
        border: 1px solid rgba( 255, 255, 255, 0.18 ) !important;
    }
    .menu-overlay .main-menu {
        border-radius: 5px;
        margin: 5px;
        height: 98%;
    }
    /* .menu-overlay .main-menu .menu-container .nav-pills .nav-item .nav-link.active {
        background: linear-gradient(to bottom, #95e241 0%, #1a674e 100%);
        color: #ffffff;
    }

    .menu-overlay .main-menu .menu-container .nav-pills .nav-item .nav-link.active:hover {
        background: linear-gradient(to top, #95e241 0%, #1a674e 100%);
        color: #ffffff;
    } */
    .menu-overlay .main-menu .menu-container .nav-pills .nav-item .nav-link.active {
        background: #fff0;
        border-bottom: 1px solid #fe0;
        color: #ffffff;
    }
    .menu-overlay .main-menu .menu-container .nav-pills .nav-item .nav-link.active:hover {
        background: #fff0;
        border-bottom: 1px solid #fff;
        color: #ffffff;
    }
    .btn-default {
        border: 0px !important;
        background: linear-gradient(to bottom, #95e241 0%, #1a674e 100%);
        color: #ffffff;
    }
    .btn-default:hover {
        background: linear-gradient(to top, #95e241 0%, #1a674e 100%);
        color: #ffffff;
    }
    .btn-default:focus {
        background: linear-gradient(to top, #95e241 0%, #1a674e 100%);
        color: #ffffff;
    }

    .nav-icons {
        margin-right: 10px;
    }

    /* card */
    .card {
        background-color: rgb(0 0 0 / 13%);
        color: #fff;
        background: rgb(0 0 0 / 13%);
        box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
        backdrop-filter: blur( 8px );
        -webkit-backdrop-filter: blur( 8px );
        border-radius: 5px;
        border: 1px solid rgba( 255, 255, 255, 0.18 ) !important;
    }

    .card-item {
        cursor: pointer;
    }
    .card-item img {
        max-width: 45px;
        max-height: 45px;
    }
    .card-item p {
        color: #d6d6d6;
        font-size: 12px;
        padding-top: 5px;
        text-shadow: #a98f2f 1px 0 10px;
    }
    .card-box {
        cursor: pointer;
    }
    .card-box img {
        padding: 8px;
        max-width: 50px;
        max-height: 50px;
        background: rgb(148 255 253 / 34%);
        box-shadow: 0 2px 5px 0 rgb(31 38 135 / 41%);
        backdrop-filter: blur( 8px );
        -webkit-backdrop-filter: blur( 8px );
        border-radius: 15px;
        border: 1px solid rgba( 255, 255, 255, 0.18 ) !important;
    }
    .card-box img:hover {
        background: rgb(148 255 253 / 16%);
    }
    .card-box img::after {
        background: rgb(148 255 253 / 16%);
    }
    .card-box p {
        color: #d6d6d6;
        font-size: 10px;
        padding-top: 5px;
        text-shadow: #a98f2f 1px 0 10px;
    }

    /* text-section */
    a:hover {
        color: #969696;
    }


    .text-shadow , .text-default,
    .text-primary, .text-white, .text-info,
    .text-warning, .text-danger, .text-success, .text-dark {
        text-shadow: #a98f2f 1px 0 10px;
    }
    .text-default {
        color: #fff;
    }
    .text-primary {
        color: #4cecf7 !important;
    }
    .text-white {
        color: #fff !important;
    }
    .text-secondary {
        color: #ededed !important;
    }

    /* trading view  */
    .tv-screener__symbol {
        color: #ffffff;
        cursor: pointer;
        display: inline-block;
        font-weight: 700;
        max-width: 100%;
        padding-right: 3px;
    }

    /* footer-section */
    .footer {
        background: rgb(0 0 0 / 13%);
        box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
        backdrop-filter: blur( 8px );
        -webkit-backdrop-filter: blur( 8px );
        border: 1px solid rgba( 255, 255, 255, 0.18 ) !important;
        border-radius: 5px !important;
        left: 0px;
        right: 0px;
        bottom: -3px;
        width: 98%;
        margin: auto;
    }
    .footer a:not(.btn).active {
        color: #ffc107;
        border-color: #ffffff00 !important;
    }
    .footer a:not(.btn) {
        padding: 10px 3px !important;
        text-align: center;
        color: #ffffff;
        display: block;
        text-decoration: none;
        border-top: 4px solid transparent;
    }

    /* icon-section */
    .material-icons, .text-no-shadow {
        text-shadow: #492fa900 0 0 0;
    }

    /* modal-section */
    .modal-content {
        color: #fff;
        background-color: rgb(0 0 0 / 13%);
        background: rgb(0 0 0 / 13%);
        box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
        backdrop-filter: blur( 8px );
        -webkit-backdrop-filter: blur( 8px );
        border: 1px solid rgba( 255, 255, 255, 0.18 ) !important;
    }

    /* list-group */
    .list-group-item {
        background-color: #fff0;
    }
    .list-group-item-action {
        color: #ffffff;
    }

    /* badge-section */
    .trxAmount {
        padding-top: 3px;
        padding-bottom: 3px;
        padding-left: 8px;
        padding-right: 8px;
        background: #ffffffa8;
        box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
        backdrop-filter: blur( 4.5px );
        -webkit-backdrop-filter: blur( 4.5px );
        border-radius: 30px;
        border: 1px solid rgba( 255, 255, 255, 0.18 );
    }

    .badge {
        border-radius: 30px;
        padding-top: 5px;
        padding-left: 7px;
        padding-right: 6px;
        padding-bottom: 3px;
    }
    .badge-warning {
        color: #ffc107;
        border: 1px solid #ffc107;
        background: rgba( 255, 193, 7, 0.2 );
        box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
        backdrop-filter: blur( 11px );
        -webkit-backdrop-filter: blur( 11px );
    }
    .badge-success {
        color: #09ff41;
        border: 1px solid #09ff41;
        background: #28a74633;
        box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
        backdrop-filter: blur( 11px );
        -webkit-backdrop-filter: blur( 11px );
    }
    .badge-danger {
        color: #ff6015;
        border: 1px solid #ff6015;
        background: #dc354633;
        box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
        backdrop-filter: blur( 11px );
        -webkit-backdrop-filter: blur( 11px );
    }
    .badge-info {
        color: #15fdff;
        border: 1px solid #15fdff;
        background: #35dccc33;
        box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
        backdrop-filter: blur( 11px );
        -webkit-backdrop-filter: blur( 11px );
    }

    /* button-section */
    .btn {
        border-radius: 30px;
    }



    /* Mine-section */
    .mineBtn {
        display: inline-block;
        outline: 0;
        border: 0;
        cursor: pointer;
        will-change: box-shadow,transform;
        background: radial-gradient( 100% 100% at 100% 0%, #89E5FF 0%, #5468FF 100% );
        box-shadow: 0px 2px 4px rgb(45 35 66 / 40%), 0px 7px 13px -3px rgb(45 35 66 / 30%), inset 0px -3px 0px rgb(58 65 111 / 50%) !important;
        padding: 0 32px;
        border-radius: 30px;
        color: #fff;
        height: 48px;
        font-size: 18px;
        text-shadow: 0 1px 0 rgb(0 0 0 / 40%);
        transition: box-shadow 0.15s ease,transform 0.15s ease;
    }

    .mineBtn:hover {
        color: #fff;
        box-shadow: 0px 4px 8px rgb(45 35 66 / 40%), 0px 7px 13px -3px rgb(45 35 66 / 30%), inset 0px -3px 0px #3c4fe0;
        transform: translateY(-2px);
    }
    .mineBtn:active{
        color: #fff;
        box-shadow: inset 0px 3px 7px #3c4fe0;
        transform: translateY(2px);
    }

    .mineOffBtn {
        display: inline-block;
        outline: 0;
        border: 0;
        cursor: pointer;
        will-change: box-shadow,transform;
        background: radial-gradient( 100% 100% at 100% 0%, #d7d7d7 0%, #c6c6c6 100% );
        box-shadow: 0px 2px 4px rgb(45 35 66 / 40%), 0px 7px 13px -3px rgb(45 35 66 / 30%), inset 0px -3px 0px rgb(58 65 111 / 50%) !important;
        padding: 0 32px;
        border-radius: 30px;
        color: #fff;
        height: 48px;
        font-size: 18px;
        text-shadow: 0 1px 0 rgb(0 0 0 / 40%);
        transition: box-shadow 0.15s ease,transform 0.15s ease;
    }
    .mineOffBtn:hover {
        color: #fff;
        box-shadow: 0px 4px 8px rgb(45 35 66 / 40%), 0px 7px 13px -3px rgb(45 35 66 / 30%), inset 0px -3px 0px #3c4fe0;
        transform: translateY(-2px);
    }
    .mineOffBtn:active{
        color: #fff;
        box-shadow: inset 0px 3px 7px #3c4fe0;
        transform: translateY(2px);
    }

    .glass-box {
        padding: 8px;
        margin-left: 15px;
        margin-right: 15px;
        background: rgb(148 255 253 / 34%);
        box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
        backdrop-filter: blur( 8px );
        -webkit-backdrop-filter: blur( 8px );
        border-radius: 15px;
        border: 1px solid rgba( 255, 255, 255, 0.18 ) !important;
    }

    /* Form-section */
    .form-control {
        color: #ffffff;
        background-color: #0000000f;
    }
    .form-control::placeholder {
        color: #e7e7e7ce;
        opacity: 1;
    }
    .form-control:focus {
        color: #ffffff;
        background-color: rgba(255, 255, 255, 0.155);
    }
    .float-label .form-control-label {
        color: #ffffff;
        left: 10px;
    }
    .float-label .form-control {
        background-color: #f7ebff38;
        border-radius: 5px;
        padding-left: 13px;
        border: 1px solid rgb(255 255 255);
    }

    .form-control:disabled, .form-control[readonly] {
        background-color: #e9ecef61;
        opacity: 1;
    }
    .form-control:disabled, .form-control[readonly]:focus {
        background-color: #e9ecef61;
        opacity: 1;
    }



    /* border-section */
    .border-bottom, .border-top, .border-left, .border-right {
        border-color: #e2e2e26b !important;
    }

    /* switch-section */
    .nightModeImg {
        cursor: pointer;
        -webkit-transition: ease all 0.5s;
    }
    .darkModeSwitch .custom-control-label::before {
        display: none;
    }
    .darkModeSwitch .custom-control-label::after {
        display: none;
     }


    /* image-section */
    .img-thumbnail {
        background-color: #6bb44670;
        border: 1px solid #89be63;
    }

    /* pagelink */
    .page-link {
        color: #ffffff;
        background-color: #ffffff1f;
        border: 1px solid #dee2e60d;
    }
    .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        cursor: auto;
        background-color: #ffffff1f;
        border: 1px solid #dee2e60d;
    }
    .page-item.active .page-link {
        color: #000;
        background-color: #ffffffc7 !important;
        border-color: #cececec7 !important;
    }
    /* transition-sections */
    .transition, .header, .footer,
    .card, .main-container, .main,
    .menu-overlay .main-menu,
    .menu-push-content .main-menu {
        transition: ease all 0.5s;
        -webkit-transition: ease all 0.5s;
        -moz-transition: ease all 0.5s;
        -ms-transition: ease all 0.5s;
    }

    /* background-section */
    .bg-scroll-light {
        background-color: #6bb44670;
        border: 1px solid #89be63;
    }

    .carousel-control-prev-icon {
        background-image: url("{{asset('assets/images/new-logo-3d/left-arrow.png')}}");
    }

    .carousel-control-next-icon {
        background-image: url("{{asset('assets/images/new-logo-3d/right-arrow.png')}}");
    }

    /* swal notify section */
    .swal2-popup.swal2-toast {
        color: #fff;
        background: rgb(0 0 0 / 13%) !important;
        box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 ) !important;
        backdrop-filter: blur( 8px ) !important;
        -webkit-backdrop-filter: blur( 8px ) !important;
        border-radius: 25px !important;
        border: 1px solid rgba( 255, 255, 255, 0.18 ) !important;
    }



    /* ======= DarkMode Start ======= */
    .darkmode .main .main-container {
        background-color: #00000080;
    }
    .darkmode .card, .darkmode .list-group-item, .darkmode .modal-content {
        background-color: #0000008c;
    }
    .darkmode .footer {
        background-color: #00000026;
    }
    .darkmode .header {
        background: rgb(0 0 0 / 45%);
    }
    .darkmode .footer a:not(.btn) {
        color: #dfdfdf !important;
    }
    .darkmode .footer a:not(.btn).active {
        color: #8f81ff !important;
        border-color: #e0ddf700 !important;
    }

    .darkmode .main-menu {
        background: rgb(0 0 0 / 17%);
    }

    .glass-bg {
        background-color: rgb(0 0 0 / 13%);
        color: #fff;
        background: rgb(0 0 0 / 13%);
        box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
        backdrop-filter: blur( 8px );
        -webkit-backdrop-filter: blur( 8px );
        border: 1px solid rgba( 255, 255, 255, 0.18 ) !important;
    }

    .btn.rounded {
        border-radius: 5px !important;
    }

    .swal2-popup.swal2-toast {
        padding: 5px !important;
        border-radius: 5px !important;
        background: rgb(0 0 0 / 40%) !important;
        width: fit-content !important;
    }
    .swal2-popup.swal2-toast .swal2-icon {
        width: 1em !important;
        min-width: 1em !important;
        height: 1em !important;
        display: none !important;
    }

    .swal2-popup.swal2-toast .swal2-icon .swal2-icon-content {
        font-size: 16px !important;
    }

    .swal2-popup.swal2-toast .swal2-title {
        text-align: center !important;
    }


</style>
