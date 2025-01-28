@php
    $yourLinks = getContent('links.content', true);
@endphp
<!-- footer-->
<div class="footer mb-2 mx-auto">
    <div class="row no-gutters justify-content-center">
        <div class="col">
            <a href="{{ route('home') }}" class="{{ request()->path() == '/' ? 'active' : '' }}">
                <img class="img-fluid footer-icon" src="{{ asset('assets/images/new-logo-3d/home-white.png') }}" alt="">
                <p>Home</p>
            </a>
        </div>
        <div class="col">
            <a href="{{ route('user.trading.chart') }}"
                class="{{ request()->path() == 'user/trading-chart' ? 'active jumpBtn' : '' }}">
                <img class="img-fluid footer-icon" src="{{ asset('assets/images/new-logo-3d/chart-2.png') }}"
                    alt="">
                <p>Chart</p>
            </a>
        </div>
        <div class="col">
            <a href="{{ route('user.coin.mining') }}"
                class="{{ request()->path() == 'plans' ? 'active jumpBtn' : '' }}">
                <img class="img-fluid footer-icon-middle gptCoin" src="{{ asset('assets/images/new-logo-3d/GPT_coin.png') }}" alt="">
            </a>
        </div>
        <div class="col">
            <a href="{{ route('user.register') }}" class="{{ request()->path() == 'user/ptc' ? 'active' : '' }}">
                <img class="img-fluid footer-icon" src="{{ asset('assets/images/new-logo-3d/lock-2.png') }}" alt="">
                <p>Sign-Up</p>
            </a>
        </div>
        <div class="col">
            <a href="{{ route('user.login') }}"
                class="{{ request()->path() == 'user/display-profile' ? 'active' : '' }}">
                <img class="img-fluid footer-icon" src="{{ asset('assets/images/new-logo-3d/tik-green.png') }}" alt="">
                <p>Login</p>
            </a>
        </div>
    </div>
</div>
