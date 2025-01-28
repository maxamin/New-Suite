<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('backend.include.__head')
<body>
    
    
    <video autoplay muted loop id="bg-video">
        <source src="/assets/backend/materials/prodax.mp4" type="video/mp4">
        Tarayıcınız video etiketini desteklemiyor.
    </video>
    
    <style>
        .title {
            color: white;
        }

#bg-video {
    position: fixed; 
    top: 0;
    left: 0;
    min-width: 100%; 
    min-height: 100%;
    z-index: -1; /* Diğer içeriklerin üzerine eklemek için */
}

    </style>
    
<!--Full Layout-->
<div class="layout">

    <x:notify-messages/>
    <!--Header-->
    @include('backend.include.__header')
    <!--/Header-->

    <!--Side Nav-->
    @include('backend.include.__side_nav')
    <!--/Side Nav-->

    <!--Page Content-->
    <div class="page-container">
        @yield('content')
    </div>
    <!--Page Content-->
</div>
<!--/Full Layout-->

@include('backend.include.__script')
</body>
</html>
