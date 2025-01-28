<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>{{env('APP_NAME')}}</title>
    <link rel="stylesheet" href="{{asset('public')}}/static/plugin/bootstrap-4.6.2/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('public')}}/static/plugin/layer/theme/default/layer.css?2">
    <link rel="stylesheet" href="{{asset('public')}}/static/styles/common.css?3">
    <script src="{{asset('public')}}/static/plugin/jquery-3.5.1.min.js"></script>
    <script src="{{asset('public')}}/static/plugin/bootstrap-4.6.2/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('public')}}/static/plugin/layer/layer.js"></script>
    <link rel="stylesheet" href="{{asset('public')}}/static/plugin/layer/theme/default/layer.css?v=3.5.1" id="layuicss-layer">
    <script src="{{asset('public')}}/static/js/main.js?2"></script>
</head>
<body>

<link rel="stylesheet" href="{{asset('public')}}/pageCss/quantify.css">
<link rel="stylesheet" href="{{asset('public')}}/static/plugin/swiper7/swiper-bundle.min.css">
<script src="{{asset('public')}}/static/plugin/swiper7/swiper-bundle.min.js"></script>
<style>
    a.buyBtn {
        background: linear-gradient(90deg, #3566dc, #9b0fd1);
        padding: 11px 0;
        width: 90%;
        display: block;
        margin: auto;
        border-radius: 5px;
        text-align: center;
        color: #fff
    }
    .center-panel .main {
        background: linear-gradient(rgb(0 0 0 / 28%), rgb(61 61 61 / 61%)), url("{{asset('public/bg.jpg')}}");
        background-attachment: fixed;
        background-size: cover;
    }
    .hkt-stc {
        background: #1dcbff33;
    }
    .hkt-stc-item > div {
        color: #fff;
    }
</style>

<!-- CENTER PANEL -->
<div class="center-panel" style="padding: 0">

    <div id="main" class="main page-main">

        <div class="hkt-top">
            <img src="{{asset(setting('photo'))}}" style="border-radius: 50px;">
            <div>Products</div>
            <span onclick="window.location.href='{{route('ordered')}}'">My Product</span>
        </div>

         @foreach(\App\Models\Package::where('status', 'active')->where('validity', 2)->get() as $element)
         <?php
            $my = \App\Models\Purchase::where('user_id', user()->id)->where('package_id', $element->id)->where('status', 'active')->first();
            ?>
            <div class="hkt-stc" style="padding-top: 0;overflow: hidden;">
                <div style="margin-bottom: 15px;height: 200px;width: 100%;">
                    <img style="width: 100%;height: 200px;" src="{{asset($element->photo)}}" alt="">
                </div>
                <div class="hkt-stc-item">
                    <div>Actual Price</div>
                    <span>{{price($element->price)}}</span>
                </div>
                <div class="hkt-stc-item" style="border-left: 1px solid #fff;">
                    <div>Daily income</div>
                    <span>{{price($element->commission_with_avg_amount / $element->validity)}}</span>
                </div>
                <div class="hkt-stc-item">
                    <div>Quantification times</div>
                    <span>{{$element->validity}}</span>
                </div>
                <div class="hkt-stc-item" style="border-left: 1px solid #fff;">
                    <div>Total income</div>
                    <span>{{price($element->commission_with_avg_amount)}}</span>
                </div>
                @if($my)
                <div class="" style="border-left: 1px solid #fff;width: 100%;">
                    <a href="javascript:void(0)" style="text-decoration: none;" class="buyBtn">Already Buy</a>
                </div>
                @else
                <div class="" style="border-left: 1px solid #fff;width: 100%;">
                    <a href="javascript:void(0)" onclick="BuyConfirm('{{$element->id}}')" style="text-decoration: none;" class="buyBtn">Buy Confirm</a>
                </div>
                @endif
            </div>
        @endforeach

        @foreach(\App\Models\Package::where('status', 'active')->where('validity', '!=', 2)->get() as $element)
         <?php
            $my = \App\Models\Purchase::where('user_id', user()->id)->where('package_id', $element->id)->where('status', 'active')->first();
            ?>
            <div class="hkt-stc" style="padding-top: 0;overflow: hidden;">
                <div style="margin-bottom: 15px;height: 200px;width: 100%;">
                    <img style="width: 100%;height: 200px;" src="{{asset($element->photo)}}" alt="">
                </div>
                <div class="hkt-stc-item">
                    <div>Actual Price</div>
                    <span>{{price($element->price)}}</span>
                </div>
                <div class="hkt-stc-item" style="border-left: 1px solid #fff;">
                    <div>Daily income</div>
                    <span>{{price($element->commission_with_avg_amount / $element->validity)}}</span>
                </div>
                <div class="hkt-stc-item">
                    <div>Quantification times</div>
                    <span>{{$element->validity}}</span>
                </div>
                <div class="hkt-stc-item" style="border-left: 1px solid #fff;">
                    <div>Total income</div>
                    <span>{{price($element->commission_with_avg_amount)}}</span>
                </div>
                @if($my)
                <div class="" style="border-left: 1px solid #fff;width: 100%;">
                    <a href="javascript:void(0)" style="text-decoration: none;" class="buyBtn">Already Buy</a>
                </div>
                @else
                <div class="" style="border-left: 1px solid #fff;width: 100%;">
                    <a href="javascript:void(0)" onclick="BuyConfirm('{{$element->id}}')" style="text-decoration: none;" class="buyBtn">Buy Confirm</a>
                </div>
                @endif
            </div>
        @endforeach
    </div>
    <!--CONTENT END-->

    <!-- Bottom tabBar -->
  @include('app.layout.manu')
@include('alert-message')
</div>

<script>
    function BuyConfirm(id){
        layer.load(2);
        window.location.href='{{url('purchase/confirmation')}}'+'/'+id
    }
</script>
</body>
</html>
