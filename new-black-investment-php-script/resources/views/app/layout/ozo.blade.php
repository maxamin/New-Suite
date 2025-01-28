@php
  $fileprversion = '1.0';
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <title>{{ $setting->site_name }} | @stack('page_title')</title>
  <meta name="csrf-token" content="{{csrf_token()}}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset(themes('img/favicon.png')) }}?v={{ $fileprversion }}" />
  <link rel="stylesheet" href="{{ asset(themes('css/style.css')) }}?v={{ $fileprversion }}">
  <link rel="stylesheet" href="{{ asset(themes('css/animate.css')) }}?v={{ $fileprversion }}">
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
  <script src="{{ asset(themes('js/jquery-3.7.0.min.js')) }}"></script>

  @stack('style')

</head>
  <body>
    @if(View::hasSection('container')) @yield('container') @else <div class="wrapper"> @endif
          @if(View::hasSection('wrapper')) @yield('wrapper') @else <div> @endif
          @if(View::hasSection('no_footer')) @yield('no_footer') @else @include('app.layout.ozo_footer') @endif
          
          @if(View::hasSection('header')) @yield('header') @endif
            
          @yield('content')
          </div>
    </div>

    @include('alert-message')
    <link rel="stylesheet" href="{{ asset(themes('css/loading.css')) }}">
    <div class="loader_boss" style="display: none">
        <svg class="spinner">
            <img style="width: 100%;
        position: absolute;
        top: -50px;
        left: 0px;" src="{{asset('l1.gif')}}">
        </svg>

        <div>
            <span class="l_text">Loading...</span>
        </div>
    </div>
      @stack('script')

  </body>
</html>
