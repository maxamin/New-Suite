@extends('admin.partials.master')
@section('admin_content')

<!-- Begin Page Contenth -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">News</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">List News</h6>
            <div class="float-right"><a class="btn btn-primary" href="{{ route('admin.news.create') }}"><i class="fa fa-plus"></i> Add</a></div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th> name</th>

                            <th>Images</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blog as $key => $news)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $news->name }}</td>



                            <td><img src="{{ asset($news->image) }}" style="width:120px;height:70px"></td>
                            <td>
                                <a href="{{ route('admin.news.edit',$news->id) }}" class="btn btn-primary btn-circle"><i class="bx bx-pencil"></i></a>
                                <a href="{{ route('admin.news.delete',$news->id) }}" class="btn btn-danger btn-circle delete_confirm{{$news->id}}"><i class="bx bx-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection

@section('script')
@endsection
