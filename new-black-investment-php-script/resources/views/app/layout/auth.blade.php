<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <title>{{ $setting->site_name }} | @stack('page_title')</title>
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset(themes('img/favicon.png')) }}" />
  <link rel="stylesheet" href="{{ asset(themes('css/style.css')) }}">
  <link rel="stylesheet" href="{{ asset(themes('css/animate.css')) }}">
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
  <script src="{{ asset(themes('js/jquery-3.7.0.min.js')) }}"></script>

  @stack('style')

</head>
  <body>
    <div class="wrapper">
        <div>
          <div class="auth">
            
            @if(View::hasSection('auth_header'))
              @yield('auth_header')
             @else
              <div class="title">
                  <img class="logo" src="{{ asset(themes('img/logo.jpeg')) }}" alt="">
                  <p></p>
                  <p></p>
                  <p class="notify">Login Account <span></span></p>
      
                  <div>
                      <a href="{{ route('login') }}" class="{{ menuActive('login') }}">Login</a>
                      <a href="{{ route('register') }}" class="{{ menuActive('register') }}">Register</a>
                  </div>
              </div>
              @endif

            <!-- Auth form -->
            <div class="form">
                @yield('content')
            </div>
          </div>
        </div>
  </div>

  @include('alert-message')
  @stack('script')

  </body>
</html>
