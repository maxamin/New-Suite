@extends('frontend.layouts.user')
@section('title')
    {{ __('Withdraw Account Create') }}
@endsection
<div class="uwe">
    <p style="height: 5px;"></p>
    <img src="/assets/frontend/images/close.png" style="position: absolute; top: 15; left: 15; width: 30px;" onclick="window.location.href='/h5/index.php/withdraw/account'">
    <h3 class="title" style="display: flex; justify-content: center; font-size: 20px; color: white;">{{ __('Withdraw Account Create') }}</h3>
</div>
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="site-card" style="background-image: url('/assets/global/images/blue2.jpg');">
                <div class="site-card-header">
                    <h3 class="title">{{ __('Add New Withdraw Account') }}</h3>
                    <div class="card-header-links">
                        <a href="{{ route('user.withdraw.account.index') }}"
                           class="card-header-link">{{ __('Withdraw Account') }}</a>
                    </div>
                </div>
                <div class="site-card-body">
                    <div class="progress-steps-form">
                        <form action="{{ route('user.withdraw.account.store') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row selectMethodRow">
                                <div class="col-xl-6 col-md-12 selectMethodCol">
                                    <label for="exampleFormControlInput1"
                                           class="form-label">{{ __('Choice Method:') }}</label>
                                    <div class="input-group">
                                        <select name="withdraw_method_id" id="selectMethod"
                                                class="site-nice-select">
                                            <option selected>{{ __('Select Method') }}</option>
                                            @foreach($withdrawMethods as $raw)
                                                <option value="{{ $raw->id }}">{{ $raw->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="buttons" style="display: flex; justify-content: center;">
                                <button type="submit" class="site-btn blue-btn" style="border: none; border-radius: 10px; background-image: url('/assets/global/images/blue3.png'); color: #15FFDF; font-size: 15px; font-weight: bold;">
                                    {{ __('Add New Withdraw Account') }}<i
                                        class="anticon anticon-double-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#selectMethod").on('change',function (e) {
            "use strict"
            e.preventDefault();

            //$('.manual-row').empty();
            $('.selectMethodRow').children().not(':first').remove();

            var id = $(this).val()

            var url = '{{ route("user.withdraw.method",":id") }}';
            url = url.replace(':id', id);
            $.get(url, function (data) {
                $(data).insertAfter(".selectMethodCol");
                imagePreview()
            })
        })
    </script>
@endsection
