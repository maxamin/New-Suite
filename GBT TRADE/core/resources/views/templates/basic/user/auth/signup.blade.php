@extends($activeTemplate . 'layouts.frontend')
@section('content')
    @php
    $policyPages = getContent('policy_pages.element', false, null, true);
    $registerCaption = getContent('register.content', true);
    @endphp

<body class="body-scroll d-flex flex-column h-100 menu-overlay">

    <!-- Begin page content -->
    <main class="flex-shrink-0 main has-footer">
        <!-- Fixed navbar -->
        <header class="header">
            <div class="row">
                <div class="col-auto px-0">
                    <button class="menu-btn btn btn-40 btn-link back-btn" type="button">
                        <span class="material-icons">keyboard_arrow_left</span>
                    </button>
                </div>
                <div class="col align-self-center text-center">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <h5 class="mb-0">
                          <img height="24px" src="{{ getImage(getFilePath('logoIcon') . '/logo.png') }}" alt="site-logo">
                        </h5>
                    </a>
                </div>
                <div class="ml-auto col-auto align-self-center">
                    <a href="{{ route('user.login') }}" class="text-white">
                        Sign In
                    </a>
                </div>
            </div>
        </header>

        {{-- <div class="main-container"> --}}
            <form class="verify-gcaptcha mt-4" id="signUpSubmitForm" method="POST">
                @csrf
                <div class="container h-100 ">
                    <div class="row h-100">
                        <div class="col-12 align-self-center mb-4">
                            <div class="row justify-content-center">
                                <div class="col-11 col-sm-7 col-md-6 col-lg-5 col-xl-4">
                                    <h2 class="font-weight-normal mb-5 text-center text-primary">
                                        <b>Sign Up</b>
                                    </h2>
                                    @if (session()->get('reference') != null)
                                        <div class="form-group float-label active">
                                            <input class="form-control " id="referenceBy" name="referBy" type="number" value="{{ session()->get('reference') }}" readonly>
                                            <label class="form-control-label "><i class="las la-user-plus"></i> Refer By</label>
                                        </div>
                                    @else
                                        <div class="form-group float-label">
                                            <input class="form-control  checkRefBy" id="referenceBy" name="referBy" type="number" value="{{ session()->get('reference') }}">
                                            <label class="form-control-label "><i class="las la-user-plus"></i> Refer By <small class="text-warning">(Optional)</small></label>
                                            <small class="text-danger refByExist"></small>
                                        </div>
                                    @endif

                                    <div class="form-group float-label">
                                        <input class="form-control  checkUser" id="email" name="email" type="email" value="{{ old('email') }}" required>
                                        <label class="form-control-label "><i class="las la-envelope-open"></i> Email</label>
                                    </div>

                                    <div class="row">
                                        <div class="col-auto pr-0">
                                            <div class="form-group float-label active">
                                                <div class="input-group">
                                                    <select class="form-control " id="dial_code" name="dial_code" required>
                                                        @foreach ($countries as $key => $country)
                                                            <option data-country="{{ $country->country }}" data-code="{{ $key }}" @if($country->dial_code == '1') selected @endif value="{{ $country->dial_code }}" >{{ __($key) }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <label class="form-control-label "><i class="las la-globe"></i> Code</label>
                                            </div>
                                        </div>
                                        <div class="col pl-0">
                                            <div class="form-group float-label">
                                                <input class="form-control" id="mobile" name="mobile" type="number" value="{{ old('mobile') }}" required>
                                                <label class="form-control-label "><i class="las la-phone"></i> Mobile</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col pr-1">
                                            <div class="form-group float-label">
                                                <input class="form-control  checkUser" id="otp" name="otp" type="number" value="{{ old('otp') }}" required>
                                                <label class="form-control-label "><i class="las la-envelope-open"></i> Otp Code</label>
                                            </div>
                                        </div>
                                        <div class="col-auto pl-0">
                                            <button class="btn btn-info getOtpBtn" style="margin-top: 16px !important;">Get OTP</button>
                                        </div>
                                    </div>

                                    <button class="btn loginBtn rounded btn-block signupBtn" id="recaptcha" type="submit">@lang('Verify')</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        {{-- </div> --}}

    </main>

</body>



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
        .country-code .input-group-text {
            background: #fff !important;
        }

        .country-code select {
            border: none;
        }

        .country-code select:focus {
            border: none;
            outline: none;
        }
    </style>
@endpush
@push('script-lib')
    <script src="{{ asset('assets/global/js/secure_password.js') }}"></script>
@endpush
@push('script')

<script>
    $(document).on('click', '.getOtpBtn', function (e) {
        e.preventDefault();
        $(this).html(BtnSPIN);
        let email = $('[name="email"]').val();
        let dial_code = $('[name="dial_code"]').val();
        let number = $('[name="mobile"]').val();
        let mobile = dial_code+''+number

        $.ajax({
            type: "POST",
            url: "{{route('user.otp.store')}}",
            data: {
                _token:'{{csrf_token()}}',
                'email': email,
                'mobile' : mobile,
            },
            success: function (res) {
                $.ajax({
                    type: "GET",
                    url: "{{route('user.send.otp.mail')}}",
                    data: {
                        '_token':'{{csrf_token()}}',
                        'email': email,
                        'mobile' : mobile,
                    },
                    success: function (res) {
                        $('.getOtpBtn').html('Get Otp'); // btn html change
                        notifyMsg(res.msg, res.cls);
                    }
                });

            },
            error: function(err) {
                $('.getOtpBtn').html('Get Otp'); // btn html change
                let errors = err.responseJSON.errors;
                let error = '';
                let number = 1;
                $.each(errors, function(index, value) {
                    error += (number++) + '. ' + value + '<br>'
                });

                notifyMsg(error, 'error')
            }
        });
    });

    $(document).on('submit', '#signUpSubmitForm', function (e) {
        e.preventDefault();
        $('.signupBtn').html(BtnSPIN);
        let referBy = $('[name="referBy"]').val();
        let email = $('[name="email"]').val();
        let dial_code = $('[name="dial_code"]').val();
        let number = $('[name="mobile"]').val();
        let mobile = dial_code+''+number
        let otp = $('[name="otp"]').val();
        let country = $('select[name=dial_code] :selected').data('country');
        let country_code = $('select[name=dial_code] :selected').data('code');
        console.log(dial_code);

        $.ajax({
            type: "POST",
            url: "{{route('user.signup.submit')}}",
            data: {
                _token:'{{csrf_token()}}',
                email : email,
                number : number,
                mobile : mobile,
                otp : otp,
                referBy : referBy,
                dial_code: dial_code,
                country : country,
                country_code : country_code

            },
            success: function (res) {
                $('.signupBtn').html('Verify');
                console.log(res);
                notifyMsg(res.msg, res.cls);
                if (res.cls === 'success') {
                    setTimeout(() => {
                        location.href = "{{ route('user.register') }}";
                    }, 1000);
                }
            },
            error: function(err) {
                $('.signupBtn').html('Verify');
                let errors = err.responseJSON.errors;
                let error = '';
                let number = 1;
                $.each(errors, function(index, value) {
                    error += (number++) + '. ' + value + '<br>'
                });

                notifyMsg(error, 'error')
            }
        });
    });
</script>





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
                var url = '{{ route('user.checkUser') }}';
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
@push('style')
<style>
    .header {
        background: rgb(0 0 0 / 0%);
        box-shadow: 0 8px 32px 0 rgb(31 38 135 / 0%);
        backdrop-filter: blur( 0px );
        -webkit-backdrop-filter: blur( 8px );
        border: 0px solid rgba( 255, 255, 255, 0.18 ) !important;
    }
</style>
@endpush
