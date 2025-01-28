
    @foreach ($plans as $plan)
    <div class="col-md-6 col-sm-12 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-4 px-1">
                        <img class="img-fluid" src="{{asset('assets/images/plan/'. @$plan->image)}}" alt="image">
                    </div>
                    <div class="col-8 px-1">
                        <h5 class="text-white">{{ __($plan->name) }}</h5>
                        <p class="mb-0">Price: <b class="text-white text-no-shadow">{{ __(showAmount($plan->price)) }} {{ $general->cur_sym }}</b></p>
                        <p class="mb-0">Daily Earn: <b class="text-white text-no-shadow">{{ $plan->ads_rate }} {{ $general->cur_sym }} </b></p>
                        <p class="mb-0">Validity: <b class="text-white text-no-shadow">{{ $plan->validity }} Days</b></p>
                        @if (@auth()->user()->plan_id === $plan->id)
                        <p class="mb-2">Trade Stop Charge: <b class="text-white text-no-shadow">{{ showAmount($plan->stop_charge) }} {{ $general->cur_sym }}</b></p>
                            <button class="btn btn-sm mt-2 border-custom btn-success" disabled>@lang('Active Trade')</button>
                            <button class="stopBtn btn btn-sm mt-2 border-custom btn-danger" data-id="{{ $plan->id }}">@lang('Stop Trade')</button>
                        @else
                            <button class="buyBtn btn btn-sm mt-2 border-custom btn-success" @disabled(@auth()->user()->plan_id && @auth()->user()->plan_id != $plan->id ) data-id="{{ $plan->id }}">@lang('Active Trade')</button>
                            <button class="btn btn-sm mt-2 border-custom btn-danger" disabled>@lang('Stop Trade')</button>
                        @endif

                        {{-- <div class="mt-3">
                            @if (@auth()->user()->runningPlan && @auth()->user()->plan_id == $plan->id)
                                <button class="package-disabled btn btn-sm border-custom btn-outline-warning">@lang('Current')</button>
                            @elseif(@auth()->user()->runningPlan && @auth()->user()->plan_id > $plan->id)
                                <button class="package-disabled btn btn-sm border-custom btn-outline-warning">@lang('Locked')</button>
                            @else
                                <button class="buyBtn btn btn-sm border-custom btn-outline-success" data-id="{{ $plan->id }}">@lang('Active Trade')</button>
                                <button class="buyBtn btn btn-sm border-custom btn-outline-danger" data-id="{{ $plan->id }}">@lang('Stop Trade')</button>
                            @endif
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
