<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--Head-->
@include('backend.include.__head')
<!--/Head-->
<body>

    <video autoplay muted loop id="bg-video">
        <source src="/assets/backend/materials/prodax.mp4" type="video/mp4">
        Tarayıcınız video etiketini desteklemiyor.
    </video>
    
    <style>
    
#bg-video {
    position: fixed; 
    top: 0;
    left: 0;
    min-width: 100%; 
    min-height: 100%;
    z-index: -1; /* Diğer içeriklerin üzerine eklemek için */
}

    </style>

<!--Auth Page-->
<div class="">
    <x:notify-messages/>
    @yield('auth-content')
</div>
<!--/Auth Page-->

<!--Script-->
@include('backend.include.__script')
<!--/Script-->

</body>
</html>
