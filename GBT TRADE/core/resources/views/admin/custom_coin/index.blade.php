@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 col-md-12 mb-30">
            <div class="card">
                <div class="card-body">

                    <form id="coinForm" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group ">
                                    <label> @lang('Coin Name')</label>
                                    <input class="form-control" type="text" name="name" required value="{{@$coin->name}}">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group ">
                                    <label> @lang('Coin Symbol')</label>
                                    <input class="form-control" type="text" name="symbol" required value="{{@$coin->symbol}}">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group ">
                                    <label> @lang('1') {{@$coin->symbol}} = ?</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="rate" required value="{{ @$coin->rate }}">
                                        <span class="input-group-text">{{$general->cur_text}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group ">
                                    <label> @lang('Coin per CRON JOB')</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="coin_per_cron" required value="{{ @$coin->coin_per_cron }}">
                                        <span class="input-group-text">{{@$coin->symbol}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-12">
                                <div class="form-group ">
                                    <label> @lang('Coin Notice')</label>
                                    <input class="form-control" type="text" name="notice" required value="{{@$coin->notice}}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="image">@lang('Coin Image') </label>
                                    <div class="file-upload-wrapper" data-text="Select Coin Image!">
                                        <input type="file" class="file-upload-field" name="image" id="image" placeholder="@lang('Plan Image')">
                                    </div>
                                    <small class="text-secondary">Image size must be <b class="text-danger">(400x400)</b>pixel.</small>
                                </div>
                            </div>
                            <div class="col-12">
                                <img width="200px" height="200px" class="img-thumbnail rounded-circle coinImg"  src="{{ asset('assets/images/custom_coin/'. $coin->image) }}" alt="">
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn--primary w-100 h-45">@lang('Submit')</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
<style>
    .small{
        font-size: 12px;
    }
</style>
@endpush

@push('script')

    <script>
        $(document).on('submit', '#coinForm', function (e) {
            e.preventDefault();
            let formData = new FormData($('#coinForm')[0])
            $.ajax({
                type: "POST",
                url: "{{route('admin.coin.update')}}",
                data: formData,
                dataType: "json",
                processData: false,
                dataType: 'json',
                contentType: false,
                success: function (res) {
                    console.log(res);
                    notifyMsg(res.msg,res.cls)
                    if(res.img != ''){
                        $('.coinImg').attr('src', `{{ asset('assets/images/custom_coin/${res.img}') }}`);
                        // $('.coinImg').attr('src', '/assets/images/custom_coin/'+res.img);
                    }
                }
            });

        });
    </script>
@endpush

