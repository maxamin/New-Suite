<html lang="en"
      style="font-size: 16.9387px; --status-bar-height: 0px; --top-window-height: 0px; --window-left: 0px; --window-right: 0px; --window-margin: 0px; --tab-bar-height: 50px; --window-top: calc(0px + env(safe-area-inset-top)); --window-bottom: calc(0px + env(safe-area-inset-bottom));">
<head>
    <link rel="stylesheet" href="{{asset('public/app')}}/assets/uni.ff8a52e0.css">

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
    <title>More product details</title>
    <link rel="stylesheet" href="{{asset('public/app')}}/assets/index-451e69c9.css">
    <link rel="stylesheet" href="{{asset('public/app')}}/assets/toast-22fe1e72.css">
</head>

<body>
<?php
$myPackage = \App\Models\Purchase::where('user_id', user()->id)->where('status', 'active')->where('package_id', $package->id)->first();
?>
<div id="app" data-v-app="">
    <uni-app class="">
        <uni-page type="">
            <uni-page-wrapper>
                <uni-page-body>
                    <uni-view
                        class="min-h-[100vh] max-w-[800rpx] bg-[url('@/static/images/pages/mine-bg.jpg')] bg-cover bg-center pb-[100rpx]"
                        id="3"><!-- <Sticky> -->
                        <uni-view class="w-[100%] px-[32rpx] py-[32rpx] flex items-center justify-between bg-[#031f38]">
                            <uni-image class="w-[18rpx] h-[30rpx]" onclick="window.location.href='{{route('dashboard')}}'">
                                <div style="background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB8AAAA1CAYAAAC5mTBpAAAABHNCSVQICAgIfAhkiAAAA75JREFUWEe1mFuITlEUx+dziUFu4YEG5VJeECPl8mAuTKZMIndqFJ4UCTETkaHRxAsPGimXNCIk1LhNinLLA0Wm1MRIbhFCyPj9tT/NfPN9Z+0z3zm7Vmdm1jr/39p7zll7nZ3IiXm0tLSMBrEHK8beYNWJROKwsIk42YAL0T+L9U7hbCCBfbHBAZcDPBIwudxY4ICrgG41VnVw5HDAJ4AuNcDNLHteZHCgfQFewqYY4G/4C4HfiQQOOA/Ba5ie7KDxHucswA8jedoBT0CoHhtggBvxFwF+mYzLauaASxE6g3U3wLfwlwL+3Dquw3DA6xGqwToZ4Dr8ywH/To0LDQeqew5hqwyo3DuBbs8UFwoOOBehc3poDPAvN9tTQXHecMCDELqKjTXAX/GXMOPb1sp4wQGPQqgBG2IIvsJfDPipBZbfhAOeSpyKRx9D8JEDv/UBm3DACwk6jnU1BPWez2XG333BgXDAOwjY5iFWS8wawC0esW1C2i070C5utosMsT/4N2pfDgtNxreBA9amr//vNEPwB/75gBXb4fEfDng4KpexMYbaB/yzAd/rMNXd+A8OWO/uTUzbYtB4hnMm4BfZgnV/En6fn/MNwbsO3GZzyCaJBLMuQ+C8IXKS2VrdSeg8BD+thyfgzirAlaGVPW4QvIm4YRliKwGrGYxlCK6NoGca9eeAR8ZCdaKCZ6pM9cBL4oY3A0i3W2lFJpPAk7gS0MyvI16QAfCRv2tvzrqgpNMXfB2O/QGz005VRgJqJCIdgvdHURUr3UOXhKn5W0YCgW1R2MySFW4LN+72uHktCRzwiPMKScJ1VZWb43FXZEWn9a6mxl/L6pNALSuw2iPRwJDU/Vy/69RgpYfwRWLmkcRPj9i0IWkbSB7CCqJ3eYiqPdarqJoQemTsXklgCWrHsM6G6mP8+uR9F5Ye2Dq7M5ULiPYwhJvwTycBVUvv4dO3j0NNBWagofoa/wwSULfjNUy4VFiBoVxuYCMM1U/41WapMzKHF9wl0I/rFcxqt7zLsTfcJdCNq16xImNaXuU4FNwloMMAvQVWT6c+QeX4YKZEQ8OTQiE+p/aSwOZ0CXQY7lahnKsqonU0cpSY8tTvuazgLgG1WjqtsA6F2pXjrOEugYnuTVBvEDTalONI4C4BHQCqGKkmBI0HLP8kBUQGdwmoCqoWjDcS0Kd1TaRwl0Avrjpj1+F+ptEAvCByeJLGq6gnfEUGeh3wxbHB3SpUc92UksAXfs8H3hgr3CWwgKvOdrQpqU2rAKwjs5y/KWQqYFRmBAsAAAAASUVORK5CYII=); background-position: 0% 0%; background-size: 100% 100%;"></div>
                                <span></span><img
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB8AAAA1CAYAAAC5mTBpAAAABHNCSVQICAgIfAhkiAAAA75JREFUWEe1mFuITlEUx+dziUFu4YEG5VJeECPl8mAuTKZMIndqFJ4UCTETkaHRxAsPGimXNCIk1LhNinLLA0Wm1MRIbhFCyPj9tT/NfPN9Z+0z3zm7Vmdm1jr/39p7zll7nZ3IiXm0tLSMBrEHK8beYNWJROKwsIk42YAL0T+L9U7hbCCBfbHBAZcDPBIwudxY4ICrgG41VnVw5HDAJ4AuNcDNLHteZHCgfQFewqYY4G/4C4HfiQQOOA/Ba5ie7KDxHucswA8jedoBT0CoHhtggBvxFwF+mYzLauaASxE6g3U3wLfwlwL+3Dquw3DA6xGqwToZ4Dr8ywH/To0LDQeqew5hqwyo3DuBbs8UFwoOOBehc3poDPAvN9tTQXHecMCDELqKjTXAX/GXMOPb1sp4wQGPQqgBG2IIvsJfDPipBZbfhAOeSpyKRx9D8JEDv/UBm3DACwk6jnU1BPWez2XG333BgXDAOwjY5iFWS8wawC0esW1C2i070C5utosMsT/4N2pfDgtNxreBA9amr//vNEPwB/75gBXb4fEfDng4KpexMYbaB/yzAd/rMNXd+A8OWO/uTUzbYtB4hnMm4BfZgnV/En6fn/MNwbsO3GZzyCaJBLMuQ+C8IXKS2VrdSeg8BD+thyfgzirAlaGVPW4QvIm4YRliKwGrGYxlCK6NoGca9eeAR8ZCdaKCZ6pM9cBL4oY3A0i3W2lFJpPAk7gS0MyvI16QAfCRv2tvzrqgpNMXfB2O/QGz005VRgJqJCIdgvdHURUr3UOXhKn5W0YCgW1R2MySFW4LN+72uHktCRzwiPMKScJ1VZWb43FXZEWn9a6mxl/L6pNALSuw2iPRwJDU/Vy/69RgpYfwRWLmkcRPj9i0IWkbSB7CCqJ3eYiqPdarqJoQemTsXklgCWrHsM6G6mP8+uR9F5Ye2Dq7M5ULiPYwhJvwTycBVUvv4dO3j0NNBWagofoa/wwSULfjNUy4VFiBoVxuYCMM1U/41WapMzKHF9wl0I/rFcxqt7zLsTfcJdCNq16xImNaXuU4FNwloMMAvQVWT6c+QeX4YKZEQ8OTQiE+p/aSwOZ0CXQY7lahnKsqonU0cpSY8tTvuazgLgG1WjqtsA6F2pXjrOEugYnuTVBvEDTalONI4C4BHQCqGKkmBI0HLP8kBUQGdwmoCqoWjDcS0Kd1TaRwl0Avrjpj1+F+ptEAvCByeJLGq6gnfEUGeh3wxbHB3SpUc92UksAXfs8H3hgr3CWwgKvOdrQpqU2rAKwjs5y/KWQqYFRmBAsAAAAASUVORK5CYII="
                                    draggable="false"></uni-image>
                            <uni-view class="bold text-[32rpx] text-[#fff]">Product details</uni-view>
                            <uni-view></uni-view>
                        </uni-view><!-- </Sticky> -->
                        <uni-view class="w-[100%] px-[32rpx] mx-auto text-[#fff]">
                            <uni-view class="flex items-center justify-center">
                                <uni-image class="block w-[100%]" style="height: 242px;">
                                    <div style="background-image: url({{asset($package->photo)}}); background-size: 100% 100%;"></div>
                                    <uni-resize-sensor>
                                        <div>
                                            <div></div>
                                        </div>
                                        <div>
                                            <div></div>
                                        </div>
                                    </uni-resize-sensor>
                                    <img src="{{asset($package->photo)}}"
                                         draggable="false"></uni-image>
                            </uni-view>
                            <uni-view class="mx-auto w-[100%] py-[16rpx]">
                                <uni-view
                                    class="w-[100%] bg-[#031f38] text-[#fff] p-[48rpx] rounded-[38rpx] mt-[48rpx]">
                                    <uni-view
                                        class="flex items-center justify-start text-[36rpx] font-bold text-[#02d9f7]">
                                        {{$package->name}}
                                    </uni-view>
                                    <uni-view class="flex items-center justify-between mt-[32rpx]">
                                        <uni-view class="text-[26rpx]">gross profit</uni-view>
                                        <uni-view class="text-[32rpx] text-[#02d9f7]">{{price($package->commission_with_avg_amount)}}</uni-view>
                                    </uni-view>
                                    <uni-view class="flex items-center justify-between mt-[18rpx]">
                                        <uni-view class="text-[26rpx]">daily profit</uni-view>
                                        <uni-view class="text-[32rpx] text-[#02d9f7]">{{price($package->commission_with_avg_amount / $package->validity)}}</uni-view>
                                    </uni-view>
                                    <uni-view class="flex items-center justify-between mt-[18rpx]">
                                        <uni-view class="text-[26rpx]">Serving time</uni-view>
                                        <uni-view class="text-[32rpx] text-[#02d9f7]">{{$package->validity}}দিন</uni-view>
                                    </uni-view>
                                    <uni-view class="flex items-center justify-between mt-[18rpx]">
                                        <uni-view class="text-[26rpx]">Rebate period</uni-view>
                                        <uni-view class="text-[32rpx] text-[#02d9f7]"><span>24H</span><!--v-if-->
                                        </uni-view>
                                    </uni-view>
                                </uni-view>
                                <uni-view
                                    class="w-[100%] bg-[#031f38] text-[#fff] p-[48rpx] rounded-[38rpx] mt-[48rpx]">
                                    <uni-view class="flex items-center justify-between w-[100%]">
                                        <uni-view class="text-[#fff] text-[32rpx]">Price</uni-view>
                                        <uni-view><!--v-if--><span class="text-[#fff] text-[36rpx] font-bold"> &nbsp;&nbsp;{{price($package->price)}}</span>
                                        </uni-view>
                                    </uni-view>
                                </uni-view>
                                @if(!$myPackage)
                                <uni-view
                                    class="w-[100%] bg-[#031f38] text-[#fff] p-[48rpx] rounded-[38rpx] mt-[48rpx]">
                                    <uni-view class="flex items-center justify-between w-[100%]">

                                        <uni-view
                                            onclick="buyPackage()"
                                            class="text-black text-[28rpx] w-[50%] flex items-center justify-end h-[68rpx]">
                                            <uni-view class="flex items-center justify-end bg-[#031f38] w-[100%]">
                                                <uni-view
                                                    class="w-[100%] h-[68rpx] flex items-center justify-center bg-[#02d9f7] text-white text-[40rpx] rounded-[42rpx]">
                                                    Buy now
                                                </uni-view>
                                            </uni-view>
                                        </uni-view>
                                    </uni-view>
                                </uni-view>
                                @endif
{{--                                <uni-view--}}
{{--                                    class="w-[100%] bg-[#031f38] text-[#fff] p-[48rpx] rounded-[38rpx] mt-[48rpx]">--}}
{{--                                    <uni-rich-text class="normal">--}}
{{--                                        <div><p>ভাগ্যবান ফুটবলে একবার অংশগ্রহণ করুন</p>--}}
{{--                                            <p>জয়ের হার 100%</p>--}}
{{--                                            <p><br></p></div>--}}
{{--                                    </uni-rich-text>--}}
{{--                                </uni-view>--}}
                            </uni-view>
                        </uni-view>
                        <uni-view data-v-713ede17="" class="customToast z-50"><!--v-if--></uni-view>
                    </uni-view>
                </uni-page-body>
            </uni-page-wrapper>
        </uni-page>
    </uni-app>
</div>
<div id="all-component-box" data-v-app="">
    <div class="van-back-top__placeholder"></div>
</div>

<div class="van-back-top" style="right: 10px; bottom: 100px;"><i
        class="van-badge__wrapper van-icon van-icon-back-top van-back-top__icon"></i></div>
<div id="u-a-t" data-v-app="">
    <uni-toast data-duration="100000000" class="loadinf" style="display: none;">
        <div class="uni-toast"><i class="uni-toast__icon uni-loading"></i>
            <p class="uni-toast__content">Loading...</p></div>
    </uni-toast>
</div>
@include('alert-message')
<script>
    function buyPackage(){
        document.querySelector('.loadinf').style.display = 'block';
        window.location.href='{{url('purchase/confirmation')}}'+"/"+'{{$package->id}}';
    }
</script>
</body>
</html>
