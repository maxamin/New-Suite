<?php
$user = Auth::user();
$noticeCaption = getContent('notice.content',true);
?>

<!-- Fixed navbar -->
<header class="header">
    <div class="row">
        <div class="col-auto px-0">
            <button class="btn btn-40 btn-link back-btn" type="button">
                <span class="material-icons">keyboard_arrow_left</span>
            </button>
        </div>
        <div class="text-left col pl-0 align-self-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <h6 class="mb-0">{{ @$pageTitle }}</h6>
            </a>
        </div>
        <div class="ml-auto col-auto">
            <div class="row">
                <a href="javascript:void(0)" class=" btn btn-40 btn-link" data-toggle="modal" data-target="#noticeModal">
                    <img width="25px" style="margin-top: -8px;" src="{{asset('assets/images/3d-logo/notice.png')}}" alt="">
                </a>
            </div>
        </div>
    </div>
</header>
@include(activeTemplate() . 'includes.notice_modal')
