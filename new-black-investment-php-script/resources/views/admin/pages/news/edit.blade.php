@extends('admin.partials.master')
@section('admin_content')
<link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">News</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Update News</h6>
            <div class="float-right"><a class="btn btn-primary" href="{{ route('admin.news') }}"><i class="fa fa-arrow-left"></i> Back</a></div>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('admin.news.update',$news->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Name</label>
                            <input type="text" class="form-control" name="name" value="{{$news->name}}" required>
                        </div>
                        {{--<div class="form-group">
                            <label>Date</label>
                            <input type="date" class="form-control" name="date" value="{{$news->date}}" required>
                        </div>--}}

                        <div class="form-group">
                            <label> Content</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3">{{$news->content}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Author</label>
                            <input type="text" class="form-control" name="author" value="{{$news->author}}" required>
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>

                        <div class="mb-2">
                            <img src="{{ asset($news->image) }}" style="width:150px;height:70px">
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status"  class="form-control form-control-lg">
                                <option value="1" @if($news->status == 1) selected @endif>Active</option>
                                <option value="2" @if($news->status == 2) selected @endif>Inactive</option>

                            </select>
                        </div>

                        <div class="form-group mt-4">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<script src="{{asset(admin_file_root())}}/app-assets/js/nicEdit.js"></script>

<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>

@endsection
