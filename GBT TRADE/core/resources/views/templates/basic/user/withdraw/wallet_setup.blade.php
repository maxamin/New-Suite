@extends($activeTemplate.'layouts.master')
@section('content')


<!-- page content start -->
<main class="flex-shrink-0 main">
    @include(activeTemplate() . 'includes.top_nav_mini')

    {{-- <div class="main-container"> --}}
        {{-- <div class="container"> --}}

            <div class="card mt-2">
                <div class="card-header">
                    <h6 class="mb-0 text-center">Setup Withdraw Wallet Address</h6>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group boxed">
                            <div class="input-wrapper mb-2 not-empty">
                                <label class="label" for="withdraw_wallet">Wallet Address USDT(TRC20)</label>
                                <input type="text" class="form-control" id="withdraw_wallet" name="withdraw_wallet" value="{{ @$user->withdraw_wallet }}" placeholder="Ex: A4dt5Bbfvui6iksxxxxxxxxx" @readonly(@$user->withdraw_wallet)>
                                <small class="text-danger text-center small">Carefully fill the wallet address.You can update only once.</small>
                            </div>
                            <button class="btn btn-success w-100" type="submit" @disabled(@$user->withdraw_wallet)>Update Wallet</button>
                        </div>
                    </form>
                </div>
            </div>

        {{-- </div> --}}
    {{-- </div> --}}
</main>


@endsection


@push('script')
    <script>
        //-- Proile Setting --//
        $(document).on('submit', '#profileSetting', function (e) {
            e.preventDefault();
            let formData = new FormData($("#profileSetting")[0])
            $.ajax({
                type: "POST",
                url: "{{route('user.profile.submit')}}",
                data: formData,
                processData: false,
                dataType: 'json',
                contentType: false,
                success: function (res) {
                    console.log(res);
                    notifyMsg(res.msg,res.cls)
                }
            });
        });
    </script>
@endpush
