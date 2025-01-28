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
    <link rel="stylesheet" href="{{asset('public')}}/static/plugin/layer/theme/default/layer.css?v=3.5.1"
          id="layuicss-layer">
    <script src="{{asset('public')}}/static/js/main.js?2"></script>
</head>
<body>

<link rel="stylesheet" href="{{asset('public')}}/pageCss/home.css?12">
<link rel="stylesheet" href="{{asset('public')}}/pageCss/exchange.css?1">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css">
<style>
    .exchange-list {
        padding: 8px 12px 30px;
        background-image: url('{{asset('public')}}/static/images/qiguai-bg2_top.png'), url('{{asset('public')}}/static/images/qiguai-bg2_bottom.png'), url('{{asset('public')}}/static/images/qiguai-bg2_center.png');
        background-repeat: no-repeat;
        background-position: left top, left bottom, left center;
        background-size: 100% 30px, 100% 30px, 100% calc(100% - 60px);
    }

    .data-box .item {
        display: flex;
        align-items: center;
        border-top: 1px solid var(--boxColor);
        padding-left: 28px;
        background: url({{asset('public')}}/static/images/icon/gold.svg) no-repeat left center;
    }
    .item-info-text-b{
        width: 48%;
        margin: auto;
        padding: 5px 5px;
        background: url({{asset('public')}}/static/images/bg-red.png);
        background-size: auto;
        background-size: 100% 100%;
        max-height: 180px;

        height: auto;
        display: flex;
        justify-content: center;
        flex-direction: column;
    }
    .home-msg::before {
        content: '';
        position: absolute;
        top: -2px;
        left: 0;
        width: 38px;
        height: 38px;
        background: url('{{asset('public')}}/static/images/home/icon-global.svg') no-repeat center / 24px;

    }
</style>

<link rel="stylesheet" href="{{asset('public')}}/static/plugin/swiper7/swiper-bundle.min.css">
<script src="{{asset('public')}}/static/plugin/swiper7/swiper-bundle.min.js"></script>
<style>
    video {
        object-fit: fill;
        width: 100%;
        height: 100%;
    }

    .top .title {
        justify-content: flex-start;
        padding: 0 16px;
        flex: 1;
    }

    .swiper-slide img {
        width: 100%;
    }
    .bannerlist {
        height: 140px;
    }

    .swiper-slide img {
        width: 100%;
        height: 198px;
    }
    .home-menu-wrap {
        margin-top: 79px;
    }
    .center-panel .main {
        background: linear-gradient(rgb(0 0 0 / 28%), rgb(61 61 61 / 61%)), url("{{asset('public/bg.jpg')}}");
        background-attachment: fixed;
        background-size: cover;
    }
    .home-menu-item > div {
        color: #fff;
    }
    marquee {
        color: #fff;
    }
    .logos a label {
        color: #fff;
    }
    .home-box{
        background: #1dcbff33;
    }

    .carousel__slide__inner {
  overflow: hidden;
  position: relative;
}
.doAnimation .slick-active .carousel__slide__inner .carousel__image {
  animation: scale-out 0.875s cubic-bezier(0.7, 0, 0.3, 1) 0.375s both;
  transform: scale(1.3);
}
.carousel__slide__overlay {
  background-color: transparent;
  background-size: 100%;
  height: 100%;
  left: 0;
  opacity: 0.5;
  position: absolute;
  top: 0;
  width: 100%;
  z-index: 2;
}
.slick-active .carousel__slide__overlay {
  animation: scale-in-hor-left 1.375s cubic-bezier(0.645, 0.045, 0.355, 1) 0.25s reverse both;
}
.carousel__image {
  height: 100%;
  object-fit: cover;
  position: relative;
  transform: scale(1);
  width: 100%;
  z-index: 1;
}
@keyframes scale-out {
  0% {
    transform: scale(1.3);
  }
  100% {
    transform: scale(1);
  }
}
@keyframes scale-in-hor-left {
  0% {
    -webkit-transform: translateX(-100%) scaleX(0);
    transform: translateX(-100%) scaleX(0);
    -webkit-transform-origin: 0% 0%;
    transform-origin: 0% 0%;
    opacity: 1;
  }
  50% {
    -webkit-transform: translateX(-50%) scaleX(0.5);
    transform: translateX(-50%) scaleX(0.5);
    -webkit-transform-origin: 0% 0%;
    transform-origin: 0% 0%;
    opacity: 1;
  }
  100% {
    -webkit-transform: translateX(0) scaleX(1);
    transform: translateX(0) scaleX(1);
    -webkit-transform-origin: 0% 0%;
    transform-origin: 0% 0%;
    opacity: 1;
  }
}.slick-track {
    height: 200px;
    overflow:hidden;
}.content p {
    padding: 5px 0 !important;
    text-align: justify;
}

