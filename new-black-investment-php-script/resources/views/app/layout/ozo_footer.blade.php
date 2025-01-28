<!-- Bottom Navigations -->
<div class="bottom-nav">
    <div>
        <a href="{{route('dashboard')}}" class="{{ menuActive(['dashboard']) }}">
            <iconify-icon width="20" icon="fluent:home-20-filled"></iconify-icon>
            <p>Home</p>
        </a>

        <a href="{{ route('user.blog') }}" class="{{ menuActive(['user.blog', 'user.blog.page']) }}">
            <iconify-icon width="20" icon="mingcute:news-fill"></iconify-icon>
            <p>News</p>
        </a>

        <a href="{{ route('my.profile') }}" class="{{ menuActive(['my.profile', 'user.change-password', 'user.card', 'share', 'user.team', 'user.vip', 'user.checkin', 'earning', 'balance.record', 'user.task', 'user.recharge.ledger', 'user.withdraw.ledger']) }}">
            <iconify-icon width="20" icon="mingcute:user-5-fill"></iconify-icon>
            <p>Mine</p>
        </a>
    </div>
</div>
<!-- end bottom navigations -->