@extends($activeTemplate . 'layouts.mobile_auth')
@section('content')
    @php
        $policyPages = getContent('policy_pages.element', false, null, true);
        $registerCaption = getContent('register.content', true);
    @endphp
    
    <style>

#rele div {
    padding-top: 2px;
    color: #340c99;
    height: 43px;
    line-height: 43px;
    margin: 0 5px;
    border: 1px solid #757575;
    border-radius: 5px;
    box-shadow: 0 0 5px rgb(0 0 0 / 46%);
}
#rele #rel1{background-color:#094ae0; cursor:pointer;}
#rele #rel2{background-color:#094ae0; cursor:pointer;}

#rele #rel1:hover{ background-color:#340c99; color:#340c99}
#rele #rel2:hover{ background-color:#340c99; color:#340c99}


#rele div2 {
	-webkit-transform: skewX(-30deg); /* Для Safari и Chrome */
    -moz-transform: skewX(-30deg); /* Для Firefox */
    -o-transform: skewX(-30deg); /* Для Opera */
    -ms-transform: skewX(-30deg); /* Для IE */
    transform: skewX(-30deg); /* CSS3 */
}
	
#rele span2{
	display:block;
	-webkit-transform: skewX(30deg); /* Для Safari и Chrome */
    -moz-transform: skewX(30deg); /* Для Firefox */
    -o-transform: skewX(30deg); /* Для Opera */
    -ms-transform: skewX(30deg); /* Для IE */
    transform: skewX(30deg); /* CSS3 */
}

#reles div {
    color: #FFFFFF;
    height: 43px;
    line-height: 43px;
    margin: 0 5px;
    border: 1px solid #757575;
    border-radius: 5px;
    box-shadow: 0 0 5px rgb(0 0 0 / 46%);
}
#reles #rels1{background-color:#808080; cursor:pointer;}
#reles #rels2{background-color:#735cfc; cursor:pointer;}

#reles #rels1:hover{ background-color:#FFFFFF; color:#333333}
#reles #rels2:hover{ background-color:#FFFFFF; color:#333333}


#reles div2 {
	-webkit-transform: skewX(-30deg); /* Для Safari и Chrome */
    -moz-transform: skewX(-30deg); /* Для Firefox */
    -o-transform: skewX(-30deg); /* Для Opera */
    -ms-transform: skewX(-30deg); /* Для IE */
    transform: skewX(-30deg); /* CSS3 */
}
	
#reles span2{
	display:block;
	-webkit-transform: skewX(30deg); /* Для Safari и Chrome */
    -moz-transform: skewX(30deg); /* Для Firefox */
    -o-transform: skewX(30deg); /* Для Opera */
    -ms-transform: skewX(30deg); /* Для IE */
    transform: skewX(30deg); /* CSS3 */
}


    </style>



    <div class="container">
        
       <div class="row">
        
            <div class="col-12 text-center mt-1">
                <img width="150px" src="{{ asset('assets/images/logoIcon/logo.png') }}"
                    alt="">
                    
                    
        </div>   
        </div>
          <table width="100%"  style="padding-top:35px;">
