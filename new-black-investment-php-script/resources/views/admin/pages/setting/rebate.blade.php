@extends('admin.partials.master')
@section('admin_content')
    <style>
        label {
            text-transform: unset;
        }
    </style>
    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-12">
                <form action="{{route('admin.rebate.insert')}}" method="POST" enctype="multipart/form-data">@csrf
                    <input type="hidden" name="id" value="{{$data ? $data->id : ''}}">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <div class="d-flex justify-content-between">
                                    <div>{{$data ? 'Update' : 'Create New'}} Commission</div>
                                </div>
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 mt-2">
                                        <div class="row">

                                            <div class="col-sm-6">
                                                <label for="interest_commission1">Interest Commission 1 (%)</label>
                                                <input type="text" class="form-control is-valid"
                                                       name="interest_commission1" id="interest_commission1"
                                                       placeholder="interest_commission1"
                                                       value="{{$data ? $data->interest_commission1 : old('interest_commission1')}}">
                                                <div class="valid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    Note: This is filed is optional
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="interest_commission1_flat">Interest Commission 1 (e.g 10.00 not percentage)</label>
                                                <input type="text" class="form-control is-valid"
                                                       name="interest_commission1_flat" id="interest_commission1_flat"
                                                       placeholder="Enter"
                                                       value="{{$data ? $data->interest_commission1_flat : old('interest_commission1_flat')}}">
                                                <div class="valid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    Note: This is filed is optional
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="interest_commission2">Interest Commission 2 (%)</label>
                                                <input type="text" class="form-control is-valid"
                                                       name="interest_commission2" id="interest_commission2"
                                                       placeholder="interest_commission2"
                                                       value="{{$data ? $data->interest_commission2 : old('interest_commission2')}}">
                                                <div class="valid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    Note: This is filed is optional
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="interest_commission2_flat">Interest Commission 2 (e.g 10.00 not percentage)</label>
                                                <input type="text" class="form-control is-valid"
                                                       name="interest_commission2_flat" id="interest_commission2_flat"
                                                       placeholder="Enter"
                                                       value="{{$data ? $data->interest_commission2_flat : old('interest_commission2_flat')}}">
                                                <div class="valid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    Note: This is filed is optional
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="interest_commission3">Interest Commission 3 (%)</label>
                                                <input type="text" class="form-control is-valid"
                                                       name="interest_commission3" id="interest_commission3"
                                                       placeholder="interest_commission3"
                                                       value="{{$data ? $data->interest_commission3 : old('interest_commission3')}}">
                                                <div class="valid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    Note: This is filed is optional
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="interest_commission3_flat">Interest Commission 3 (e.g 10.00 not percentage)</label>
                                                <input type="text" class="form-control is-valid"
                                                       name="interest_commission3_flat" id="interest_commission3_flat"
                                                       placeholder="Enter"
                                                       value="{{$data ? $data->interest_commission3_flat : old('interest_commission3_flat')}}">
                                                <div class="valid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    Note: This is filed is optional
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mt-2">
                                                <label>Rebate Earn Drop Commission 1 (%)</label>
                                                <input type="number" class="form-control is-valid" value="{{ $data->earn_first_level }}" name="earn_first_level">
                                                <div class="valid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    Note: This is filed is optional
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mt-2">
                                                <label>Rebate Earn Drop Commission 2 (%)</label>
                                                <input type="number" class="form-control is-valid" value="{{ $data->earn_second_level }}" name="earn_second_level">
                                                <div class="valid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    Note: This is filed is optional
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Rebate Earn Drop Commission 3 (%)</label>
                                                <input type="number" class="form-control is-valid" value="{{ $data->earn_third_level }}" name="earn_third_level">
                                                <div class="valid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    Note: This is filed is optional
                                                </div>
                                            </div>

                                        </div>
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
    <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }

        function showPreviewFavicon(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("favicon");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
@endsection
