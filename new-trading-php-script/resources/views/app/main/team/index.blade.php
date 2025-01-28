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

<link rel="stylesheet" href="{{asset('public')}}/pageCss/teamStatistics.css">
<style>
    .center-panel .main {
        background: linear-gradient(rgb(0 0 0 / 28%), rgb(61 61 61 / 61%)), url("{{asset('public/bg.jpg')}}");
        background-attachment: fixed;
        background-size: cover;
    }
    .tsa-box {
        background: #1dcbff33;
    }
    .team-wrap {
        background: #1dcbff33;
    }
    video {
    width: 100%;
    border-radius: 12px;
}
h4.sgcv {
    color: #fff;
    font-weight: bold;
    font-size: 18px;
    margin-bottom: 10px;
    margin-top: 27px;
}
</style>
<!-- CENTER PANEL -->
<div class="center-panel">

    <div class="top">
        <div class="title">My team</div>
        <div style="margin-right: 20px"> Information of team</div>
    </div>

    <div id="main" class="main page-main">

        <div class="tsa-box team-wrap">
            <div class="tsa-box-title">
                <h5>Team data overview</h5>
                <div class="date-select J_dateSelect">
                    All
                </div>
                <input type="hidden" value="0">
            </div>
            <div class="tsa-ng-dl">
                <div class="tsa-ng-dd">
                    <div>Team registration</div>
                    <span>{{$team_size}}</span>
                </div>
                <div class="tsa-ng-dd">
                    <div>Team commission</div>
                    <span>{{price($levelTotalCommission1 + $levelTotalCommission2 + $levelTotalCommission3)}}</span>
                </div>
            </div>

            <div class="tsa-ng-dl">
                <div class="tsa-ng-dd">
                    <div>Team recharge</div>
                    <span>{{price($lvTotalDeposit)}}</span>
                </div>
                <div class="tsa-ng-dd">
                    <div>Team withdrawal</div>
                    <span>{{price($lvTotalWithdraw)}}</span>
                </div>
            </div>
        </div>

        <div class="tsa-box">
            <div class="tsa-box-title">
                <h5>Three levels' team data</h5>
                <div class="date-select J_dateSelect">
                    All
                </div>
                <input type="hidden" value="0">
            </div>
            <div class="sds-tt">LV 1</div>
            <div class="sds-dl">
                <div class="sds-ng-dd">
                    <span>{{$first_level_users->count()}}/{{$first_level_users->where('investor', '1')->count()}}</span>
                    <div>Register/Valid</div>
                </div>
                <div class="sds-ng-dd">
                    <span>{{$rebate->interest_commission1}}%</span>
                    <div>Commission percentage</div>
                </div>
                <div class="sds-ng-dd">
                    <span>{{price($lv1Recharge)}}</span>
                    <div>Team Invest</div>
                </div>
            </div>
            <div class="sds-tt">LV 2</div>
            <div class="sds-dl">
                <div class="sds-ng-dd">
                    <span>{{$second_level_users->count()}}/{{$second_level_users->where('investor', '1')->count()}}</span>
                    <div>Register/Valid</div>
                </div>
                <div class="sds-ng-dd">
                    <span>{{$rebate->interest_commission2}}%</span>
                    <div>Commission percentage</div>
                </div>
                <div class="sds-ng-dd">
                    <span>{{price($lv2Recharge)}}</span>
                    <div>Team Invest</div>
                </div>
            </div>
            <div class="sds-tt">LV 3</div>
            <div class="sds-dl">
                <div class="sds-ng-dd">
                    <span>{{$third_level_users->count()}}/{{$third_level_users->where('investor', '1')->count()}}</span>
                    <div>Register/Valid</div>
                </div>
                <div class="sds-ng-dd">
                    <span>{{$rebate->interest_commission3}}%</span>
                    <div>Commission percentage</div>
                </div>
                <div class="sds-ng-dd">
                    <span>{{price($lv3Recharge)}}</span>
                    <div>Team Invest</div>
                </div>
            </div>
        </div>
        
        <h4 class="sgcv">Why pfizer is the best</h4>
        <video controls>
          <source src="{{asset('public/v.mp4')}}" type="video/mp4">
          Error Message
        </video>

    </div>
    
    
    <!--CONTENT END-->
    <div id="date-select-modal" class="date-select-modal">
        <div class="date-select-options">
            <div class="date-select-option J_dateSelectOption" data-value="0">All</div>
            <div class="date-select-option J_dateSelectOption" data-value="1">Today</div>
            <div class="date-select-option J_dateSelectOption" data-value="7">Last 7 days</div>
            <div class="date-select-option J_dateSelectOption" data-value="30">Last 30 days</div>
            <div class="date-select-option J_dateSelectOption" data-value="60">Last 60 days</div>
        </div>
    </div>
    

    <div class="teammore-modal" id="teammore-modal" style="display: none;">
        <div class="teammore-modal-inbox"></div>
    </div>
