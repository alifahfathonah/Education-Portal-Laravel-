@extends('admin.app')
@section('main-content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Add New Video</h2>
            <a href="{{route('admin.video.index')}}" class="btn btn-outline-primary btn-sm text-uppercase">
                <i class="fa fa-list"></i> Video List
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('admin.video.store')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="form-group">
                    <label for="name">Video Title : </label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Category Name" autocomplete="off" value="{{old('name')}}">
                    @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="link">Video Link : </label>
                    <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" placeholder="Ex: https://youtube.com" autocomplete="off" value="{{old('link')}}">
                    @error('link')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
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
