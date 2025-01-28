<html lang="en"
      style="font-size: 16.9387px; --status-bar-height: 0px; --top-window-height: 0px; --window-left: 0px; --window-right: 0px; --window-margin: 0px; --tab-bar-height: 50px; --window-top: calc(0px + env(safe-area-inset-top)); --window-bottom: calc(0px + env(safe-area-inset-bottom));">
<head>
    <link rel="stylesheet" href="{{asset('public/app')}}/assets/uni.ff8a52e0.css">

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
    <title>%pages.team%</title>
    <link rel="stylesheet" href="{{asset('public/app')}}/assets/index-451e69c9.css">
    <link rel="stylesheet" href="{{asset('public/app')}}/assets/u-icon-4f8df990.css">
    <link rel="stylesheet" href="{{asset('public/app')}}/assets/index-ba2f01e9.css">
    <style>
        .max-w-\[800rpx\] {
            max-width: 100%;
        }
    </style>
</head>

<body>
<?php
$rebate = \App\Models\Rebate::first();
?>
<div id="app" data-v-app="">
    <uni-app class="">
        <uni-page type="">
            <uni-page-wrapper>
                <uni-page-body>
                    <uni-view
                        class="min-h-[100vh] max-w-[800rpx] mx-auto bg-[url('@/static/images/pages/mine-bg.jpg')] bg-cover bg-center pb-[100rpx]">
                        <!-- <Sticky> -->
                        <uni-view class="w-[100%] px-[32rpx] py-[32rpx] flex items-center justify-between bg-[#031f38]">
                            <uni-image class="w-[18rpx] h-[30rpx]"
                                       onclick="window.location.href='{{route('user.team')}}'">
                                <div
                                    style="background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB8AAAA1CAYAAAC5mTBpAAAABHNCSVQICAgIfAhkiAAAA75JREFUWEe1mFuITlEUx+dziUFu4YEG5VJeECPl8mAuTKZMIndqFJ4UCTETkaHRxAsPGimXNCIk1LhNinLLA0Wm1MRIbhFCyPj9tT/NfPN9Z+0z3zm7Vmdm1jr/39p7zll7nZ3IiXm0tLSMBrEHK8beYNWJROKwsIk42YAL0T+L9U7hbCCBfbHBAZcDPBIwudxY4ICrgG41VnVw5HDAJ4AuNcDNLHteZHCgfQFewqYY4G/4C4HfiQQOOA/Ba5ie7KDxHucswA8jedoBT0CoHhtggBvxFwF+mYzLauaASxE6g3U3wLfwlwL+3Dquw3DA6xGqwToZ4Dr8ywH/To0LDQeqew5hqwyo3DuBbs8UFwoOOBehc3poDPAvN9tTQXHecMCDELqKjTXAX/GXMOPb1sp4wQGPQqgBG2IIvsJfDPipBZbfhAOeSpyKRx9D8JEDv/UBm3DACwk6jnU1BPWez2XG333BgXDAOwjY5iFWS8wawC0esW1C2i070C5utosMsT/4N2pfDgtNxreBA9amr//vNEPwB/75gBXb4fEfDng4KpexMYbaB/yzAd/rMNXd+A8OWO/uTUzbYtB4hnMm4BfZgnV/En6fn/MNwbsO3GZzyCaJBLMuQ+C8IXKS2VrdSeg8BD+thyfgzirAlaGVPW4QvIm4YRliKwGrGYxlCK6NoGca9eeAR8ZCdaKCZ6pM9cBL4oY3A0i3W2lFJpPAk7gS0MyvI16QAfCRv2tvzrqgpNMXfB2O/QGz005VRgJqJCIdgvdHURUr3UOXhKn5W0YCgW1R2MySFW4LN+72uHktCRzwiPMKScJ1VZWb43FXZEWn9a6mxl/L6pNALSuw2iPRwJDU/Vy/69RgpYfwRWLmkcRPj9i0IWkbSB7CCqJ3eYiqPdarqJoQemTsXklgCWrHsM6G6mP8+uR9F5Ye2Dq7M5ULiPYwhJvwTycBVUvv4dO3j0NNBWagofoa/wwSULfjNUy4VFiBoVxuYCMM1U/41WapMzKHF9wl0I/rFcxqt7zLsTfcJdCNq16xImNaXuU4FNwloMMAvQVWT6c+QeX4YKZEQ8OTQiE+p/aSwOZ0CXQY7lahnKsqonU0cpSY8tTvuazgLgG1WjqtsA6F2pXjrOEugYnuTVBvEDTalONI4C4BHQCqGKkmBI0HLP8kBUQGdwmoCqoWjDcS0Kd1TaRwl0Avrjpj1+F+ptEAvCByeJLGq6gnfEUGeh3wxbHB3SpUc92UksAXfs8H3hgr3CWwgKvOdrQpqU2rAKwjs5y/KWQqYFRmBAsAAAAASUVORK5CYII=); background-position: 0% 0%; background-size: 100% 100%;"></div>
                                <span></span><img
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB8AAAA1CAYAAAC5mTBpAAAABHNCSVQICAgIfAhkiAAAA75JREFUWEe1mFuITlEUx+dziUFu4YEG5VJeECPl8mAuTKZMIndqFJ4UCTETkaHRxAsPGimXNCIk1LhNinLLA0Wm1MRIbhFCyPj9tT/NfPN9Z+0z3zm7Vmdm1jr/39p7zll7nZ3IiXm0tLSMBrEHK8beYNWJROKwsIk42YAL0T+L9U7hbCCBfbHBAZcDPBIwudxY4ICrgG41VnVw5HDAJ4AuNcDNLHteZHCgfQFewqYY4G/4C4HfiQQOOA/Ba5ie7KDxHucswA8jedoBT0CoHhtggBvxFwF+mYzLauaASxE6g3U3wLfwlwL+3Dquw3DA6xGqwToZ4Dr8ywH/To0LDQeqew5hqwyo3DuBbs8UFwoOOBehc3poDPAvN9tTQXHecMCDELqKjTXAX/GXMOPb1sp4wQGPQqgBG2IIvsJfDPipBZbfhAOeSpyKRx9D8JEDv/UBm3DACwk6jnU1BPWez2XG333BgXDAOwjY5iFWS8wawC0esW1C2i070C5utosMsT/4N2pfDgtNxreBA9amr//vNEPwB/75gBXb4fEfDng4KpexMYbaB/yzAd/rMNXd+A8OWO/uTUzbYtB4hnMm4BfZgnV/En6fn/MNwbsO3GZzyCaJBLMuQ+C8IXKS2VrdSeg8BD+thyfgzirAlaGVPW4QvIm4YRliKwGrGYxlCK6NoGca9eeAR8ZCdaKCZ6pM9cBL4oY3A0i3W2lFJpPAk7gS0MyvI16QAfCRv2tvzrqgpNMXfB2O/QGz005VRgJqJCIdgvdHURUr3UOXhKn5W0YCgW1R2MySFW4LN+72uHktCRzwiPMKScJ1VZWb43FXZEWn9a6mxl/L6pNALSuw2iPRwJDU/Vy/69RgpYfwRWLmkcRPj9i0IWkbSB7CCqJ3eYiqPdarqJoQemTsXklgCWrHsM6G6mP8+uR9F5Ye2Dq7M5ULiPYwhJvwTycBVUvv4dO3j0NNBWagofoa/wwSULfjNUy4VFiBoVxuYCMM1U/41WapMzKHF9wl0I/rFcxqt7zLsTfcJdCNq16xImNaXuU4FNwloMMAvQVWT6c+QeX4YKZEQ8OTQiE+p/aSwOZ0CXQY7lahnKsqonU0cpSY8tTvuazgLgG1WjqtsA6F2pXjrOEugYnuTVBvEDTalONI4C4BHQCqGKkmBI0HLP8kBUQGdwmoCqoWjDcS0Kd1TaRwl0Avrjpj1+F+ptEAvCByeJLGq6gnfEUGeh3wxbHB3SpUc92UksAXfs8H3hgr3CWwgKvOdrQpqU2rAKwjs5y/KWQqYFRmBAsAAAAASUVORK5CYII="
                                    draggable="false"></uni-image>
                            <uni-view class="bold text-[32rpx] text-[#fff]">LV{{$level}}</uni-view>
                            <uni-view></uni-view>
                        </uni-view><!-- </Sticky> -->
                        <uni-view class="w-[100%] px-[32rpx] mx-auto">
                            <uni-view
                                class="bg-[#031f38] text-[#fff] mt-[48rpx] p-[48rpx] rounded-[38rpx] border-[2rpx] border-solid border-[#fff] border-opacity-10">
                                <uni-view
                                    class="flex flex-wrap items-center justify-center w-[100%] text-[#02d9f7] font-bold text-[40rpx]">
                                    LV1 - @if($level == 1) {{$rebate->interest_commission1}}% @elseif($level == 2) {{$rebate->interest_commission2}}% @elseif($level == 3) {{$rebate->interest_commission3}}% @else 0% @endif
                                </uni-view>
                                <uni-view class="flex items-center justify-between mt-[12rpx]">
                                    <uni-view class="font-bold">Cumulative bonus</uni-view>
                                    <uni-view class="text-[#02d9f7]">
                                        @if($level == 1)
                                            {{price($levelTotalCommission1)}}
                                        @elseif($level == 2)
                                            {{price($levelTotalCommission2)}}
                                        @elseif($level == 3)
                                            {{price($levelTotalCommission3)}}
                                        @else
                                            {{price(0)}}
                                        @endif
                                    </uni-view>
                                </uni-view>
                                <uni-view class="flex items-center justify-between mt-[12rpx]">
                                    <uni-view class="font-bold">Team members</uni-view>
                                    <uni-view class="text-[#02d9f7]">
                                        @if($level == 1)
                                            {{$first_level_users->count()}}
                                        @elseif($level == 2)
                                            {{$second_level_users->count()}}
                                        @elseif($level == 3)
                                            {{$third_level_users->count()}}
                                        @else
                                            0
                                        @endif
                                    </uni-view>
                                </uni-view>

                                <uni-view class="flex items-center justify-between mt-[24rpx]">
                                    <uni-view class="font-bold">Active team member</uni-view>
                                    <uni-view class="text-[#02d9f7]">
                                        @if($level == 1)
                                            {{$first_level_users->where('investor', 1)->count()}}
                                        @elseif($level == 2)
                                            {{$second_level_users->where('investor', 1)->count()}}
                                        @elseif($level == 3)
                                            {{$third_level_users->where('investor', 1)->count()}}
                                        @else
                                            0
                                        @endif
                                    </uni-view>
                                </uni-view>

                            </uni-view>
                            <uni-view
                                class="bg-[#031f38] text-[#fff] mt-[48rpx] p-[48rpx] rounded-[38rpx] border-[2rpx] border-solid border-[#fff] border-opacity-10">
                                <uni-rich-text>
                                    <div><p><span style="color: rgb(255, 255, 255); font-size: 16px;">When you invite a member to register and invest, you will instantly get a cash reward of 30% of the specified investment amount.</span>
                                        </p>
                                        <p><span style="color: rgb(255, 255, 255); font-size: 16px;">After your Level 2 team members invest, you will receive a cash bonus of 1% of the investment amount.</span>
                                        </p>
                                        <p><span style="color: rgb(255, 255, 255); font-size: 16px;">After your Level 3 team members invest, you will receive a cash bonus of 1% of the investment amount.</span>
                                        </p>
                                        <p><span style="color: rgb(255, 255, 255); font-size: 16px;">Once your team member successfully invests, the cash bonus is instantly credited to your account balance and you can withdraw it immediately.</span>
                                        </p></div>
                                </uni-rich-text>
                            </uni-view>
                        </uni-view>
                    </uni-view>
                </uni-page-body>
            </uni-page-wrapper>
        </uni-page>
        @include('app.layout.manu')
    </uni-app>
</div>
</body>
</html>