@include('alert-message')
    <script>
        function doCopy(content) {
            if (copyContent(content))
                message("Copy successfully");
            else
                message("Copy failed");
        }

        $(function () {
            $('.team-item-more').on('click', function () {
                load_level($(this).attr('level'));
            });
        });

        var team_names = [
            null,
            "Team A",
            "Team B",
            "Team C"
        ];

        function load_level(level) {
            level = parseInt(level);

            layer.load(2);

            setTimeout(function(){
                layer.closeAll('loading');
                message('Loaded')
            }, 500)
        }
    </script>

    <script>
        var DateSelectValueContent = null;
        var DateSelectModalIndex = null;

        function showDateSelectModal(obj) {
            DateSelectModalIndex = layer.open({
                type: 1,
                closeBtn: 0,
                content: $('#date-select-modal'),
                shade: [0.3, '#000'],
                shadeClose: true,
                title: false,
                resize: false,
                area: '100%',
                offset: 'b',
                anim: 2
            });
            DateSelectValueContent = obj.valueContent
        }

        function closeDateSelectModal() {
            layer.close(DateSelectModalIndex)
        }

        // selected
        $('.J_dateSelectOption').on('click', function () {
            var val = $(this).data('value')
            var str = $(this).text().trim()
            DateSelectValueContent.text(str)
            DateSelectValueContent.next('input').val(val)
            closeDateSelectModal()

            layer.load(2);
            setTimeout(function(){
                layer.closeAll('loading');
                message('Loaded')
            }, 500)
        })

        // click
        $('.J_dateSelect').on('click', function () {
            showDateSelectModal({
                valueContent: $(this)
            })
        })

    </script>


    <style>

        .service {
            display: none;
            position: fixed;
            width: 100%;
            height: 100vh;
            background: #000000a6;
            z-index: 1000;
            top: 0;
        }


        .service-inner {
            display: flex;
            justify-content: space-around;
            align-items: center;
            gap: 8px;
            padding: 16px;
            width: 100%;
            height: 100%;
            max-width: 540px;
        }

        .service-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 8px 4px 0;
            width: 33.33%;
            height: 120px;
            border-radius: 8px;
            background-color: #fff;
        }

        .service-item-icon {
            width: 72px;
        }

        .service-item-title {
            height: 32px;
            line-height: 32px;
            font-size: 14px;
            color: #444;
            text-align: center;
        }
    </style>

    <div id="service-pop" class="service" onclick="document.getElementById('service-pop').style.display='none'">
        <div class="service-inner">
            <a href="https://t.me/" class="service-item">
                <img src="{{asset('public')}}/static/images/service/s-1.png" class="service-item-icon">
                <div class="service-item-title">Telegram</div>
            </a>
        </div>
    </div>

    <!-- Bottom tabBar -->
    @include('app.layout.manu')

    <div id="float_ico"
         style="position: fixed; bottom: 104px; right: 10px; display: flex; justify-content: center; align-items: center; width: 48px; height: 48px;">
        <div style="cursor: pointer;" onclick="document.getElementById('service-pop').style.display='block'">
            <img src="{{asset('public')}}/static/images/cs.png" style="width: 40px;height: 40px;">
        </div>
    </div>


    <script>
        window.addEventListener('load', function () {
            //return;
            var actionDir = 1;
            var dec = 100;
            var sum = 5;
            var num = sum;
            var handel_t = setInterval(function () {
                try {
                    document.getElementById('float_ico').style.bottom = dec + "px";
                } catch (e) {
                }
                ;
                dec += actionDir;
                num += -1;
                if (num <= 0) {
                    actionDir *= -1;
                    num = sum
                }
            }, 100)
        })
    </script>

</div>
<div class="popup-mask"></div>
</body>
</html>
