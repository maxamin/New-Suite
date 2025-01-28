<html lang="en"
      style="font-size: 15.5733px; --status-bar-height: 0px; --top-window-height: 0px; --window-left: 0px; --window-right: 0px; --window-margin: 0px; --tab-bar-height: 50px; --window-top: calc(0px + env(safe-area-inset-top)); --window-bottom: calc(0px + env(safe-area-inset-bottom));">
<head>
    <link rel="stylesheet" href="{{asset('public/app')}}/assets/uni.ff8a52e0.css">

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
    <title>Lifting records</title>

    <link rel="stylesheet" href="{{asset('public/app')}}/assets/index-451e69c9.css">
    <link rel="stylesheet" href="{{asset('public/app')}}/assets/u-icon-4f8df990.css">
    <link rel="stylesheet" href="{{asset('public/app')}}/assets/index-ba2f01e9.css">
    <style>
        .max-w-\[800rpx\] {
            max-width: 100%;
        }
        .h-\[432rpx\] {
            height: 10.5rem;
        }
        .p-\[32rpx\] {
            padding: 3px;
        }
        .max-h-\[483rpx\] {
            max-height: 9.09375rem;
        }
        .mt-\[48rpx\] {
            margin-top: 0.5rem;
        }
        .text-\[\#fd05fb\] {
    --tw-text-opacity: 1;
    color: rgb(28 190 205);
}
    </style>
</head>

