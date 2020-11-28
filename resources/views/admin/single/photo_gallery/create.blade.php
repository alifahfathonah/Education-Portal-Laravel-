@extends('admin.app')
@section('main-content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Add New Photo</h2>
            <a href="{{route('admin.photo.gallery.index')}}" class="btn btn-outline-primary btn-sm text-uppercase">
                <i class="fa fa-list"></i> Photo List
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('admin.photo.gallery.store')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="form-group">
                    <label for="title">Photo Title :</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}">
                    @error('title')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="year">Select Year :</label>
                    <select class="form-control @error('year') is-invalid @enderror" id="year" name="year">
                        <option value="">Select a Year</option>
                        @foreach($years as $year)
                            <option value="{{$year->id}}">{{$year->name}}</option>
                        @endforeach
                    </select>
                    @error('category')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Thumbnail Image : (Max 2 MB)</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="exampleFormControlFile1" name="image">
                    @error('image')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="category">Select Status :</label>
                    <select name="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit"> <i class="fa fa-save fa-fw"></i>Save</button>
            </form>
        </div>
    </div>
@endsection
