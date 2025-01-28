@extends("app.layout.ozo")

@push("page_title") Dashboard @endpush

@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
@endpush

@section('content')
<div class="home">

    <!-- title -->
    <div class="title">
        <div>
            <img src="{{ asset(themes('img/logo.jpeg')) }}" alt="">
        </div>
        <div>
            <p>{{ $setting->site_name }}</p>
            {!! $setting->about !!}
        </div>
    </div>

    <div class="swiper">
        <div class="swiper-wrapper">
            @foreach($sliders as $slider)
                <img class="swiper-slide" src="{{ asset($slider->photo) }}" alt="Slider" />
            @endforeach
        </div>
    </div>

    <!-- links -->
    <div class="links">
        <button onclick="openModal('modalTelegram')" href="javascript:void(0);">
            <img width="22" src="{{ asset(themes('img/icon/social/telegram.png')) }}" alt="">
            <p>Contact Us</p>
        </button>

        <a href="{{ route('user.checkin') }}">
            <img width="22" src="{{ asset(themes('img/icon/checked-tabs.png')) }}" alt="">
            <p>Sign-in</p>
        </a>

        <a href="{{ route('share') }}">
            <img width="22" src="{{ asset(themes('img/icon/email-open.png')) }}" alt="">
            <p>Invite</p>
        </a>

        <a href="{{ route('user.vip') }}">
            <img width="22" src="{{ asset(themes('img/icon/king.png')) }}" alt="">
            <p>VIP</p>
        </a>

        <a href="{{ route('user.team') }}">
            <img width="22" src="{{ asset(themes('img/icon/friends.png')) }}" alt="">
            <p>Team</p>
        </a>
    </div>

    <div class="my-tasks">
        <div class="title">
            <p><img src="{{ asset(themes('img/icon/task.png')) }}" alt=""> Daily Tasks</p>
            <a href="{{ route('user.task') }}">More</a>
        </div>

        <div class="tasks">

            <!-- task -->
            @foreach($tasks as $task)
            <div>
                <div>
                    <div class="round-badge">
                        <img src="{{ asset(themes($task->type->photo)) }}" alt="">
                    </div>
                    <p>{{ price($task->amount) }}</p>
                </div>
                <div>
                    <div>
                        <p>{{ $task->name }}</p>
                        <p>{!! $task->text_desc !!}</p>
                    </div>
                    <div>
                        @if(auth()->user()->vip == $task->vip && $task->for_vip || $task->for_vip != 1)
                            <button type="button" class="Buy task-submit" data-id="{{ $task->id }}">Claim</button>
                        @else
                            <button type="button" class="Buy">
                                <iconify-icon icon="hugeicons:time-half-pass" width="10" height="10"  style="color: white"></iconify-icon>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>

    <div class="products">
        <div class="title">
            @foreach($categorys as $cate)
            <button @if($cate->id == '1') class="active" @endif role="product-switch" data-target="data{{ $cate->id }}">
                <img src="{{ asset(themes($cate->photo)) }}" alt="">
                <p>{{ $cate->name }}</p>
            </button>
            @endforeach
        </div>

        @php
            $data[1] = collect($packages)->filter(function($item) {
                return $item->category_id == '1';
            });

            $data[2] = collect($packages)->filter(function($item) {
                return $item->category_id == '2';
            });

            $data[3] = collect($packages)->filter(function($item) {
                return $item->category_id == '3';
            });
        @endphp

        @foreach([1,2,3] as $keydata)
            <div class="products-bag hide" id="data{{ $keydata }}">
                @foreach($data[$keydata] as $package)
                    @php
                        $vip = $package->vip;
                        $totalPurchased = ($package->has_limit) ? \App\Models\Purchase::where(['user_id' => auth()->id(), 'package_id' => $package->id])->count() : 0;
                    @endphp
                    
                    <div class="product">

                        @if($package->p_status == 'sold_out' || $totalPurchased >= $package->buy_limit && $package->has_limit)
                        <div class="sold-out">
                            <p>Sold Out</p>
                        </div>
                        @endif

                        <div class="feature-img" style="background-image: url('{{ asset($package->photo) }}');">
                            @if($package->for_vip) <span>{{ $vip->name }}</span> @endif
                        </div>

                        <div>
                            <div>
                                <p>{{ $package->name }}</p>
                                <button type="button" class="openProduct" onclick="openModal('modalProduct')" data-name="{{ $package->name }}" data-amount="{{ $package->price }}" data-id="{{ $package->id }}">Install</button>
                            </div>

                            <div>
                                <div>
                                    <p>Price</p>
                                    <p>{{ price($package->price) }}</p>
                                </div>
                                <div>
                                    <p>Daily Income: {{ price($package->interest) }}</p>
                                    <p>Total income: {{ price($package->interest * $package->validity) }}</p>
                                    <p>Cycle {{ $package->validity }} days</p>
                                    <p>Invest Limit @if($package->has_limit)<b>{{ $package->buy_limit }}</b>@else <b>Unlimited</b>@endif </p>
                                </div>
                            </div>
                            @if($package->earn_type == 'days')<p style="font-size: 10px;">You will receive your earnings after {{ $package->validity }} days</p>@endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
        
    </div>
</div>

@include('app.main.home.modal.popup')
@include('app.main.home.modal.product')
@include('app.main.home.modal.social')
@include('app.main.home.modal.other')
@endsection

@push('script')
<script src="{{ asset(themes('js/modal2.js')) }}"></script>
<script src="{{ asset(themes('js/modal.js')) }}"></script>
<script src="{{ asset(themes('js/product-switch.js')) }}"></script>
<script>
    const swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        speed: 1000,
        autoplay: {
            delay: 1000,
        },
    });
</script>
@endpush