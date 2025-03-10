
@foreach ($plans as $plan)
<div class="col-md-6 col-sm-12 mb-3">
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-5">
                    <img class="img-fluid" src="{{asset('assets/images/plan/'. @$plan->image)}}" alt="image">
                </div>
                <div class="col-7">
                    <h5 class="text-primary">{{ __($plan->name) }}</h5>
                    <p class="mb-0">Price: <b class="text-primary text-no-shadow">{{ __(showAmount($plan->price)) }} {{ $general->cur_sym }}</b></p>
                    <p class="mb-0">Daily Earn: <b class="text-primary text-no-shadow">{{ $plan->ads_rate }} {{ $general->cur_sym }} </b></p>
                    <p class="mb-0">Validity: <b class="text-primary text-no-shadow">{{ $plan->validity }} Days</b></p>
                    <div class="mt-3">
                        @if (@auth()->user()->runningPlan && @auth()->user()->plan_id == $plan->id)
                            <button class="package-disabled btn btn-sm border-custom btn-outline-warning">@lang('Current')</button>
                        @elseif(@auth()->user()->runningPlan && @auth()->user()->plan_id > $plan->id)
                            <button class="package-disabled btn btn-sm border-custom btn-outline-warning">@lang('Locked')</button>
                        @else
                            <button class="buyBtn btn btn-sm border-custom btn-outline-warning" data-id="{{ $plan->id }}">@lang('BUY NOW')</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<swiper-slide>-->
{{-- <div class="row">
    <div class="col-12">
        <div class="my-2">
            <div class="card border-0
                @if ($loop->index == 0) bg-secondary
                @elseif($loop->index == 1)
                    bg-default
                @elseif($loop->index == 2)
                    bg-info
                @elseif($loop->index == 3)
                    bg-success
                @elseif($loop->index == 4)
                    bg-warning
                @elseif($loop->index == 5)
                    bg-danger
                @elseif($loop->index == 6)
                    bg-orange
                @elseif($loop->index == 7)
                    bg-purple
                @else
                    bg-default @endif
                text-white">
                <div class="card-header">
                    <div class="row">
                        <div class="col-auto">
                            <i class="material-icons vm text-template">diamond</i>
                        </div>
                        <div class="col pl-0">
                            <h6 class="mb-1">{{ __($plan->name) }}</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="mb-0 mt-3">{{ $general->cur_sym }} {{ __(showAmount($plan->price)) }}</h5>
                        </div>
                        <div class="col">
                            <p class="mb-0 mt-3 text-right">
                                @lang('Daily Earn') {{ $general->cur_sym }} {{ $plan->ads_rate }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <p class="mb-0">{{ $plan->validity }} @lang('Days')</p>
                            <p class="small ">Validity</p>
                        </div>
                        <div class="col-auto align-self-center text-right">
                            @if (@auth()->user()->runningPlan && @auth()->user()->plan_id == $plan->id)
                                <button class="package-disabled btn btn-sm border-custom btn-outline-light">@lang('Current')</button>
                            @elseif(@auth()->user()->runningPlan && @auth()->user()->plan_id > $plan->id)
                                <button class="package-disabled btn btn-sm border-custom btn-outline-light">@lang('Locked')</button>
                            @else
                                <button class="buyBtn btn btn-sm border-custom btn-outline-light" data-id="{{ $plan->id }}">@lang('BUY NOW')</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endforeach
