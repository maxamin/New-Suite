<html lang="en"
      style="font-size: 16.9387px; --status-bar-height: 0px; --top-window-height: 0px; --window-left: 0px; --window-right: 0px; --window-margin: 0px; --tab-bar-height: 50px; --window-top: calc(0px + env(safe-area-inset-top)); --window-bottom: calc(50px + env(safe-area-inset-bottom));">
<head>
    <link rel="stylesheet" href="{{asset('public/app')}}/assets/uni.ff8a52e0.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
    <title>i am</title>
    <link rel="stylesheet" href="{{asset('public/app')}}/assets/index-451e69c9.css">
    <link rel="stylesheet" href="{{asset('public/app')}}/assets/toast-22fe1e72.css">
    <style>
        .bg-\[url\(\'\@\/static\/images\/pages\/share_pop_bg\.jpg\'\)\] {
            background: url({{asset('public')}}/app/assets/navy-blue.jpg);
            background-attachment: fixed;
        }
        .van-popup--center {
            top: 50%;
            left: 0;
            right: 0;
            width: -moz-fit-content;
            width: fit-content;
            max-width: 100%;
            margin: 0 auto;
            transform: translateY(-50%);
        }
        .van-popup--center.van-popup--round {
            border-radius: 0
        }
        .text-\[\#015eb4\] {
            --tw-text-opacity: 1;
            color: #fff;
        }
    </style>
</head>

<body>
<div id="app" data-v-app="">
    <uni-app class="uni-app--showtabbar">
        <uni-page data-page="pages/mine/index" type="tabBar">
            <uni-page-wrapper>
                <uni-page-body>
                    <div class="van-overlay" role="button" tabindex="0"
                         style="z-index: 1; backdrop-filter: blur(10px);"></div>
                    <div role="dialog" tabindex="0" class="van-popup van-popup--round van-popup--center"
                         style="z-index: 1;">
                        <uni-view
                            class="bg-[url('@/static/images/pages/share_pop_bg.jpg')] bg-cover bg-center min-h-[1300rpx]">
                            <uni-view class="px-[30rpx] py-[30rpx]">
                                <uni-view
                                    class="text-[28rpx] leading-[36rpx] text-[#015eb4] font-[600] mx-[20rpx] mt-[10rpx] text-left">
                                    Copy the promotion link
                                </uni-view>
                                <uni-view class="flex justify-between items-center h-[100rpx] mt-[10rpx]">
                                    <uni-view
                                        class="w-[90%] h-[60rpx] px-[26rpx] text-[32rpx] font-[600] text-[#e91d1a] leading-[60rpx] border-solid border-[#e91d1a] border-[2rpx] rounded-[38rpx]">
                                        <uni-view class="w-[100%] overflow-hidden whitespace-nowrap">
                                            {{url('account/register').'?inviteCode='.auth()->user()->ref_id}}
                                        </uni-view>
                                    </uni-view>
                                    <uni-view class="h-[60rpx] w-[100rpx] ml-[20rpx] flex items-center justify-center" onclick="copyLink('{{url('account/register').'?inviteCode='.auth()->user()->ref_id}}')">
                                        <i class="van-badge__wrapper van-icon van-icon-like"
                                           style="color: rgb(1, 94, 180); font-size: 28px;"></i>
                                    </uni-view>
                                </uni-view>
                                <uni-view class="py-[30rpx]">
                                    <uni-view
                                        class="text-[28rpx] leading-[36rpx] text-[#015eb4] font-[600] mx-[20rpx] text-center">
                                        Save and share QR codes.
                                    </uni-view>
                                    <uni-view class="w-[280rpx] h-[280rpx] mx-auto mt-[20rpx]"><img
                                            src="data:image/png;base64,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"
                                            class="w-[280rpx] h-[280rpx] mx-auto" style="display: inline-block;">
                                    </uni-view>
                                </uni-view>
                                <uni-view class="flex items-center justify-center mt-[30rpx]"
                                          onclick="copyLink('{{url('account/register').'?inviteCode='.auth()->user()->ref_id}}')">
                                    <uni-view
                                        class="w-[100%] h-[100rpx] text-[#015eb4] text-[48rpx] font-[700] flex items-center justify-center">
                                        copy<i class="van-badge__wrapper van-icon van-icon-upgrade ml-[16rpx]"
                                              style="font-size: 32px; transform: rotate(90deg);">
                                        </i></uni-view>
                                </uni-view>

                                <p style="color: #ffffff9c;margin: 10px 0;">Ready to take your investment journey to the next level? {{env('APP_NAME')}}-Invite your team to work together on this.</p>
                                <p style="color: #ffffff9c;margin: 10px 0;font-weight: bolder;font-size: 18px;">Share the link</p>
                                <p style="color: #ffffff9c;margin: 10px 0;">Send the link to your team members via email, message or any preferred communication channel.</p>
                            </uni-view>
                        </uni-view>
                    </div>
                </uni-page-body>
            </uni-page-wrapper>
        </uni-page>
        @include('app.layout.manu')
    </uni-app>
</div>
<div id="all-component-box" data-v-app="">
    <div class="van-back-top__placeholder"></div>
</div>

<div class="van-back-top" style="right: 10px; bottom: 100px;"><i
        class="van-badge__wrapper van-icon van-icon-back-top van-back-top__icon"></i></div>

@include('alert-message')
<script>
    function copyLink(text)
    {
        const body = document.body;
        const input = document.createElement("input");
        body.append(input);
        input.style.opacity = 0;
        input.value = text.replaceAll(' ', '');
        input.select();
        input.setSelectionRange(0, input.value.length);
        document.execCommand("Copy");
        input.blur();
        input.remove();
        message('Copied success..')
    }
</script>
</body>
</html>
