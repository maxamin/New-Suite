<?php $user = Auth::user(); ?>


<!-- menu main -->
<div class="main-menu">
    <div class="row">
        <div class="col text-right" style="margin-top: -11px">
            <button class="btn btn-link btn-40 btn-close text-white">
                <img width="30" height="30"  src="https://img.icons8.com/fluency/96/cancel.png" alt="cancel"/>
            </button>
        </div>
    </div>
    <div class="row mb-4 no-gutters">
        <div class="col-auto">
            <div class="avatar avatar-40 rounded-circle position-relative">
                <figure class="background profilePhoto">
                    <img src="{{ getImage(imagePath()['profile']['user']['path'].'/'. @$user->image,imagePath()['profile']['user']['size']) }}" alt="LOGO">
                </figure>
            </div>
        </div>
        <div class="col pl-3 text-left align-self-center">
            <h6 class="mb-1">{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}</h6>
            <p class="small text-default-secondary">{{ Auth::user()->username }}
                @if ($user->kv == 0)
                    <span class="mb-0 badge badge-danger"><i class="las la-user-check"></i> Unverified</span> <br> <a href="{{route('user.kyc.form')}}" class="text-info">Vetify Now</a>
                @elseif($user->kv == 1)
                    <span class="mb-0 badge badge-success"><i class="las la-user-check"></i> Verified</span>
                @elseif($user->kv == 2)
                    <span class="mb-0 badge badge-warning"><i class="las la-user-check"></i> Pending</span>
                @endif
            </p>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h4 class="mb-1 font-weight-normal user_balance">{{ $general->cur_sym }} {{ showAmount($user->balance) }}</h4>
                    <p class="text-default-secondary">My Balance</p>
                </div>
                <div class="col-auto">
                    <img width="50" height="50" style="opacity: 60%" src="https://img.icons8.com/fluency/100/coin-wallet.png" alt="coin-wallet"/>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-container">
        {{-- <div class="row mb-4">
            <div class="col">
                <h4 class="mb-1 font-weight-normal user_balance">{{ $general->cur_sym }} {{ showAmount($user->balance) }}</h4>
                <p class="text-default-secondary">My Balance</p>
            </div>
            <div class="col-auto">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#depositModal" class="btn btn-default btn-40 rounded-circle border-0 dpbtnSidebar">
                    <img width="20px" class="nav-icons mr-0" src="{{asset('assets/images/3d-logo/money-note.png')}}" alt="">
                </a>
            </div>
        </div> --}}

        <div class="row">
            <div class="col-4 my-2 text-center">
                <a href="{{ route('user.home') }}" class="card-box">
                    <img src="{{ asset('assets/images/new-logo-3d/home-white.png') }}"
                        style="max-width: 60px; max-height: 60px;" alt="">
                    <p>Home</p>
                </a>
            </div>
            <div class="col-4 my-2 text-center">
                <a href="{{ route('user.profile.setting') }}" class="card-box">
                    <img src="https://img.icons8.com/3d-fluency/60/gear--v2.png"
                        style="max-width: 60px; max-height: 60px;" alt="">
                    <p>Setting</p>
                </a>
            </div>
            <div class="col-4 my-2 text-center">
                <a href="{{ route('user.ai.smart.trade') }}" class="card-box">
                    <img src="{{asset('assets/images/new-logo-3d/ai.png')}}"
                        style="max-width: 60px; max-height: 60px;" alt="">
                    <p>Ai Trade</p>
                </a>
            </div>
            <div class="col-4 my-2 text-center">
                <a href="{{ route('plans') }}" class="card-box">
                    <img src="https://img.icons8.com/3d-fluency/60/robot-1.png"
                        style="max-width: 60px; max-height: 60px;" alt="">
                    <p>All Robots</p>
                </a>
            </div>
            <div class="col-4 my-2 text-center">
                <a href="{{ route('user.ptc.index') }}" class="card-box">
                    <img src="https://img.icons8.com/3d-fluency/60/robot.png"
                        style="max-width: 60px; max-height: 60px;" alt="">
                    <p>Miner</p>
                </a>
            </div>
            <div class="col-4 my-2 text-center">
                <a href="{{ route('user.referred') }}" class="card-box">
                    <img src="https://img.icons8.com/3d-fluency/60/conference.png"
                        style="max-width: 60px; max-height: 60px;" alt="">
                    <p>MyTeam</p>
                </a>
            </div>
            <div class="col-4 my-2 text-center">
                <a href="{{ route('income.guide') }}" class="card-box">
                    <img src="https://img.icons8.com/3d-fluency/94/signpost.png"
                        style="max-width: 60px; max-height: 60px;" alt="">
                    <p>Guide</p>
                </a>
            </div>
            <div class="col-4 my-2 text-center">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#appDownloadModal" class="card-box">
                    <img src="https://img.icons8.com/3d-fluency/94/download-from-cloud.png"
                        style="max-width: 60px; max-height: 60px;" alt="">
                    <p>Apps</p>
                </a>
            </div>
            <div class="col-4 my-2 text-center">
                <a href="{{ route('user.transactions') }}" class="card-box">
                    <img src="https://img.icons8.com/3d-fluency/60/scroll.png"
                        style="max-width: 60px; max-height: 60px;" alt="">
                    <p>Transactions</p>
                </a>
            </div>
            <div class="col-4 my-2 text-center">
                <a href="{{ route('ticket.open') }}" class="card-box">
                    <img src="https://img.icons8.com/3d-fluency/60/train-ticket.png"
                        style="max-width: 60px; max-height: 60px;" alt="">
                    <p>Tickets</p>
                </a>
            </div>
            <div class="col-4 my-2 text-center">
                <a href="{{ route('pages', 'about-us') }}" class="card-box">
                    <img src="https://img.icons8.com/3d-fluency/60/about.png"
                        style="max-width: 60px; max-height: 60px;" alt="">
                    <p>About Us</p>
                </a>
            </div>
            <div class="col-4 my-2 text-center">
                <a href="{{ route('user.logout') }}" class="card-box">
                    <img src="data:image/png;base64,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"
                        style="max-width: 60px; max-height: 60px;" alt="">
                    <p>Sign Out</p>
                </a>
            </div>

        </div>

        {{-- <ul class="nav nav-pills flex-column ">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('user.home') }}">
                    <div>
                        <img width="20px" class="nav-icons" src="{{asset('assets/images/3d-logo/home-3.png')}}" alt="">
                        Home
                    </div>
                    <span class="arrow material-icons">chevron_right</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.ai.smart.trade') }}">
                    <div>
                        <img width="20px" class="nav-icons" src="{{asset('assets/images/new-logo-3d/ai.png')}}" alt="">
                        Ai Smart Trade
                    </div>
                    <span class="arrow material-icons">chevron_right</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('plans') }}">
                    <div>
                        <img width="20px" class="nav-icons" src="{{asset('assets/images/new-logo-3d/robo-4.png')}}" alt="">
                        All Robots
                    </div>
                    <span class="arrow material-icons">chevron_right</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.ptc.index') }}">
                    <div>
                        <img width="20px" class="nav-icons" src="{{asset('assets/images/new-logo-3d/mining.png')}}" alt="">
                        Robot Miner
                    </div>
                    <span class="arrow material-icons">chevron_right</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link comingSoon" href="/p2p">
                    <div>
                        <img width="20px" class="nav-icons" src="{{asset('assets/images/3d-logo/hand.png')}}" alt="">
                        P2P
                    </div>
                    <span class="arrow material-icons">chevron_right</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link comingSoon" href="/mhare_market">
                    <div>
                        <img width="20px" class="nav-icons" src="{{asset('assets/images/new-logo-3d/lottery.png')}}" alt="">
                        Robotic Lottery
                    </div>
                    <span class="arrow material-icons">chevron_right</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.referred') }}">
                    <div>
                        <img width="20px" class="nav-icons" src="{{asset('assets/images/3d-logo/team-3.png')}}" alt="">
                        Refer Friends
                    </div>
                    <span class="arrow material-icons">chevron_right</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link dpbtnSidebar" href="javascript:void(0)" data-toggle="modal" data-target="#depositModal">
                    <div>
                        <img width="20px" class="nav-icons" src="{{asset('assets/images/3d-logo/deposit-2.png')}}" alt="">
                        Recharge
                    </div>
                    <span class="arrow material-icons">chevron_right</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link dpbtnSidebar" href="javascript:void(0)" data-toggle="modal" data-target="#withdrawModal">
                    <div>
                        <img width="20px" class="nav-icons" src="{{asset('assets/images/3d-logo/wallet-3.png')}}" alt="">
                        Withdraw
                    </div>
                    <span class="arrow material-icons">chevron_right</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.profile.setting') }}">
                    <div>
                        <img width="20px" class="nav-icons" src="{{asset('assets/images/3d-logo/profile-2.png')}}" alt="">
                        Profile Settings
                    </div>
                    <span class="arrow material-icons">chevron_right</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.transactions') }}">
                    <div>
                        <img width="20px" class="nav-icons" src="{{asset('assets/images/3d-logo/trx.png')}}" alt="">
                        Transactions
                    </div>
                    <span class="arrow material-icons">chevron_right</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ticket.open') }}">
                    <div>
                        <img width="20px" class="nav-icons" src="{{asset('assets/images/3d-logo/support-24.png')}}" alt="">
                        Support
                    </div>
                    <span class="arrow material-icons">chevron_right</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('pages', 'terms-conditions') }}">
                    <div>
                        <img width="20px" class="nav-icons" src="{{asset('assets/images/3d-logo/history-1.png')}}" alt="">
                        T & C
                    </div>
                    <span class="arrow material-icons">chevron_right</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('pages', 'about-us') }}">
                    <div>
                        <img width="20px" class="nav-icons" src="{{asset('assets/images/3d-logo/call-person.png')}}" alt="">
                        About Us
                    </div>
                    <span class="arrow material-icons">chevron_right</span>
                </a>
            </li>

        </ul> --}}
        {{-- <div class="text-center">
            <a href="{{ route('user.logout') }}" class="btn btn-outline-danger text-white rounded my-3 mx-auto">
                <i class="las la-sign-out-alt"></i> Sign out
            </a>
        </div> --}}
    </div>
</div>
<div class="backdrop"></div>

@push('script')
    <script>
        $(document).on('click', '.dpbtnSidebar', function () {
            $('.backdrop').click();
        });
        $(document).on('click', '.comingSoon', function (e) {
            e.preventDefault();
            notifyMsg("Coming Soon!", 'info');
        });
    </script>
@endpush
