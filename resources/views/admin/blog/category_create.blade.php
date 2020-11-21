@extends('admin.app')
@section('main-content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Add New Blog Category</h2>
            <a href="{{route('admin.blog.category.index')}}" class="btn btn-outline-primary btn-sm text-uppercase">
                <i class="fa fa-list"></i> Catrgory List
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('admin.blog.category.store')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="form-group">
                    <label for="name">Category Name : </label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Category Name" autocomplete="off" value="{{old('name')}}">
                    @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="status">Select Status :</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit"> <i class="fa fa-save fa-fw"></i>Save</button>
            </form>
        </div>
    </div>
@endsection

@section('js')
    {{--    <script src="{{asset('backend/assets/ckeditor/ckeditor.js')}}"></script>--}}
    <script src="https://ckeditor.com/assets/libs/ckeditor4/4.15.1/ckeditor.js"></script>
    <script>
        $(document).ready(function(){
            CKEDITOR.replace('description');
        });
    </script>
@endsection

