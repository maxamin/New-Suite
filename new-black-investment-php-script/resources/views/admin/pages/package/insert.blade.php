@extends('admin.partials.master')
@section('admin_content')
    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-12">
                <form action="{{route('admin.package.insert')}}" method="POST" enctype="multipart/form-data">@csrf
                    <input type="hidden" name="id" value="{{$data ? $data->id : ''}}">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <div class="d-flex justify-content-between">
                                    <div>{{$data ? 'Update' : 'Create New'}} Package</div>
                                    <div>
                                        <a href="{{route('admin.package.index')}}" class="btn btn-primary btn-sm"> <i
                                                class="bx bx-left-arrow"></i> Package List</a>
                                    </div>
                                </div>
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="for_vip">For VIP?</label>
                                        <select name="for_vip"  class="form-control is-valid" required>
                                            <option value="1" @if($data && $data->for_vip == 1) selected @endif>Yes</option>
                                            <option value="0" @if($data && $data->for_vip == 0) selected @endif>No</option>

                                        </select>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="vip_id">VIP Type</label>
                                        <select name="vip_id"  class="form-control is-valid" required>
                                            @foreach($vipTypes as $type)
                                                <option value="{{ $type->id }}" @if($data && $data->vip_id == $type->id) selected @endif>{{ $type->name }}</option>
                                            @endforeach

                                        </select>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="vip_id">Category</label>
                                        <select name="category_id"  class="form-control is-valid" required>
                                            @foreach($categories as $cate)
                                                <option value="{{ $cate->id }}" @if($data && $data->category_id == $cate->id) selected @endif>{{ $cate->name }}</option>
                                            @endforeach

                                        </select>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="name">Package Name</label>
                                        <input type="text" class="form-control is-valid"
                                               name="name" id="name"
                                               placeholder="Name" value="{{$data ? $data->name : ''}}" required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control is-valid"
                                               name="title" id="title"
                                               placeholder="title" value="{{$data ? $data->title : ''}}" required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="has_limit">Has Limit?</label>
                                        <select name="has_limit"  class="form-control is-valid" required>
                                            <option value="1" @if($data && $data->has_limit == 1) selected @endif>Yes</option>
                                            <option value="0" @if($data && $data->has_limit == 0) selected @endif>No</option>

                                        </select>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="buy_limit">Buy Limit</label>
                                        <input type="text" class="form-control is-valid"
                                               name="buy_limit" id="buy_limit"
                                               placeholder="Buy Limit" value="{{$data ? $data->buy_limit : ''}}" required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    <div class="col-sm-12 mt-2">
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <fieldset class="form-group">
                                                    <label for="basicInputFile">Upload Photo <small>{Suggestion:
                                                            size 200X200(px)}</small> </label>
                                                    <div class="custom-file">
                                                        <input type="file" name="photo"
                                                               class="custom-file-input is-valid" id="inputGroupFile01"
                                                               @if(!$data) required
                                                               @else @endif onchange="showPreview(event)">
                                                        <label class="custom-file-label" for="inputGroupFile01">Choose
                                                            file</label>
                                                        <div class="valid-feedback">
                                                            <i class="bx bx-radio-circle"></i>
                                                            Note: Package image mandatory
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="image_preview">
                                                    <img
                                                        src="{{$data ? asset(view_image($data->photo)) :  asset(not_found_img())}}"
                                                        id="file-ip-1-preview" class="rounded" alt="Preview Image"
                                                        style="width: 100px;height: 100px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-2">
                                        <label for="price">Price</label>
                                        <input type="text" class="form-control is-valid"
                                               name="price" id="price"
                                               placeholder="Price" value="{{$data ? $data->price : ''}}" required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-2">
                                        <label for="earn_type">Earning Receive</label>
                                        <select name="earn_type"  class="form-control is-valid" required>
                                            <option value="daily" @if($data && $data->earn_type == 'daily') selected @endif>Daily</option>
                                            <option value="days" @if($data && $data->earn_type == 'days') selected @endif>Fixed (After validity days completed)</option>

                                        </select>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="validity">Validity days</label>
                                        <input type="text" class="form-control is-valid"
                                               oninput="calculateHour(this)"
                                               name="validity" id="validity"
                                               placeholder="Validity days" value="{{$data ? $data->validity : ''}}" required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    {{--<div class="col-sm-6">
                                        <label for="hours">Validity Hours</label>
                                        <input type="text" class="form-control is-valid"
                                               name="hours" id="hours"
                                               placeholder="Validity hours" value="{{$data ? $data->hours : ''}}" required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div> --}}

                                    <div class="col-sm-6">
                                        <label for="interest">Commission Per every Day</label>
                                        <input type="text" class="form-control is-valid"
                                               name="interest" id="interest"
                                               placeholder="Package commission" value="{{$data ? $data->interest : ''}}" required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-2">
                                        <label for="p_status">Buy Status</label>
                                        <select name="p_status"  class="form-control is-valid" required>
                                            <option value="in_stock" @if($data && $data->p_status == 'in_stock') selected @endif>In Stock</option>
                                            <option value="sold_out" @if($data && $data->p_status == 'sold_out') selected @endif>Sold Out</option>

                                        </select>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-2">
                                        <label for="status">Status</label>
                                        <select name="status"  class="form-control is-valid" required>
                                            <option value="active" @if($data && $data->p_status == 'active') selected @endif>Active</option>
                                            <option value="inactive" @if($data && $data->p_status == 'inactive') selected @endif>Inactive</option>

                                        </select>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
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
                                        Submit Your Package Information
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
        function showPreview(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
        function calculateHour(_this){
            document.getElementById('hours').value = _this.value * 24
        }
    </script>
@endsection
