@extends('admin.app')
@section('main-content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Edit Photo</h2>
            <a href="{{route('admin.photo.gallery.index')}}" class="btn btn-outline-primary btn-sm text-uppercase">
                <i class="fa fa-list"></i> Photo List
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('admin.photo.gallery.update',['id'=>$photo->id])}}" method="post" enctype="multipart/form-data">@csrf
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="title">Photo Title :</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{$photo->title}}">
                    @error('title')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="year">Select Year :</label>
                    <select class="form-control @error('year') is-invalid @enderror" id="year" name="year">
                        <option value="">Select a Year</option>
                        @foreach($years as $year)
                            <option @if((int) $year->id === (int) $photo->year) selected @endif value="{{$year->id}}">{{$year->name}}</option>
                        @endforeach
                    </select>
                    @error('category')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label style="display: block" for="exampleFormControlFile2">Current Image : <a target="_blank" class="btn btn-warning pull-right" href="{{url('uploads/gallery/main/'.$photo->image)}}"><i class="fa fa-eye"></i> View Large Image</a></label>
                    <img style="max-width: 500px;height: auto;" src="{{url('uploads/gallery/main/'.$photo->image)}}" alt="">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Thumbnail Image : (Max 2 MB)</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="exampleFormControlFile1" name="image">
                    @error('image')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="status">Select Status :</label>
                    <select id="status" name="status" class="form-control">
                        <option @if($photo->status === 1) selected @endif value="1">Active</option>
                        <option @if($photo->status === 0) selected @endif value="0">Inactive</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit"> <i class="fa fa-save fa-fw"></i>Update</button>
            </form>
        </div>
    </div>
@endsection
