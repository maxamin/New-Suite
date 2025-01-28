@extends('admin.partials.master')

@push('style')
@endpush

@section('admin_content')
    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-12">
                <form action="{{route('admin.setting.insert')}}" method="POST" enctype="multipart/form-data">@csrf
                    <input type="hidden" name="id" value="{{$data ? $data->id : ''}}">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <div class="d-flex justify-content-between">
                                    <div>{{$data ? 'Update' : 'Create New'}} Settings</div>
                                </div>
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <!-- <div class="col-sm-12 mt-2">
                                        <div class="row">
                                            <div class="col-sm-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Upload Logo <small>{Suggestion:
                                                                    size 80X80(px)}</small> </label>
                                                            <div class="custom-file">
                                                                <input type="file" name="logo"
                                                                       class="custom-file-input is-valid" id="inputGroupFile01"
                                                                       @if(!$data) required
                                                                       @else @endif onchange="showPreview(event)">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                    file</label>
                                                                <div class="valid-feedback">
                                                                    <i class="bx bx-radio-circle"></i>
                                                                    Note: Logo image mandatory
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="image_preview">
                                                            <img
                                                                src="{{$data ? asset(view_image($data->logo)) :  asset(not_found_img())}}"
                                                                id="file-ip-1-preview" class="rounded" alt="Preview Image"
                                                                style="width: 100px;height: 100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 mt-2">
                                        <div class="row">
                                            <div class="col-sm-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Upload favicon <small>{Suggestion:
                                                                    size 20X20(px)}</small> </label>
                                                            <div class="custom-file">
                                                                <input type="file" name="favicon"
                                                                       class="custom-file-input is-valid" id="inputGroupFile01"
                                                                       @if(!$data) required
                                                                       @else @endif onchange="showPreviewFavicon(event)">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                    file</label>
                                                                <div class="valid-feedback">
                                                                    <i class="bx bx-radio-circle"></i>
                                                                    Note: favicon image mandatory
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="image_preview">
                                                            <img
                                                                src="{{$data ? asset(view_image($data->favicon)) :  asset(not_found_img())}}"
                                                                id="favicon" class="rounded" alt="Preview Image"
                                                                style="width: 100px;height: 100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="col-sm-6">
                                        <label for="site_name">Site Name</label>
                                        <input type="text" class="form-control is-valid"
                                               name="site_name" id="site_name"
                                               placeholder="Site name" value="{{$data ? $data->site_name : ''}}" required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="site_title">Site Title</label>
                                        <input type="text" class="form-control is-valid"
                                               name="site_title" id="site_title"
                                               placeholder="Site title" value="{{$data ? $data->site_title : ''}}" required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="cur_text">Currency Name</label>
                                        <input type="text" class="form-control is-valid"
                                               name="cur_text" id="cur_text"
                                               placeholder="Currency" value="{{$data ? $data->cur_text : ''}}" required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="cur_sym">Currency Symbol</label>
                                        <input type="text" class="form-control is-valid"
                                               name="cur_sym" id="cur_sym"
                                               placeholder="Currency Symbol" value="{{$data ? $data->cur_sym : ''}}" required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="site_title">Timezone</label>
                                        <select name="timezone"  class="form-control is-valid">
                                            @foreach($timezones as $timezone)
                                            <option value="'{{ @$timezone}}'" @if(config('app.timezone')==$timezone) selected @endif>{{ __($timezone) }}</option>
                                            @endforeach

                                        </select>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="welcome_bonus">Registration Bonus</label>
                                        <input type="number" class="form-control is-valid"
                                               name="welcome_bonus" id="welcome_bonus"
                                               placeholder="Welcome Bonus" value="{{$data ? $data->welcome_bonus : old('welcome_bonus')}}">
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="telegram">Telegram Group</label>
                                        <input type="text" class="form-control is-valid"
                                               name="telegram" id="telegram"
                                               placeholder="Telegram Link" value="{{$data ? $data->telegram : old('telegram')}}">
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is optional
                                        </div>
                                    </div>
                                    
                                    {{-- <div class="col-sm-6">
                                        <label for="rate">USDT Rate</label>
                                        <input type="text" class="form-control is-valid"
                                               name="rate" id="rate"
                                               placeholder="rate" value="{{$data ? $data->rate : old('rate')}}">
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is optional
                                        </div>
                                    </div> --}}


                                    <div class="col-sm-6">
                                        <label for="checkin_bonus">Checkin bonus</label>
                                        <input type="text" class="form-control is-valid"
                                               name="checkin_bonus" id="checkin_bonus"
                                               placeholder="checkin_bonus" value="{{$data ? $data->checkin_bonus : old('checkin_bonus')}}">
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is optional
                                        </div>
                                    </div>
                                    
                                    


                                    <div class="col-sm-6">
                                        <label for="telegram">Telegram Channel</label>
                                        <input type="text" class="form-control is-valid"
                                               name="telegram" id="telegram"
                                               placeholder="Telegram Channel Link" value="{{$data ? $data->whatsapp : old('telegram')}}">
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is optional
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="whatsapp">Telegram Group</label>
                                        <input type="text" class="form-control is-valid"
                                               name="whatsapp" id="whatsapp"
                                               placeholder="Telegram Group Link" value="{{$data ? $data->whatsapp : old('whatsapp')}}">
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is optional
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="w_two">Telegram Text 1</label>
                                        <input type="text" class="form-control is-valid"
                                               name="w_two" id="w_two"
                                               placeholder="w_two" value="{{$data ? $data->w_two : old('w_two')}}">
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is optional
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="w_one">Telegram Text 2</label>
                                        <input type="text" class="form-control is-valid"
                                               name="w_one" id="w_one"
                                               placeholder="Telegram Text" value="{{$data ? $data->w_one : old('w_one')}}">
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is optional
                                        </div>
                                    </div>

                                    {{-- <div class="col-sm-6">
                                        <label for="w_three">whatsapp three</label>
                                        <input type="text" class="form-control is-valid"
                                               name="w_three" id="w_three"
                                               placeholder="purchase_summery" value="{{$data ? $data->w_three : old('w_three')}}">
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is optional
                                        </div>
                                    </div> --}}

                                    <div class="col-sm-6">
                                        <label for="about">About us</label>
                                        <textarea class="form-control is-valid" name="about" id="about" placeholder="About Us">{{$data ? $data->about : old('about')}}</textarea>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is optional
                                        </div>
                                    </div>
                                

                                    <!-- <div class="col-sm-6">
                                        <label for="task_summery">Task Summary</label>
                                        <input type="text" class="form-control is-valid"
                                               name="task_summery" id="task_summery"
                                               placeholder="task_summery" value="{{$data ? $data->task_summery : old('task_summery')}}">
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is optional
                                        </div>
                                    </div> -->

                                    <div class="col-sm-6">
                                        <label for="purchase_summery">Purchase Summary</label>
                                        <textarea class="form-control is-valid" name="purchase_summery" id="whatsapp" placeholder="Purchase Summary">{{$data ? $data->purchase_summery : old('purchase_summery')}}</textarea>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is optional
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="recharge_notice">Recharge Notice</label>
                                        <textarea class="form-control is-valid" name="recharge_notice" id="recharge_notice" placeholder="Recharge Summary">{{$data ? $data->recharge_notice : old('recharge_notice')}}</textarea>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is optional
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="withdraw_notice">Withdraw Notice</label>
                                        <textarea class="form-control is-valid" name="withdraw_notice" id="withdraw_notice" placeholder="Withdraw Summary">{{$data ? $data->withdraw_notice : old('withdraw_notice')}}</textarea>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is optional
                                        </div>
                                    </div>


                                    <div class="col-sm-6">
                                        <label for="income_summery">Income Summary</label>
                                        <textarea class="form-control is-valid" name="income_summery" placeholder="Income Summary">{{$data ? $data->income_summery : old('income_summery')}}</textarea>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is optional
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="invite_summery">Invite Box 1 Notice</label>
                                        <textarea class="form-control is-valid" name="invite_summery" id="invite_summery" placeholder="Invite Box 1 Summary">{{$data ? $data->invite_summery : old('invite_summery')}}</textarea>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is optional
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="invite_summery_2">Invite Box 2 Notice</label>
                                        <textarea class="form-control is-valid" name="invite_summery_2" id="invite_summery_2" placeholder="Invite Box 1 Summary">{{$data ? $data->invite_summery_2 : old('invite_summery_2')}}</textarea>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is optional
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="invite_summery_3">Invite Box 3 Notice</label>
                                        <textarea class="form-control is-valid" name="invite_summery_3" id="invite_summery_3" placeholder="Invite Box 3 Summary">{{$data ? $data->invite_summery_3 : old('invite_summery_3')}}</textarea>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is optional
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <label for="about">Popup Message</label>
                                        <textarea class="form-control is-valid" name="popup_message" id="editor" placeholder="Popup Message">{{$data ? $data->popup_message : old('popup_message')}}</textarea>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is optional
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 mt-2">
                                        <label for="">Auto Deposit</label>
                                        <select name="auto_deposit"  class="form-control form-control-lg">
                                            <option value="1" @if($data->auto_deposit == 1) selected @endif>Enabled</option>
                                            <option value="0" @if($data->auto_deposit == 0) selected @endif>Disabled</option>

                                        </select>
                                    </div>

                                    <div class="form-group col-sm-6 mt-2">
                                        <label for="">Auto Payout</label>
                                        <select name="auto_transfer"  class="form-control form-control-lg">
                                            <option value="1" @if($data->auto_transfer == 1) selected @endif>Enabled</option>
                                            <option value="0" @if($data->auto_transfer == 0) selected @endif>Disabled</option>

                                        </select>
                                    </div>

                                    <div class="form-group col-sm-6 mt-2">
                                        <label for="">Open Deposit</label>
                                        <select name="open_deposit"  class="form-control form-control-lg">
                                            <option value="1" @if($data->open_deposit == 1) selected @endif>Yes</option>
                                            <option value="0" @if($data->open_deposit == 0) selected @endif>No</option>

                                        </select>
                                    </div>

                                    <div class="form-group col-sm-6 mt-2">
                                        <label for="">Open Payout</label>
                                        <select name="open_payout"  class="form-control form-control-lg">
                                            <option value="1" @if($data->open_payout == 1) selected @endif>Yes</option>
                                            <option value="0" @if($data->open_payout == 0) selected @endif>No</option>

                                        </select>
                                    </div>

                                    <div class="form-group col-sm-6 mt-2">
                                        <label for="">Auto Default Payout Method</label>
                                        <select name="auto_transfer_default"  class="form-control form-control-lg" require>
                                            @foreach($paymentMethod as $method)
                                                <option value="{{ $method['tag'] }}" @if($data->auto_transfer_default ==$method['tag']) selected @endif>{{ $method['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-sm-12 mt-3">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>

                                </div>

                                

                                

                                

                            </div>
                        </div>
                    </div>

                    <!-- Form Submit Button -->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">
                                <div class="d-flex justify-content-between">
                                    <div style="margin-top: .7rem !important">
                                        Submit Your Information
                                    </div>
                                    <div>
                                        <div class="form-group mb-0">
                                            <button type="submit" class="btn btn-success"><i
                                                    class="bx bx-plus"></i>{{$data ? 'Update' : 'Submit'}} </button>
                                        </div>
                                    </div>
                                </div>
                            </h6>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    function showPreview(event){
        if(event.target.files.length > 0){
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("file-ip-1-preview");
            preview.src = src;
            preview.style.display = "block";
        }
    }
    function showPreviewFavicon(event){
        if(event.target.files.length > 0){
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("favicon");
            preview.src = src;
            preview.style.display = "block";
        }
    }
</script>

<script src="{{asset(admin_file_root())}}/app-assets/js/nicEdit.js"></script>

<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
@endpush