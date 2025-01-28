@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 col-md-12 mb-30">
            <div class="card">
                <div class="card-body">

                    <form id="miningForm" action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group ">
                                    <label> @lang('Coin One')</label>
                                    <input class="form-control" type="text" name="coin_one" required value="{{@$general->coin_one}}">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group ">
                                    <label> @lang('Coin Two')</label>
                                    <input class="form-control" type="text" name="coin_two" required value="{{@$general->coin_two}}">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label class="text-black">
                                        @lang('Buy or Sell')
                                    </label>
                                    <select class="form-control" name="buy_sell">
                                        <option>Select Buy or Sell</option>
                                        <option @selected(@$general->buy_sell == 'Buy') value="Buy">Buy</option>
                                        <option @selected(@$general->buy_sell == 'Sell') value="Sell">Sell</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="form-group ">
                                    <label> @lang('Trade Time Start')</label>
                                    <input class="form-control" type="text" name="trade_time_start" placeholder="05:00pm" required value="{{@$general->trade_time_start}}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group ">
                                    <label> @lang('Trade Time Stop')</label>
                                    <input class="form-control" type="text" name="trade_time_stop" placeholder="05:00pm" required value="{{@$general->trade_time_stop}}">
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="form-group ">
                                    <label> @lang('API Key')</label>
                                    <input class="form-control" type="text" name="cryptocompareApi" required value="{{@$general->cryptocompareApi}}">
                                    <small>Get Api Key <a href="https://min-api.cryptocompare.com/">https://min-api.cryptocompare.com/</a></small>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="form-group ">
                                    <label> @lang('Trade Notice')</label>
                                    <input class="form-control" type="text" name="trade_notice" placeholder="Enter Trade Notice Here" required value="{{@$general->trade_notice}}">
                                </div>
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
        $(document).on('submit', '#miningForm', function (e) {
            e.preventDefault();
            let formData = new FormData($('#miningForm')[0])
            $.ajax({
                type: "POST",
                url: "{{route('admin.mining.update')}}",
                data: formData,
                dataType: "json",
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

