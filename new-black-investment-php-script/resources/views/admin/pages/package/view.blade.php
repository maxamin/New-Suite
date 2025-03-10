@extends('admin.partials.master')
@section('admin_content')
    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title">
                            <div class="d-flex justify-content-between">
                                <div>Package Details</div>
                                <div><a href="{{route('admin.package.index')}}" class="btn btn-primary btn-sm"> <i class="bx bx-plus"></i> Package Lists </a> </div>
                            </div>
                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Package Name</td>
                                        <td>{{$data->name}}</td>
                                    </tr>

                                    <tr>
                                        <td>Title</td>
                                        <td>{{$data->title}}</td>
                                    </tr>

                                    <tr>
                                        <td>Photo</td>
                                        <td>
                                            <img src="{{asset($data->photo)}}" width="70">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Price</td>
                                        <td>{{price($data->price)}}</td>
                                    </tr>

                                    <tr>
                                        <td>Code</td>
                                        <td>{{$data->code}}</td>
                                    </tr>

                                    <tr>
                                        <td>Validity</td>
                                        <td>{{$data->validity}} Days</td>
                                    </tr>

                                    <tr>
                                        <td>Validity Hours</td>
                                        <td>{{$data->hours}}  Hours</td>
                                    </tr>

                                    <tr>
                                        <td>Commission</td>
                                        <td>{{price($data->interest)}}</td>
                                    </tr>

                                    <tr>
                                        <td>Status</td>
                                        <td>{{$data->status}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


