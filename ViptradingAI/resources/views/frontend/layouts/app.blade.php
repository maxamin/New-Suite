<!DOCTYPE html>
<html lang="en">

@include('frontend.include.__head')


<body class="{{ session()->get('site-color-mode') ?? 'dark-theme' }}">
<x:notify-messages/>
<!--Header Area-->
<!--/Header Area End-->

@yield('content')



@include('frontend.include.__script')


</body>
</html>

