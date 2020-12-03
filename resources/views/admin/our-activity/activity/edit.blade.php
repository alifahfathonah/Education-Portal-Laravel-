@extends('admin.app')
@section('main-content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Edit Activity</h2>
            <a href="{{route('admin.activity.index')}}" class="btn btn-outline-primary btn-sm text-uppercase">
                <i class="fa fa-list"></i> Activity List
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('admin.activity.update',['id'=>$activity->id])}}" method="post" enctype="multipart/form-data">@csrf
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="title">Activity Name : </label>
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Partner Name" autocomplete="off" value="{{$activity->title}}">
                    @error('title')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label style="display: block" for="exampleFormControlFile2">Current Image : <a target="_blank" class="btn btn-warning pull-right" href="{{url($activity->image)}}"><i class="fa fa-eye"></i> View Large Image</a></label>
                    <img style="max-width: 130px;height: auto;" src="{{url($activity->image)}}" alt="">
                </div>
                <div class="form-group">
                    <label for="image">Activity Logo : (Max : 512 KB)</label>
                    <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" >
                    @error('image')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="status">Select Status :</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit"> <i class="fa fa-save fa-fw"></i>Update</button>
            </form>
        </div>
    </div>
@endsection