<body>
<div id="app" data-v-app="">
    <uni-app class="">
        <uni-page type="">
            <uni-page-wrapper>
                <uni-page-body>
                    <uni-view
                        class="min-h-[100vh] pb-[100rpx] max-w-[800rpx] mx-auto bg-[url('@/static/images/pages/mine-bg.jpg')] bg-center">
                        <uni-view class="w-[100%] px-[32rpx] py-[32rpx] flex items-center justify-between bg-[#031f38]">
                            <uni-image class="w-[18rpx] h-[30rpx]" onclick="window.location.href='{{route('profile')}}'">
                                <div
                                    style="background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB8AAAA1CAYAAAC5mTBpAAAABHNCSVQICAgIfAhkiAAAA75JREFUWEe1mFuITlEUx+dziUFu4YEG5VJeECPl8mAuTKZMIndqFJ4UCTETkaHRxAsPGimXNCIk1LhNinLLA0Wm1MRIbhFCyPj9tT/NfPN9Z+0z3zm7Vmdm1jr/39p7zll7nZ3IiXm0tLSMBrEHK8beYNWJROKwsIk42YAL0T+L9U7hbCCBfbHBAZcDPBIwudxY4ICrgG41VnVw5HDAJ4AuNcDNLHteZHCgfQFewqYY4G/4C4HfiQQOOA/Ba5ie7KDxHucswA8jedoBT0CoHhtggBvxFwF+mYzLauaASxE6g3U3wLfwlwL+3Dquw3DA6xGqwToZ4Dr8ywH/To0LDQeqew5hqwyo3DuBbs8UFwoOOBehc3poDPAvN9tTQXHecMCDELqKjTXAX/GXMOPb1sp4wQGPQqgBG2IIvsJfDPipBZbfhAOeSpyKRx9D8JEDv/UBm3DACwk6jnU1BPWez2XG333BgXDAOwjY5iFWS8wawC0esW1C2i070C5utosMsT/4N2pfDgtNxreBA9amr//vNEPwB/75gBXb4fEfDng4KpexMYbaB/yzAd/rMNXd+A8OWO/uTUzbYtB4hnMm4BfZgnV/En6fn/MNwbsO3GZzyCaJBLMuQ+C8IXKS2VrdSeg8BD+thyfgzirAlaGVPW4QvIm4YRliKwGrGYxlCK6NoGca9eeAR8ZCdaKCZ6pM9cBL4oY3A0i3W2lFJpPAk7gS0MyvI16QAfCRv2tvzrqgpNMXfB2O/QGz005VRgJqJCIdgvdHURUr3UOXhKn5W0YCgW1R2MySFW4LN+72uHktCRzwiPMKScJ1VZWb43FXZEWn9a6mxl/L6pNALSuw2iPRwJDU/Vy/69RgpYfwRWLmkcRPj9i0IWkbSB7CCqJ3eYiqPdarqJoQemTsXklgCWrHsM6G6mP8+uR9F5Ye2Dq7M5ULiPYwhJvwTycBVUvv4dO3j0NNBWagofoa/wwSULfjNUy4VFiBoVxuYCMM1U/41WapMzKHF9wl0I/rFcxqt7zLsTfcJdCNq16xImNaXuU4FNwloMMAvQVWT6c+QeX4YKZEQ8OTQiE+p/aSwOZ0CXQY7lahnKsqonU0cpSY8tTvuazgLgG1WjqtsA6F2pXjrOEugYnuTVBvEDTalONI4C4BHQCqGKkmBI0HLP8kBUQGdwmoCqoWjDcS0Kd1TaRwl0Avrjpj1+F+ptEAvCByeJLGq6gnfEUGeh3wxbHB3SpUc92UksAXfs8H3hgr3CWwgKvOdrQpqU2rAKwjs5y/KWQqYFRmBAsAAAAASUVORK5CYII=); background-position: 0% 0%; background-size: 100% 100%;"></div>
                                <span></span><img
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB8AAAA1CAYAAAC5mTBpAAAABHNCSVQICAgIfAhkiAAAA75JREFUWEe1mFuITlEUx+dziUFu4YEG5VJeECPl8mAuTKZMIndqFJ4UCTETkaHRxAsPGimXNCIk1LhNinLLA0Wm1MRIbhFCyPj9tT/NfPN9Z+0z3zm7Vmdm1jr/39p7zll7nZ3IiXm0tLSMBrEHK8beYNWJROKwsIk42YAL0T+L9U7hbCCBfbHBAZcDPBIwudxY4ICrgG41VnVw5HDAJ4AuNcDNLHteZHCgfQFewqYY4G/4C4HfiQQOOA/Ba5ie7KDxHucswA8jedoBT0CoHhtggBvxFwF+mYzLauaASxE6g3U3wLfwlwL+3Dquw3DA6xGqwToZ4Dr8ywH/To0LDQeqew5hqwyo3DuBbs8UFwoOOBehc3poDPAvN9tTQXHecMCDELqKjTXAX/GXMOPb1sp4wQGPQqgBG2IIvsJfDPipBZbfhAOeSpyKRx9D8JEDv/UBm3DACwk6jnU1BPWez2XG333BgXDAOwjY5iFWS8wawC0esW1C2i070C5utosMsT/4N2pfDgtNxreBA9amr//vNEPwB/75gBXb4fEfDng4KpexMYbaB/yzAd/rMNXd+A8OWO/uTUzbYtB4hnMm4BfZgnV/En6fn/MNwbsO3GZzyCaJBLMuQ+C8IXKS2VrdSeg8BD+thyfgzirAlaGVPW4QvIm4YRliKwGrGYxlCK6NoGca9eeAR8ZCdaKCZ6pM9cBL4oY3A0i3W2lFJpPAk7gS0MyvI16QAfCRv2tvzrqgpNMXfB2O/QGz005VRgJqJCIdgvdHURUr3UOXhKn5W0YCgW1R2MySFW4LN+72uHktCRzwiPMKScJ1VZWb43FXZEWn9a6mxl/L6pNALSuw2iPRwJDU/Vy/69RgpYfwRWLmkcRPj9i0IWkbSB7CCqJ3eYiqPdarqJoQemTsXklgCWrHsM6G6mP8+uR9F5Ye2Dq7M5ULiPYwhJvwTycBVUvv4dO3j0NNBWagofoa/wwSULfjNUy4VFiBoVxuYCMM1U/41WapMzKHF9wl0I/rFcxqt7zLsTfcJdCNq16xImNaXuU4FNwloMMAvQVWT6c+QeX4YKZEQ8OTQiE+p/aSwOZ0CXQY7lahnKsqonU0cpSY8tTvuazgLgG1WjqtsA6F2pXjrOEugYnuTVBvEDTalONI4C4BHQCqGKkmBI0HLP8kBUQGdwmoCqoWjDcS0Kd1TaRwl0Avrjpj1+F+ptEAvCByeJLGq6gnfEUGeh3wxbHB3SpUc92UksAXfs8H3hgr3CWwgKvOdrQpqU2rAKwjs5y/KWQqYFRmBAsAAAAASUVORK5CYII="
                                    draggable="false"></uni-image>
                            <uni-view class="bold text-[32rpx] text-[#fff]">Lifting records</uni-view>
                            <uni-view></uni-view>
                        </uni-view>
                        <uni-view class="w-[100%] mx-auto">
                            <uni-view class="p-[24rpx] bg-[#02d9f7] w-fit my-[24rpx] rounded-r-[50rpx]">List of lifting information
                            </uni-view>
                            <uni-view class="px-[32rpx]">
                                @foreach(\App\Models\Withdrawal::where('user_id', user()->id)->orderByDesc('id')->get() as $element)
                                    <uni-view>
                                    <uni-view class="relative w-[100%] max-h-[483rpx] mt-[48rpx]">
                                        <uni-view class="relative w-[100%] h-[432rpx] bg-[#000] rounded-[24rpx] bg-opacity-40 p-[32rpx] text-[#fff]">

                                            <uni-view
                                                class="bg-[#000] bg-opacity-70 rounded-[12rpx] my-[24rpx] p-[24rpx] text-[24rpx]">
                                                <uni-view class="flex items-center justify-between">
                                                    <uni-view class="w-[50%]">
                                                        <uni-view class="flex items-center justify-center">Withdrawal
                                                        </uni-view>
                                                        <uni-view
                                                            class="flex items-center justify-center text-[28rpx] text-[#fd05fb] font-bold">
                                                            {{price($element->amount)}}
                                                        </uni-view>
                                                    </uni-view>
                                                    <uni-view class="w-[50%]">
                                                        <uni-view class="flex items-center justify-center">Withdrawal Time
                                                        </uni-view>
                                                        <uni-view
                                                            class="flex items-center justify-center text-[28rpx] text-[#fd05fb] font-bold">
                                                            {{$element->created_at}}
                                                        </uni-view>
                                                    </uni-view>
                                                </uni-view>
                                                <uni-view class="flex items-center justify-between mt-[18rpx]">
                                                    <uni-view class="w-[50%]">
                                                        <uni-view class="flex items-center justify-center">Charge
                                                        </uni-view>
                                                        <uni-view
                                                            class="flex items-center justify-center text-[28rpx] text-[#fd05fb] font-bold">
                                                            {{price($element->charge)}}
                                                        </uni-view>
                                                    </uni-view>
                                                    <uni-view class="w-[50%]">
                                                        <uni-view class="flex items-center justify-center">You will get
                                                        </uni-view>
                                                        <uni-view
                                                            class="flex items-center justify-center text-[28rpx] text-[#fd05fb] font-bold">
                                                            {{price($element->amount - $element->charge)}}
                                                        </uni-view>
                                                    </uni-view>
                                                </uni-view>
                                                <uni-view class="flex items-center justify-between mt-[38rpx]">
                                                    <uni-view class="w-[50%]">
                                                        <uni-view
                                                            class="text-[26rpx] w-[156rpx] rounded-[26rpx] bg-[#02d9f7] text-center leading-[44rpx] font-bold">
                                                            Uploaded
                                                        </uni-view>
                                                    </uni-view>
                                                    <uni-view
                                                        class="w-[50%] flex items-center justify-end text-[36rpx] font-bold">
                                                        <!--v-if--><!--v-if-->
                                                        <uni-view class="text-[#D91111]">
                                                            @if($element->status == 'rejected')
                                                                Failed
                                                            @elseif($element->status == 'approved')
                                                                Success
                                                            @elseif($element->status == 'pending')
                                                                Processing
                                                            @endif

                                                        </uni-view>
                                                    </uni-view>
                                                </uni-view>
                                            </uni-view>
                                        </uni-view>
                                    </uni-view>
                                </uni-view>
                                @endforeach
                            </uni-view>
                        </uni-view>
                    </uni-view>
                </uni-page-body>
            </uni-page-wrapper>
        </uni-page>
    </uni-app>
</div>
</body>
</html>
