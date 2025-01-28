<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $general->siteName(__($pageTitle)) }}</title>
    @include('partials.seo')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    @include('templates.basic.layouts.custom.mobile_css')

    @stack('style')
</head>



<body>

    <!--top-nav-->
    {{-- <nav class="navbar fixed-top navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <a class="navbar-brand me-0" href="{{ route('home') }}">
                        <img class="site-logo" src="{{ asset('assets/images/logoIcon/logo.png') }}" alt="logo">
                    </a>
                </div>
                @auth
                    <div class="col-auto">
                        <div class="btn btn-sm btn-primary rounded-pill">
                            <img width="20px" height="20px" style="margin-top: -2px" src="{{asset('assets/images/3d-icon/coin.png')}}" alt="">
                            <span class="badge bg-white text-dark userBalance rounded-pill" style="padding-top: 2px; padding-bottom: 2px;">
                                <b>{{$general->cur_sym}}{{showAmount(auth()->user()->balance)}}</b>
                            </span>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </nav> --}}


    @yield('content')

    <!-- Bottom Nav -->
    <nav class="navbar fixed-bottom navbar-dark bg-dark-alt">
        <div class="container-fluid">
            <div class="row mx-auto" style="justify-content: space-evenly">
                <div class="col-auto px-3 nav-icon">
                    <a class="text-center" href="{{ route('home') }}">
                        <i class="fas fa-home"></i>
                        <p class="small-font-sm text-white think-font">Home</p>
                    </a>
                </div><br>
                <div class="col-auto px-3 nav-icon">
                    <a class="text-center" href="{{route('user.runing.plans')}}">
                        <i class="fas fa-fan fa-2xl"></i>
                        <p class="small-font-sm text-white think-font">Device</p>
                    </a>
                </div><br>
                <div class="col-auto px-3 nav-icon">
                    <a class="text-center" href="{{ route('user.teams') }}">
                        <i class="fas fa-users"></i>
                        <p class="small-font-sm text-white think-font">Team</p>
                    </a>
                </div><br>
                <div class="col-auto px-3 nav-icon">
                    <a class="text-center" href="{{ route('user.home') }}">
                        <i class="fas fa-user"></i>
                        <p class="small-font-sm text-white think-font">My</p>
                    </a>
                </div>
            </div>
        </div>
    </nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    const Spiner = `<div class="spinner-border spinner-border-sm" role="status"></div>`;
    //-- Notify --//
    const notifyMsgBig = (headline, msg, cls) => {
        Swal.fire(
            headline,msg,cls
        )
    }
    const notifyMsg = (msg,cls) => {
        Swal.fire({
            position: 'top-end',
            icon: cls,
            title: msg,
            toast:true,
            showConfirmButton: false,
            timer: 2500
        })
    }

    let auth_user = null;

    // const getUserDataNow = () => {
    //     $.ajax({
    //         type: "get",
    //         url: "{{route('user.data.api')}}",
    //         success: function (res) {
    //             auth_user = res.user;
    //             return auth_user;
    //         }
    //     });
    // }
    // getUserDataNow()

    const userDataApi = () => {
        $.ajax({
            type: "get",
            url: "{{route('user.data.api')}}",
            success: function (res) {
                $('.userBalance').html('{{ $general->cur_sym }}'+(parseFloat(res.user.balance).toFixed(2)))
                $('.userBalanceRound').html(Math.round(parseFloat(res.user.balance).toFixed(2)) + ' {{ $general->cur_text }}')
            }
        });
    }
    userDataApi()

</script>

<script>
    const currentUrl = $(location).attr('href');

    // active Class System Jquery
    $('.nav-icon a').each(function(index,item){
        let navLink = item['href'];
        if (currentUrl == navLink){
            $('.nav-icon').removeClass('active');
            $(this).addClass('active');
        }else{
            $('.nav-icon').removeClass('active');
        }
    });

</script>
<script>
    const copyTxt = (id) =>{
        var r = document.createRange();
        r.selectNode(document.getElementById(id));
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(r);
        document.execCommand('copy');
        window.getSelection().removeAllRanges();
        notifyGlass('success','Copy Success!')
    }
</script>

@stack('script')
@include('partials.plugins')
@include('partials.notify')

</body>

</html>