</style>
<!-- CENTER PANEL -->
<div class="center-panel">

    <div class="top">
        <div class="title">
            <img style="border-radius: 50px;" src="{{asset(setting('photo'))}}">
            {{env('APP_NAME')}}
        </div>
        <div class="lang" onclick="go('/lang')">
            <img src="{{asset('public')}}/static/images/icon/lang.png">
        </div>
    </div>

    <div id="main" class="main home-main" style="padding-top: 0;">

        <div class="bannerlist" style="margin: 0 -15px 15px;">

           <div class="carousel">

              <div class="carousel__slide">
                <div class="carousel__slide__inner">
                  <img class="carousel__image" src="{{asset('public/11.png')}}" alt="Image">
                </div>
              </div>

              <div class="carousel__slide">
                <div class="carousel__slide__inner">
                  <img class="carousel__image" src="{{asset('public/22.png')}}" alt="Image">
                </div>
              </div>

              <div class="carousel__slide">
                <div class="carousel__slide__inner">
                  <img class="carousel__image" src="{{asset('public/33.png')}}" alt="Image">
                </div>
              </div>

              <div class="carousel__slide">
                <div class="carousel__slide__inner">
                  <img class="carousel__image" src="{{asset('public/44.png')}}" alt="Image">
                </div>
              </div>
            </div>


        </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script>
    // find elements
var carousel = $(".carousel");

var options = {
  adaptiveHeight: true,
  arrows: false,
  dots: false,
  fade: true,
  infinite: false,
  mobileFirst: true,
  rows: 0,
  slidesToScroll: 1,
  slidesToShow: 1,
  speed: 0,
  zIndex: 75,
  autoplay:true,
};

var addAnimationClass = true;

carousel.on('beforeChange', function(e, slick, current, next) {
  var current = carousel.find('.slick-slide')[current];
  var next = carousel.find('.slick-slide')[next];
  var src = $(current).find('.carousel__image').attr('src');

  $(next).find('.carousel__slide__overlay').css('background-image', 'url("' + src + '")');


  if(addAnimationClass) {
    carousel.addClass('doAnimation');

    // so that adding the class only happens once
    addAnimationClass = false;
  }
});

carousel.not('.slick-initialized').slick(options);


</script>

        <div class="home-menu-wrap">
            <div class="home-menu-item" onclick="go('{{route('recharge')}}')">
                <img src="{{asset('public')}}/static/images/home/menu/1.png?1">
                <div>Deposit</div>
            </div>
            <div class="home-menu-item" onclick="go('{{route('user.withdraw')}}')">
                <img src="{{asset('public')}}/static/images/home/menu/2.png?1">
                <div>Withdraw</div>
            </div>

            <div class="home-menu-item" onclick="go('{{route('user.invite')}}')">
                <img src="{{asset('public')}}/static/images/home/menu/33.png?1">
                <div>Invite friends</div>
            </div>
            <div class="home-menu-item" onclick="go('{{route('ordered')}}')">
                <img src="{{asset('public')}}/static/images/home/menu/44.png?1">
                <div>My Product</div>
            </div>                                                               <div class="home-msg">
            <marquee>welcome to {{env('APP_NAME')}}. Long time investment platform</marquee>
        </div>
            <div>                                                                
                
            </div>
            <div>
            </div>
            <div>                                    
            </div>
            <div> 
            </div>
        </div>

        

        <div class="logos">
            
        </div>

        <div class="">
            <div class="">
               
                <label></label>
            </div>

            <div class="" style="">
                <marquee behavior="" direction="up" style="height: 1px;">
                    @for($i=0;$i<100;$i++)
                    
                        
                    </a>
                    @endfor
                </marquee>
            </div>
        </div>

        <div class="home-box">
            <div class="home-box-title">
                <img src="{{asset(setting('photo'))}}" style="border-radius: 50px;">
                <label>Exchange quotation</label>
            </div>
            <div class="data-box">
                <div class="header">
                    <div class="left"><span>Currency/Name</span></div>
                    <div class="center"><span>Current price</span></div>
                    <div class="right"><span>24h %</span></div>
                </div>
                <div class="data-list">
                    <div class="item">
                        <div class="left">
                            <div class="info">
                                <div class="name">
                                    <b>ARB</b>
                                    <span>/USDT</span>
                                </div>
                            </div>
                        </div>
                        <div class="center">
                            <b>0.55750</b>
                        </div>
                        <div class="right">
                            <div class="label label-increase">+4.38%</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="left">
                            <div class="info">
                                <div class="name">
                                    <b>ATOM</b>
                                    <span>/USDT</span>
                                </div>
                            </div>
                        </div>
                        <div class="center">
                            <b>4.78300</b>
                        </div>
                        <div class="right">
                            <div class="label label-increase">+0.46%</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="left">
                            <div class="info">
                                <div class="name">
                                    <b>BNB</b>
                                    <span>/USDT</span>
                                </div>
                            </div>
                        </div>
                        <div class="center">
                            <b>568.800</b>
                        </div>
                        <div class="right">
                            <div class="label label-decrease">-0.18%</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="left">
                            <div class="info">
                                <div class="name">
                                    <b>BTC</b>
                                    <span>/USDT</span>
                                </div>
                            </div>
                        </div>
                        <div class="center">
                            <b>61,045.7</b>
                        </div>
                        <div class="right">
                            <div class="label label-increase">+3.11%</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="left">
                            <div class="info">
                                <div class="name">
                                    <b>DOGE</b>
                                    <span>/USDT</span>
                                </div>
                            </div>
                        </div>
                        <div class="center">
                            <b>0.10668</b>
                        </div>
                        <div class="right">
                            <div class="label label-increase">+3.03%</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="left">
                            <div class="info">
                                <div class="name">
                                    <b>ETH</b>
                                    <span>/USDT</span>
                                </div>
                            </div>
                        </div>
                        <div class="center">
                            <b>2,626.58</b>
                        </div>
                        <div class="right">
                            <div class="label label-increase">+1.89%</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="left">
                            <div class="info">
                                <div class="name">
                                    <b>LTC</b>
                                    <span>/USDT</span>
                                </div>
                            </div>
                        </div>
                        <div class="center">
                            <b>64.1100</b>
                        </div>
                        <div class="right">
                            <div class="label label-decrease">-0.34%</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="left">
                            <div class="info">
                                <div class="name">
                                    <b>MATIC</b>
                                    <span>/USDT</span>
                                </div>
                            </div>
                        </div>
                        <div class="center">
                            <b>0.52000</b>
                        </div>
                        <div class="right">
                            <div class="label label-increase">+13.86%</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="left">
                            <div class="info">
                                <div class="name">
                                    <b>RAD</b>
                                    <span>/USDT</span>
                                </div>
                            </div>
                        </div>
                        <div class="center">
                            <b>1.05000</b>
                        </div>
                        <div class="right">
                            <div class="label label-decrease">-2.33%</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="left">
                            <div class="info">
                                <div class="name">
                                    <b>SOL</b>
                                    <span>/USDT</span>
                                </div>
                            </div>
                        </div>
                        <div class="center">
                            <b>142.840</b>
                        </div>
                        <div class="right">
                            <div class="label label-decrease">-0.09%</div>
                        </div>
                    </div>
                </div>                                                           <!-- TradingView Widget BEGIN -->

            </div>
        </div>

    </div>
