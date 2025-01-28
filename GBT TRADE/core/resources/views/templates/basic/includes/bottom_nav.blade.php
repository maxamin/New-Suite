@php
    $yourLinks = getContent('links.content', true);
@endphp
<div class="container px-2">
    <!-- footer-->
    <div class="footer mb-2 mx-auto">
        <div class="row no-gutters justify-content-center">
            <div class="col">
                <a href="{{ route('home') }}" class="{{ request()->path() == 'user/dashboard' ? 'active jumpBtn' : '' }}">
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
                <a href="{{ route('user.coin.mining') }}">
                    <img class="img-fluid footer-icon-middle {{ request()->path() == 'user/coin-mining' ? 'rotateCoin' : '' }}" src="{{ asset('assets/images/new-logo-3d/GPT_coin.png') }}" alt="">
                </a>
            </div>
            <div class="col">
                <a href="{{ route('user.ai.smart.trade') }}"
                    class="{{ request()->path() == 'user/ai-smart-trade' ? 'active jumpBtn' : '' }}">
                    <img class="img-fluid footer-icon" src="{{ asset('assets/images/new-logo-3d/ai.png') }}" alt="">
                    <p>Ai Trade</p>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('user.display_profile') }}"
                    class="{{ request()->path() == 'user/display-profile' ? 'active jumpBtn' : '' }}">
                    <img class="img-fluid footer-icon" src="https://img.icons8.com/3d-fluency/60/guest-male--v1.png" alt="">
                    <p>Profile</p>
                </a>
            </div>
        </div>
    </div>
</div>


{{-- <div class="footer">
    <div class="row no-gutters justify-content-center">
        <div class="col">
            <a href="{{ route('home') }}" class="{{ request()->path() == 'user/dashboard' ? 'active jumpBtn' : '' }}">
                <i class="material-icons">home</i>
                <p>Dashboard</p>
            </a>
        </div>
        <div class="col">
            <a href="{{ $yourLinks->data_values->telegram }}" class="{{ request()->path() == 'user/analytics' ? 'active jumpBtn' : '' }}">
                <i class="material-icons">telegram</i>
                <p>Telegram</p>
            </a>
        </div>
        <div class="col">
            <a href="{{ route('plans') }}" class="text-center d-flex justify-content-center">
            <div id="diamond" style="height: 56px; width: 56px; margin-top: -23px;" class="rounded-circle shadow d-flex align-items-center {{ request()->path() == 'plans' ? 'bg-orange-light text-orange jumpBtnMdl' : 'bg-ash-light text-ash' }}">
                <i
                    style="font-size: 30px; width: 40px;"
                    class="material-icons">diamond</i>
            </div>

            </a>
        </div>
        <div class="col">
            <a href="{{ route('user.ptc.index') }}" class="{{ request()->path() == 'user/ptc' ? 'active jumpBtn' : '' }}">
                <i class="material-icons">redeem</i>
                <p>Rewards</p>
            </a>
        </div>
        <div class="col">
            <a href="{{ route('user.display_profile') }}" class="{{ request()->path() == 'user/display-profile' ? 'active jumpBtn' : '' }}">
                <i class="material-icons">account_circle</i>
                <p>Profile</p>
            </a>
        </div>
    </div>
</div> --}}

{{-- <script>
setInterval(() => {
    setTimeout(() => {
        $(".jumpBtn").attr('style', "margin-top: -5px; transition: ease all 0.5s; -webkit-transition: ease all 0.4s;");
    }, 900);
    $(".jumpBtn").attr('style', "margin-top: 0px; transition: ease all 0.5s; -webkit-transition: ease all 0.4s;");
}, 1400);
</script>
<script>
setInterval(() => {
    setTimeout(() => {
        $(".jumpBtnMdl").attr('style', "height: 56px; width: 56px; margin-top: -28px; transition: ease all 0.5s; -webkit-transition: ease all 0.4s;");
    }, 900);
    $(".jumpBtnMdl").attr('style', "height: 56px; width: 56px; margin-top: -23px; transition: ease all 0.5s; -webkit-transition: ease all 0.4s;");
}, 1400);
</script> --}}
