<?php
$user = Auth::user();
$noticeCaption = getContent('notice.content',true);
?>

<!-- Fixed navbar -->
<header  class="header">
    <div class="row">

        <div class="text-left col align-self-center">
            <a class="navbar-brand" href="{{ route('home') }}">
                <h5 class="mb-0"><img style="height:35px;" src="{{ getImage(getFilePath('logoIcon') . '/logo.png') }}" alt="site-logo"></h5>
            </a>
        </div>
        <div class="ml-auto col-auto pl-0">
            <div class="row">

                <a href="notification.html" class=" btn btn-40 btn-link" data-toggle="modal" data-target="#noticeModal">
                    <img width="25px" style="margin-top: -8px;" src="{{asset('assets/images/3d-logo/notice.png')}}" alt="">
                </a>
            </div>
        </div>
    </div>

</header>


@include(activeTemplate() . 'includes.color_change')
@include(activeTemplate() . 'includes.notice_modal')