</div>
<!--CONTENT END-->
<style>
    .layoutLay{
        width: 100%;
        height: 100%;
        background: #00000014;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 888;
    }
    .content p{
        padding: 5px 0 !important;
    }
</style>
<!--pop Dlg -->


        <div style="text-align: center">
            <div style="display: flex;
    align-items: center;
    background: #1dcbff;
    width: 51%;
    text-align: center;
    padding: 3px 5px;
    border-radius: 6px;
    margin-top: 20px;
    color: #fff !important;
    margin: 16px auto;
    margin-bottom: 0;"
    >
                <span style="margin-right: 6px;" onclick="window.location.href='{{setting('tgroup')}}'"><img style="width: 30px;" src="https://img.icons8.com/fluency/48/telegram-app.png" alt=""></span><a href="{{setting('service')}}" class="gtbtn" style="font-size: 16px;color: #fff;">join The Group</a>
            </div>
        </div>
    </div>
</div>

<script>

    function closeWelcome(){
        document.getElementById('popdlg').style.display='none';
        document.querySelector('.layoutLay').style.display='none';
    }
    $(function () {
        var pop = localStorage.getItem('pop');
        if (pop && pop === '1') {
            showPopup('.home-popup');
            localStorage.setItem('pop', '0');
        }


        $('.home-popup .close').click(function () {
            hidePopup();
        });

        // showExchangeData();
        localStorage.setItem('name', '{{user()->phone}}');
        localStorage.setItem('id', '676');
    });

    function showExchangeData(tab, platform) {
        if (tab) {
            $('.exchange-table a').removeClass('active-tab');
            $(tab).addClass('active-tab');
        }

        layer.load(2);

        $.post('/exchange', {platform: platform ? platform : 0}, function (r) {
            layer.closeAll('loading');
            $('.data-list').html(r);
        });
    }


    $(function () {
        var mySwiper = new Swiper('.swiper-container', {
            autoplay: true,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
            },
        });
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
        <a href="{{setting('service')}}" class="service-item">
            <img src="{{asset('public')}}/static/images/service/s-1.png" class="service-item-icon">
            <div class="service-item-title">Telegram</div>
        </a>
    </div>
</div>

@include('app.layout.manu')

<div id="float_ico"
 onclick="window.location.href='{{setting('service')}}'"
     style="position: fixed; bottom: 102px; right: 10px; display: flex; justify-content: center; align-items: center; width: 48px; height: 48px;">
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

</body>
</html>
