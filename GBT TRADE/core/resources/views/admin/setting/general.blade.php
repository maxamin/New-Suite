@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 col-md-12 mb-30">
            <div class="card">
                <div class="card-body">

                    <form id="generalForm" action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group ">
                                    <label> @lang('Site Title')</label>
                                    <input class="form-control" type="text" name="site_name" required value="{{$general->site_name}}">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group ">
                                    <label>@lang('Currency')</label>
                                    <input class="form-control" type="text" name="cur_text" required value="{{$general->cur_text}}">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group ">
                                    <label>@lang('Currency Symbol')</label>
                                    <input class="form-control" type="text" name="cur_sym" required value="{{$general->cur_sym}}">
                                </div>
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label> @lang('Timezone')</label>
                                <select class="select2-basic" name="timezone">
                                    @foreach($timezones as $timezone)
                                    <option value="'{{$timezone}}'">{{ __($timezone) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label> @lang('Site Base Color')</label>
                                <div class="input-group">
                                    <span class="input-group-text p-0 border-0">
                                        <input type='text' class="form-control colorPicker" value="{{$general->base_color}}"/>
                                    </span>
                                    <input type="text" class="form-control colorCode" name="base_color" value="{{ $general->base_color }}"/>
                                </div>
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label> @lang('Site Secondary Color')</label>
                                <div class="input-group">
                                    <span class="input-group-text p-0 border-0">
                                        <input type='text' class="form-control colorPicker" value="{{$general->secondary_color}}"/>
                                    </span>
                                    <input type="text" class="form-control colorCode" name="secondary_color" value="{{ $general->secondary_color }}"/>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label> @lang('Registration Bonus')</label>
                                    <div class="input-group">
                                        <input class="form-control" type="number" step="any" name="registration_bonus" required value="{{getAmount($general->registration_bonus)}}">
                                        <span class="input-group-text">{{ __($general->cur_text) }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label> @lang('Default Plan')</label>
                                    <select class="form-control" name="default_plan">
                                        <option value="">@lang('Select One')</option>
                                        <option value="0">@lang('None')</option>
                                        @foreach($plans as $plan)
                                            <option value="{{ $plan->id }}">{{ __($plan->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label> @lang('Balance Transfer Fixed Charge')</label>
                                    <div class="input-group">
                                        <input class="form-control" type="number" step="any" name="bt_fixed" required value="{{getAmount($general->bt_fixed)}}">
                                        <span class="input-group-text">{{ __($general->cur_text) }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label> @lang('Balance Transfer Percent Charge')</label>
                                    <div class="input-group">
                                        <input class="form-control" type="number" step="any" name="bt_percent" required value="{{getAmount($general->bt_percent)}}">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6" hidden>
                                <div class="form-group">
                                    <label> @lang('Trade Stop Charge')</label>
                                    <div class="input-group">
                                        <input class="form-control" type="number" step="any" name="trade_stop_charge" required value="{{getAmount(1)}}">
                                        <span class="input-group-text">{{$general->cur_text}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label class="text-danger">
                                        @lang('Holiday One')
                                    </label>
                                    <select class="form-control" name="holiday1">
                                        <option>Select Holiday</option>
                                        <option @selected($general->holiday1 == null) value="0">No Off Day</option>
                                        <option @selected($general->holiday1 == 'Sun') value="Sun">Sunday</option>
                                        <option @selected($general->holiday1 == 'Mon') value="Mon">Monday</option>
                                        <option @selected($general->holiday1 == 'Tue') value="Tue">Tuesday</option>
                                        <option @selected($general->holiday1 == 'Wed') value="Wed">Wednesday</option>
                                        <option @selected($general->holiday1 == 'Thu') value="Thu">Thursday</option>
                                        <option @selected($general->holiday1 == 'Fri') value="Fri">Friday</option>
                                        <option @selected($general->holiday1 == 'Sat') value="Sat">Saturday</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label class="text-danger">
                                        @lang('Holiday Two')
                                    </label>
                                    <select class="form-control" name="holiday2">
                                        <option>Select Holiday</option>
                                        <option @selected($general->holiday2 == null) value="0">No Off Day</option>
                                        <option @selected($general->holiday2 == 'Sun') value="Sun">Sunday</option>
                                        <option @selected($general->holiday2 == 'Mon') value="Mon">Monday</option>
                                        <option @selected($general->holiday2 == 'Tue') value="Tue">Tuesday</option>
                                        <option @selected($general->holiday2 == 'Wed') value="Wed">Wednesday</option>
                                        <option @selected($general->holiday2 == 'Thu') value="Thu">Thursday</option>
                                        <option @selected($general->holiday2 == 'Fri') value="Fri">Friday</option>
                                        <option @selected($general->holiday2 == 'Sat') value="Sat">Saturday</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn--primary w-100 h-45">@lang('Submit')</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-lib')
    <script src="{{ asset('assets/admin/js/spectrum.js') }}"></script>
@endpush

@push('style-lib')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/spectrum.css') }}">
@endpush

@push('script')

    <script>
        $(document).on('submit', '#generalForm', function (e) {
            e.preventDefault();
            let formData = new FormData($('#generalForm')[0])
            $.ajax({
                type: "POST",
                url: "{{route('admin.setting.update')}}",
                data: formData,
                dataType: "json",
                processData: false,
                dataType: 'json',
                contentType: false,
                success: function (res) {
                    console.log(res);
                    $(".pageTitle").html(res.site_name+" - {{$pageTitle}}");;
                    notifyMsg(res.msg,res.cls)
                }
            });

        });
    </script>

    <script>
        (function ($) {
            "use strict";
            $('.colorPicker').spectrum({
                color: $(this).data('color'),
                change: function (color) {
                    $(this).parent().siblings('.colorCode').val(color.toHexString().replace(/^#?/, ''));
                }
            });

            $('.colorCode').on('input', function () {
                var clr = $(this).val();
                $(this).parents('.input-group').find('.colorPicker').spectrum({
                    color: clr,
                });
            });

            $('select[name=timezone]').val("'{{ config('app.timezone') }}'").select2();
            $('.select2-basic').select2({
                dropdownParent:$('.card-body')
            });

            $('[name=default_plan]').val('{{ $general->default_plan }}');

            $('[name=balance_transfer]').on('change', function () {
                var isCheck = $(this).prop('checked');
                if (isCheck == true) {
                    $('[name=bt_fixed]').removeAttr('readonly')
                    $('[name=bt_percent]').removeAttr('readonly')
                } else {
                    $('[name=bt_fixed]').attr('readonly',true)
                    $('[name=bt_percent]').attr('readonly',true)
                }
            }).change();

        })(jQuery);

    </script>
@endpush

