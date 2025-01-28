@extends($activeTemplate . 'layouts.frontend')
@section('content')

    <body class="body-scroll d-flex flex-column h-100 menu-overlay">
        <!-- Begin page content -->
        <main class="flex-shrink-0 main has-footer">

            <!-- Fixed navbar -->
            <header class="header">
                <div class="row">
                  <div class="col align-self-center text-center">
                    <a class="navbar-brand" href="{{ route('home') }}">
                    </a>
                  </div>
                </div>
            </header>



            <div class="text-center " style="margin-top: -30px" >
                <a href="{{ route('home') }}">
                    <img height="120px" src="{{ getImage(getFilePath('logoIcon') . '/logo.png') }}" alt="site-logo">
                </a>
            </div>
            <footer class="footer">
                <form method="POST" action="{{ route('user.register') }}" class="login-form mt-50 verify-gcaptcha">
                    @csrf
                    <div class="container h-100 ">
                        <div class="row h-100">
                            <div class="col-12 align-self-center mb-4">
                                <div class="row justify-content-center">
                                    <div class="col-11 col-sm-7 col-md-6 col-lg-5 col-xl-4">
                                        <div class="row mt-4">
                                            <div class="col-auto">
                                                <h5 class="font-weight-normal mb-5 text-light border-bottom border-3 fw-bold">
                                                    Email Signup
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="form-group float-label">
                                            <input type="text" class="form-control checkUser" value="{{ old('username') }}" name="username" required>
                                            <label class="form-control-label "><i class="las la-user"></i> Username</label>
                                            <small class="text-danger usernameExist"></small>
                                        </div>
                                        <div class="form-group float-label">
                                            <input type="text" class="form-control checkUser" value="{{ old('email') }}" name="email" required>
                                            <label class="form-control-label "><i class="las la-at"></i> Email</label>
                                        </div>
                                        <div class="form-group float-label position-relative">
                                            <input type="password" class="form-control " name="password" required>
                                            <label class="form-control-label "><i class="las la-unlock-alt"></i> Password</label>
                                        </div>
                                        <div class="form-group float-label position-relative">
                                            <input type="password" class="form-control " name="password_confirmation" required>
                                            <label class="form-control-label "><i class="las la-unlock-alt"></i> Confirm Password</label>
                                        </div>
                                        <div class="form-group float-label position-relative">
                                            <input type="number" class="form-control checkRefBy" name="referBy" >
                                            <label class="form-control-label "><i class="las la-user-plus"></i> Invite Code (Optional)</label>
                                            <small class="text-danger refByExist"></small>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col">
                                                <button type="submit" id="recaptcha" class="btn loginBtn rounded btn-block shadow">Sign Up</button>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center mt-4">
                                            <div class="col text-center">
                                            <p class="text-white mb-1">Already have a Account?</p>
                                            <a href="{{ route('user.login') }}" class="text-white pt-0">
                                                <b>Log in</b>
                                            </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </footer>
        </main>
    </body>

    <!-- Modal -->
    <div class="modal fade" id="existModalCenter" tabindex="-1" role="dialog" aria-labelledby="existModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="existModalLongTitle">@lang('You are with us')</h5>
                    <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </span>
                </div>
                <div class="modal-body">
                    <h6 class="text-center">@lang('You already have an account please Login ')</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">@lang('Close')</button>
                    <a href="{{ route('user.login') }}" class="btn btn--base">@lang('Login')</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
<style>
    body {
        background-image: url("{{asset('assets/images/bg/login.png')}}");
        overflow: hidden;
    }
    .loginBtn {
        background-image: url("{{asset('assets/images/bg/login.png')}}");
    }
    .loginBtn:hover,.loginBtn:focus {
        background-image: url("{{asset('assets/images/bg/login.png')}}") !important;
    }
    .header {
        background: rgb(0 0 0 / 0%);
        box-shadow: 0 8px 32px 0 rgb(31 38 135 / 0%);
        backdrop-filter: blur( 0px );
        -webkit-backdrop-filter: blur( 8px );
        border: 0px solid rgba( 255, 255, 255, 0.18 ) !important;
    }
    .footer {
        background: rgb(0 0 0 / 13%);
        box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
        backdrop-filter: blur( 8px );
        -webkit-backdrop-filter: blur( 8px );
        border: 1px solid rgba( 255, 255, 255, 0.18 ) !important;
        border-radius: 15px 15px 0 0 !important;
        left: 0px;
        right: 0px;
        bottom: 0px;
        width: 100%;
        margin: auto;
    }
    .float-label .form-control {
        border: 1px solid rgb(154 25 92 / 0%);
    }
</style>
@endpush

@push('script')
    <script>
        "use strict";
        (function($) {
            // @if ($mobileCode)
            //     $(`option[data-code={{ $mobileCode }}]`).attr('selected', '');
            // @endif

            // $('select[name=country]').change(function() {
            //     $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
            //     $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
            //     $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));
            // });
            // $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
            // $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
            // $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));
            @if ($general->secure_password)
                $('input[name=password]').on('input', function() {
                    secure_password($(this));
                });

                $('[name=password]').focus(function() {
                    $(this).closest('.form-group').addClass('hover-input-popup');
                });

                $('[name=password]').focusout(function() {
                    $(this).closest('.form-group').removeClass('hover-input-popup');
                });
            @endif

            $('.checkRefBy').on('focusout', function (e) {
                var url = "{{ route('user.checkUser') }}";
                var value = $(this).val();
                var token = '{{ csrf_token() }}';

                if ($(this).attr('name') == 'referBy') {
                    var data = {
                        referBy: value,
                        _token: token
                    }
                }

                $.post(url, data, function(response) {
                    console.log(response);
                    if (response.data != false && response.type == 'referBy') {
                        $('.refByExist').removeClass('text-danger').addClass('text-success').html('Reffer Found!');

                    }else {
                        $('.refByExist').removeClass('text-success').addClass('text-danger').html('Reffer Not Found!');
                    }
                });
            });

            $('.checkUser').on('focusout', function(e) {
                var url = '{{ route('user.checkUser') }}';
                var value = $(this).val();
                var token = '{{ csrf_token() }}';
                if ($(this).attr('name') == 'mobile') {
                    var mobile = `${$('.mobile-code').text().substr(1)}${value}`;
                    var data = {
                        mobile: mobile,
                        _token: token
                    }
                }
                if ($(this).attr('name') == 'email') {
                    var data = {
                        email: value,
                        _token: token
                    }
                }
                if ($(this).attr('name') == 'username') {
                    var data = {
                        username: value,
                        _token: token
                    }
                }
                if ($(this).attr('name') == 'referBy') {
                    var data = {
                        username: value,
                        _token: token
                    }
                }
                $.post(url, data, function(response) {
                    if (response.data != false && response.type == 'email') {
                        $('#existModalCenter').modal('show');
                    } else if (response.data != false) {
                        $(`.${response.type}Exist`).text(`${response.type} already exist`);
                    } else {
                        $(`.${response.type}Exist`).text('');
                    }
                });
            });

        })(jQuery);
    </script>
@endpush
