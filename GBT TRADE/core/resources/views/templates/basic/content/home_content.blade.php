<!-- page content start -->
<div class=" pb-3">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner shadow-sm" style="border-radius: 5px">

            @php $i=0; @endphp
            @forelse($banners as $item)
                @php
                    $actives = '';
                @endphp

                @if ($i == 0)
                    @php $actives = 'active';@endphp
                @endif
                @php $i=$i+1; @endphp

                <div class="carousel-item <?= $actives ?>">
                    <img class="d-block w-100"
                        src="{{ getImage('assets/images/frontend/banner/' . $item->data_values->image) }}" alt="banner">
                </div>

            @empty
            @endforelse

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

{{-- @auth
    @include('templates.basic.component.balance_card')
@endauth --}}

<!-- Scroling Notice -->
{{-- <div class="container mb-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body py-0">
                    <div class="row align-items-center">
                        <div class="bg-scroll-light col-auto px-2" style="border-radius: 20px">
                            <img class="p-1" src="{{asset('assets/images/3d-logo/promosion-2.png')}}" width="30px" height="30px" alt="">
                        </div>
                        <div class="col px-0 pt-1">
                            <marquee behavior="scroll" direction="left">
                                @php
                                    echo $noticeCaption->data_values->scrolingNotice;
                                @endphp
                            </marquee>
                        </div>
                        <div class="bg-scroll-light col-auto px-1" style="border-radius: 20px">
                            <img class="p-1" src="{{asset('assets/images/3d-logo/reffer.png')}}" width="30px" height="30px" alt="">
                            <b class="text-black" id="dynamic_counter"></b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <div class="row">
                    @auth
                    <div class="col-3 text-center">
                        <a href="{{ route('income.guide') }}" class="card-box">
                            <img src="https://img.icons8.com/3d-fluency/94/signpost.png"
                                style="max-width: 60px; max-height: 60px;" alt="">
                            <p>Earning Guide</p>
                        </a>
                    </div>
                    <div class="col-3 text-center">
                        <a href="{{ route('plans') }}" class="card-box">
                            <img src="https://img.icons8.com/3d-fluency/94/robot-1.png"
                                style="max-width: 60px; max-height: 60px;" alt="">
                            <p>All Robots</p>
                        </a>
                    </div>
                    <div class="col-3 text-center">
                        <a href="{{ route('user.ptc.index') }}" class="card-box">
                            <img src="https://img.icons8.com/3d-fluency/60/robot.png"
                                style="max-width: 60px; max-height: 60px;" alt="">
                            <p>Robot Miner</p>
                        </a>
                    </div>
                    <div class="col-3 text-center">
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#appDownloadModal" class="card-box">
                            <img src="https://img.icons8.com/3d-fluency/94/download-from-cloud.png"
                                style="max-width: 60px; max-height: 60px;" alt="">
                            <p>Apps</p>
                        </a>
                    </div>
                    @endauth

                    <div class="col-3 text-center">
                        <a href="{{ route('blog') }}" class="card-box">
                            <img src="https://img.icons8.com/3d-fluency/94/news.png"
                                style="max-width: 60px; max-height: 60px;" alt="">
                            <p>News</p>
                        </a>
                    </div>
                    <div class="col-3 text-center">
                        <a href="{{ @$yourLinks->data_values->video }}" class="card-box">
                            <img src="https://img.icons8.com/3d-fluency/94/classroom.png"
                                style="max-width: 60px; max-height: 60px;" alt="">
                            <p>Tutorial</p>
                        </a>
                    </div>
                    <div class="col-3 text-center">
                        <a href="{{ route('user.community') }}" class="card-box">
                            <img src="https://img.icons8.com/3d-fluency/94/conference-call--v2.png"
                                style="max-width: 60px; max-height: 60px;" alt="">
                            <p>Community</p>
                        </a>
                    </div>
                    <div class="col-3 text-center">
                        <a href="{{ route('pages', 'about-us') }}" class="card-box">
                            <img src="https://img.icons8.com/3d-fluency/50/about.png"
                                style="max-width: 60px; max-height: 60px;" alt="">
                            <p>About Us</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="card mt-2" style="height: 500px">
    <div class="card-body">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
            <div class="tradingview-widget-container__widget"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
                {
                    "colorTheme": "dark",
                    "dateRange": "12M",
                    "showChart": false,
                    "locale": "en",
                    "width": "100%",
                    "height": "100%",
                    "largeChartUrl": "",
                    "isTransparent": true,
                    "showSymbolLogo": true,
                    "showFloatingTooltip": false,
                    "tabs": [
                    {
                        "title": "Crypto",
                        "symbols": [
                        {
                            "s": "BINANCE:BTCUSDT"
                        },
                        {
                            "s": "BINANCE:ETHUSDT"
                        },
                        {
                            "s": "BINANCE:XRPUSDT"
                        },
                        {
                            "s": "BINANCE:DOGEUSDT"
                        },
                        {
                            "s": "BINANCE:SOLUSDT"
                        },
                        {
                            "s": "BINANCE:MATICUSDT"
                        },
                        {
                            "s": "BINANCE:LINKUSDT"
                        },
                        {
                            "s": "BINANCE:COMPUSDT"
                        },
                        {
                            "s": "BINANCE:AVAXUSDT"
                        },
                        {
                            "s": "BINANCE:DOTUSDT"
                        },
                        {
                            "s": "BINANCE:GALAUSDT"
                        }
                        ],
                        "originalTitle": "Indices"
                    }
                    ]
                }
            </script>
        </div>
        <!-- TradingView Widget END -->
    </div>
</div>


{{-- <div class="container mb-3">
    <img class="img-fluid" style="border-radius: 30px;" src="{{asset('assets/images/custom-mining/banner-6.png')}}" alt="">
</div> --}}

<!-- Swiper Our Reviews-->
{{-- <div class="container mb-4">
    <div class="row mb-3">
        <div class="col">
            <h6 class="text-white mb-0">Our Reviews</h6>
        </div>
    </div>
    <div class="swiper-container swiper-users ">
        <div class="swiper-wrapper">
            @forelse($fake_reviews as $review)
                <div class="swiper-slide">
                    <div class="card h-100" style="width: 320px;">
                        <div class="card-body pb-1">
                            <div class="row">
                                <div class="col">
                                    <i style="font-size: 30px" class="las la-feather-alt"></i>
                                    <p class="my-2">{{ @$review->data_values->review_text }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer pt-0">
                            <div class="row mt-3">
                                <div class="col-auto">
                                    <img class="rounded-circle img-fluid img-thumbnail" style="width: 50px; height: 50px" src="{{ getImage('assets/images/frontend/fake_review/' . @$review->data_values->image) }}" alt=""/>
                                </div>
                                <div class="col pl-0">
                                    <h6>{{ @$review->data_values->name }}</h6>
                                    <p class="text-secondary">{{ showDateTime(@$review->updated_at, 'd-m-Y, h:i a') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty

            @endforelse
        </div>
    </div>
</div> --}}