<tr align="center">
<td width="40%"> <a href="{{ route('user.register') }}" class="btn btn-lg bg-gr-orange btn-primary w-100 rounded-pill mt-2"style="line-height:35px;">Register</a></td>
<td width="40%"> <a href="{{ route('user.login') }}" class="btn btn-lg btn-dark w-100 rounded-pill mt-2" style="line-height:35px;">Login</a></td>
</tr>
</table>

                <h6 class="" style="padding-top:35px;">Mobile Phone Registration</h6>
            
        
        
       

        <form action="{{ route('user.register') }}" method="POST" class="mt-4 form-login">
            @csrf
            <div class="mb-3">
                <p class="icon"><i class="fa fa-phone fa-rotate-90"></i> +</p>
                <input type="number" class="form-control" name="username" value="{{old('username')}}" placeholder="Please enter the phone number">
            </div>
            <div class="mb-3">
                <p class="icon">
                    <i class="fas fa-lock"></i>
                </p>
                <input type="password" class="form-control" name="password" placeholder="Please enter your password">
            </div>
            <div class="mb-3">
                <p class="icon">
                    <i class="fas fa-lock"></i>
                </p>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Please enter your password again">
            </div>
             @if (session()->get('inviteCode') != null)
             
             <div class="mb-1">
                <p class="icon">
                    <i class="fas fa-share-alt"></i>
                </p>
                <input type="text" class="form-control" name="referBy" value="{{ session()->get('inviteCode') }}" required readonly placeholder="Please enter invitation code">
            </div>
            
                                        
                                    @endif
                                    
                
            <button type="submit" class="btn btn-lg bg-gr-orange btn-primary w-100 rounded-pill mt-4">Sign Up Now</button>
        </form>
       

    </div>





    <!-- ===============>> account start here <<================= -->
    {{-- <section class="account padding-top padding-bottom sec-bg-color2">
        <div class="container">
            <div class="account__wrapper" data-aos="fade-up" data-aos-duration="800">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="account__content account__content--style1">

                            <!-- account tittle -->
                            <div class="account__header">
                                <h2>Create Your Account</h2>
                                <p>Hey there! Ready to join the party? We just need a few details from you to get started.
                                    Let's do this!
                                </p>
                            </div>
                            <form class="account__form needs-validation loginForm" action="{{ route('user.register') }}" method="post">
                                @csrf
                                <div class="row g-4">
                                    @if (session()->get('reference') != null)
                                        <div class="col-12">
                                            <div>
                                                <label for="referenceBy" class="form-label">Refer Id</label>
                                                <input type="text" name="referBy" id="referenceBy" class="form-control" value="{{ session()->get('reference') }}" required readonly>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-12 col-md-6">
                                        <div>
                                            <label for="first-name" class="form-label">First name</label>
                                            <input class="form-control" type="text" id="first-name" name="firstname" value="{{ old('firstname') }}" placeholder="Ex. Jhon" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div>
                                            <label for="last-name" class="form-label">Last name</label>
                                            <input class="form-control" type="text" id="last-name" name="lastname" value="{{ old('lastname') }}" placeholder="Ex. Doe" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div>
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" name="username" placeholder="Enter your username" class="form-control checkUser" value="{{ old('username') }}" required>
                                            <small class="text-danger usernameExist"></small>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div>
                                            <label for="account-email" class="form-label">Email</label>
                                            <input type="email" name="email" placeholder="Enter your email" id="account-email" class="form-control checkUser" value="{{ old('email') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-pass">
                                            <label for="account-pass" class="form-label">Password</label>
                                            <input type="password" class="password-show form-control showhide-pass" id="account-pass" name="password"
                                                placeholder="Password" required>

                                            <button type="button" class="eyeBtn form-pass__toggle"><i
                                                    id="eyeIcon1" class="fa fa-eye"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-pass">
                                            <label for="account-cpass" class="form-label">Confirm Password</label>
                                            <input type="password" class="password-show form-control showhide-pass" id="account-cpass" name="password_confirmation"
                                                placeholder="Re-type password" required>

                                            <button type="button" class="eyeBtn form-pass__toggle"><i
                                                    id="eyeIcon2" class="fa fa-eye"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="trk-btn trk-btn--border trk-btn--primary d-block mt-4">Sign Up</button>
                            </form>


                            <div class="account__switch">
                                <p>Already have account? <a href="{{route('user.login')}}">Login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="account__shape">
            <span class="account__shape-item account__shape-item--1"><img src="{{asset('assets/images/contact/4.png')}}"
                    alt="shape-icon"></span>
        </div>
    </section> --}}
    <!-- ===============>> account end here <<================= -->


    {{-- <section class="pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-area">
                        <h2 class="title mb-3">{{ __($registerCaption->data_values->heading) }}</h2>
                        <form class="action-form verify-gcaptcha loginForm" action="{{ route('user.register') }}" method="post">
                            @csrf
                            @if (session()->get('reference') != null)
                                <div class="form-group">
                                    <label for="referenceBy" class="form-label">@lang('Reference by')</label>
                                    <input type="text" name="referBy" id="referenceBy" class="form-control" value="{{ session()->get('reference') }}" readonly>
                                </div>
                            @endif

                            <div class="form-group">
                                <label>@lang('Username')</label>
                                <input type="text" name="username" placeholder="@lang('Username')" class="form-control checkUser" value="{{ old('username') }}" required>
                                <small class="text-danger usernameExist"></small>
                            </div><!-- form-group end -->


                            <div class="form-group">
                                <label>@lang('Email')</label>
                                <input type="email" name="email" placeholder="@lang('Email')" class="form-control checkUser" value="{{ old('email') }}" required>
                            </div><!-- form-group end -->

                            <div class="form-group">
                                <label class="form-label">@lang('Country')</label>
                                <select name="country" class="form-select form--select" required>
                                    @foreach ($countries as $key => $country)
                                        <option data-mobile_code="{{ $country->dial_code }}" value="{{ $country->country }}" data-code="{{ $key }}">{{ __($country->country) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">@lang('Mobile')</label>
                                <div class="input-group ">
                                    <span class="input-group-text mobile-code">

                                    </span>
                                    <input type="hidden" name="mobile_code">
                                    <input type="hidden" name="country_code">
                                    <input type="number" name="mobile" value="{{ old('mobile') }}" class="form-control form--control checkUser" required>
                                </div>
                                <small class="text-danger mobileExist"></small>
                            </div>

                            <div class="form-group hover-input-popup">
                                <label>@lang('Password')</label>
                                <input type="password" name="password" placeholder="@lang('Password')" class="form-control" required>
                                @if ($general->secure_password)
                                    <div class="input-popup">
                                        <p class="error lower">@lang('1 small letter minimum')</p>
                                        <p class="error capital">@lang('1 capital letter minimum')</p>
                                        <p class="error number">@lang('1 number minimum')</p>
                                        <p class="error special">@lang('1 special character minimum')</p>
                                        <p class="error minimum">@lang('6 character password')</p>
                                    </div>
                                @endif
                            </div><!-- form-group end -->
                            <div class="form-group mb-3">
                                <label>@lang('Re-type Password')</label>
                                <input type="password" name="password_confirmation" placeholder="@lang('Re-type Password')" class="form-control" required>
                            </div><!-- form-group end -->

                            <x-captcha />

                            @if ($general->agree)
                                <div class="form-group">
                                    <input type="checkbox" id="agree" @checked(old('agree')) name="agree" required>
                                    <label for="agree">@lang('I agree with') </label> <span>@foreach ($policyPages as $policy)
                                        <a href="{{ route('policy.pages', [slug($policy->data_values->title), $policy->id]) }}" target="_blank">{{ __($policy->data_values->title) }}</a>
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach</span>
                                </div><!-- form-group end -->
                            @endif

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn--base w-100">@lang('Register Now')</button>
                                <p class="mt-20">@lang('Already have an account?') <a href="{{ route('user.login') }}">@lang('Login Now')</a></p>
                            </div>

                        </form>
                        @php
                            $credentials = $general->socialite_credentials;
                        @endphp
                        @if ($credentials->google->status == 1 || $credentials->facebook->status == 1 || $credentials->linkedin->status == 1)
                            <div class="col-12 my-3">
                                <p class="text-center sm-text mb-2">@lang('Or Login with')</p>

                                <div class="socials-buttons d-flex flex-wrap flex-row gap-10 justify-content-between">

                                    @if ($credentials->google->status == 1)
                                        <a href="{{ route('user.social.login', 'google') }}" class="btn btn-outline-google btn-sm text-uppercase">
                                            <span class="me-1"><i class="fab fa-google"></i></span> @lang('Google')</a>
                                    @endif

                                    @if ($credentials->facebook->status == 1)
                                        <a href="{{ route('user.social.login', 'facebook') }}" class="btn btn-outline-facebook btn-sm text-uppercase">
                                            <span class="me-1"><i class="fab fa-facebook-f"></i></span> @lang('Facebook')</a>
                                    @endif

                                    @if ($credentials->linkedin->status == 1)
                                        <a href="{{ route('user.social.login', 'linkedin') }}" class="btn btn-outline-linkedin btn-sm text-uppercase">
                                            <span class="me-1"><i class="fab fa-linkedin-in"></i></span> @lang('Linkedin')</a>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section> --}}



    <div class="modal fade" id="existModalCenter" tabindex="-1" role="dialog" aria-labelledby="existModalCenterTitle"
        aria-hidden="true">
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

@endpush
@if ($general->secure_password)
    @push('script-lib')
        <script src="{{ asset('assets/global/js/secure_password.js') }}"></script>
    @endpush
@endif
@push('script')
    <script>
        "use strict";
        (function($) {
            @if ($mobileCode)
                $(`option[data-code={{ $mobileCode }}]`).attr('selected', '');
            @endif

            $('select[name=country]').change(function() {
                $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
                $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
                $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));
            });
            $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
            $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
            $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));

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
@push('script')
    <script>
        $('.header-section').removeClass('header-section--style2').addClass('bg-color-3');

        $('.eyeBtn').on('click', function() {
            let type = $('.password-show').attr('type');
            if (type == 'password') {
                $('.password-show').attr('type', 'text');
            } else {
                $('.password-show').attr('type', 'password');
            }
        });
    </script>
@endpush
