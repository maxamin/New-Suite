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
        background: #fff;
        padding: 11px 0;
        width: 90%;
        display: block;
        margin: auto;
        border-radius: 5px;
        text-align: center;
        color: #1dcbff;
    }
</style>
<!-- CENTER PANEL -->
<div class="center-panel" style="padding: 0">

    <div id="main" class="main page-main">

        <div class="hkt-top">
            <img onclick="window.location.href='{{route('dashboard')}}'" src="https://img.icons8.com/external-inkubators-detailed-outline-inkubators/50/external-left-chevron-arrows-inkubators-detailed-outline-inkubators.png">
            <div>My Ordered</div>
            <span>{{price(user()->balance)}}</span>
        </div>

        <div class="hkt-stc">
            <div class="hkt-stc-item">
                <div>Total Product</div>
                <span>{{\App\Models\Purchase::where('user_id', user()->id)->count()}}</span>
            </div>
            <div class="hkt-stc-item" style="border-left: 1px solid #fff;">
                <div>Daily income</div>
                <span>{{price(\App\Models\Purchase::where('user_id', user()->id)->sum('daily_income'))}}</span>
            </div>
        </div>

        <div class="hkt-kuy task-start" onclick="startTrade()">
            Click to start quantitative product
        </div>

        <div class="itp-step-tonint task-info" style="display: none">

            <div class="itp-step-tonint-title">
                <img src="{{asset(setting('photo'))}}" style="border-radius: 50px;">
                <span>Debit running panel process</span>
            </div>

        </div>

        <div class="hkt-top">
            <img src="{{asset('public')}}/static/images/logo.png?2">
            <div>Vip Level</div>
        </div>

        @foreach(\App\Models\Package::whereIn('id', my_active_vips())->get() as $element)
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
                <div class="" style="border-left: 1px solid #fff;width: 100%;">
                    <a href="javascript:void(0)" onclick="BuyConfirm('{{$element->id}}')" style="text-decoration: none;" class="buyBtn">Buy Confirm</a>
                </div>
            </div>
        @endforeach
    </div>
    <!--CONTENT END-->
@include('alert-message')
    <script>
        $(function () {
            var mySwiper = new Swiper('.swiper', {
                initialSlide: parseInt('1') - 1,
                slidesPerView: 1.5,
                spaceBetween: 10,
                on: {
                    slideChange: function () {
                        let slide = this.slides[this.activeIndex];
                        showVipInfo($(slide).data('index'));
                    }
                }
            });

            $('.vip-image').click(function () {
                showVipInfo($(this).data('index'));
            });

            showVipInfo('1');
        });

        function showVipInfo(index) {
            $('.vip-info').each(function () {
                let i = $(this).data('index');

                if (i == index)
                    $(this).show();
                else
                    $(this).hide();
            });
        }

        var step_delay = 500;

        var infoList = [
            {text: "Starting product calculation", delay: 0},
            {text: "Starting queuing...", delay: step_delay},
            {text: "Start product price calculation", delay: step_delay},
            {text: "Start daily income calculation", delay: step_delay},
            {text: "Start balance adding your account", delay: step_delay},
            {text: "Start commission added successful", delay: step_delay}
        ];

        var step = 0;

        function startTrade() {

            var uBalance = '{{user()->receive_able_amount}}';
            if (uBalance < 1)
                return message('Not over 24 hour yet')

            layer.load(2);

            $('.task-start').hide();
            $('.task-info').show();

            let total_delay = 0;

            for (let i = 0; i < infoList.length; i++) {
                total_delay += infoList[i].delay;

                setTimeout(function () {
                    $('.task-info').append('<div class="itp-step-tonint-item">' + infoList[step].text + '</div>');
                    step++;
                }, total_delay);
            }

            setTimeout(function () {
                // layer.closeAll('loading');
                window.location.href='{{route('user.received.amount')}}';

            }, total_delay + step_delay);



            // $.post('/trade/start', function (r) {
            //     layer.closeAll('loading');
            //
            //     if (r.code != 1)
            //         return error(r.msg);
            //
            //     $('.task-start').hide();
            //     $('.task-info').show();
            //
            //     let total_delay = 0;
            //
            //     for (let i = 0; i < infoList.length; i++) {
            //         total_delay += infoList[i].delay;
            //
            //         setTimeout(function () {
            //             $('.task-info').append('<div class="itp-step-tonint-item">' + infoList[step].text + '</div>');
            //             step++;
            //         }, total_delay);
            //     }
            //
            //     setTimeout(function () {
            //         location.reload();
            //     }, total_delay + step_delay);
            // });
        }
    </script>
</div>
</body>
</html>
