@extends($activeTemplate . 'layouts.master')
@section('content')



    <body class="body-scroll d-flex flex-column h-100 menu-overlay" data-page="homepage">
        <!-- Top navbar -->
        @include($activeTemplate . 'includes.side_nav')

        <!-- Begin page content -->
        <main class="flex-shrink-0 main has-footer">
            <!-- Fixed navbar -->
            @include($activeTemplate . 'includes.top_nav')

            {{-- <!-- Balance Card -->
            @include('templates.basic.component.balance_card') --}}

            <div class="main-container">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <h5 class="mb-0 text-center">
                                        Live Crypto Chart
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <!-- TradingView Widget BEGIN -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="tradingview-widget-container">
                                        <div style="height: 250px;" id="tradingview_b3eeb"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-12">
                            <div class="card mt-2" style="height: 400px">
                                <div class="card-body">
                                    <!-- TradingView Widget BEGIN -->
                                    <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright">
                                            <a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank">
                                            </a>
                                        </div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                                        {
                                            "width": "100%",
                                            "height": "100%",
                                            "defaultColumn": "overview",
                                            "screener_type": "crypto_mkt",
                                            "displayCurrency": "USDT",
                                            "colorTheme": "dark",
                                            "locale": "en",
                                            "isTransparent": true
                                        }
                                        </script>
                                    </div>
                                    <!-- TradingView Widget END -->
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-12">
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
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- footer-->
        @include($activeTemplate . 'includes.bottom_nav')

    <!-- TradingView Chart Widget -->
    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
    <script type="text/javascript">
        new TradingView.widget({
            "autosize": true,
            "symbol": "BINANCE:BTCUSDT",
            "interval": "1",
            "timezone": "Asia/Almaty",
            "theme": "dark",
            "style": "1",
            "locale": "en",
            "toolbar_bg": "#f1f3f6",
            "enable_publishing": false,
            "hide_legend": true,
            "allow_symbol_change": true,
            "save_image": false,
            "container_id": "tradingview_b3eeb"
        });
    </script>
    <!-- TradingView Chart Widget END -->

    </body>
@endsection
