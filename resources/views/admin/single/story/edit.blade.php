@extends('admin.app')
@section('main-content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Edit Success Story</h2>
            <a href="{{route('admin.story.index')}}" class="btn btn-outline-primary btn-sm text-uppercase">
                <i class="fa fa-list"></i> Success Story List
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('admin.story.update',['id'=>$story->id])}}" method="post" enctype="multipart/form-data">@csrf
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="name">Person Name : </label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Category Name" autocomplete="off" value="{{$story->name}}">
                    @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="designation">Designation : </label>
                    <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" placeholder="Ex: Student" autocomplete="off" value="{{$story->designation}}">
                    @error('designation')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="story">Success Story : </label>
                    <textarea name="story" id="story" rows="5" class="form-control  @error('story') is-invalid @enderror">{{$story->story}}</textarea>
                    @error('story')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="rating">Rating : </label>
                    <select name="rating" id="rating" class="form-control @error('rating') is-invalid @enderror">
                        <option value="">Select a Rating</option>
                        <option @if($story->rating === 1) selected @endif value="1">1</option>
                        <option @if($story->rating === 2) selected @endif value="2">2</option>
                        <option @if($story->rating === 3) selected @endif value="3">3</option>
                        <option @if($story->rating === 4) selected @endif value="4">4</option>
                        <option @if($story->rating === 5) selected @endif value="5">5</option>
                    </select>
                    @error('rating')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label style="display: block" for="exampleFormControlFile2">Current Image : <a target="_blank" class="btn btn-warning pull-right" href="{{url('uploads/story/main/'.$story->image)}}"><i class="fa fa-eye"></i> View Large Image</a></label>
                    <img style="max-width: 130px;height: auto;" src="{{url('uploads/story/main/'.$story->image)}}" alt="">
                </div>
                <div class="form-group">
                    <label for="image">Image : </label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="status">Select Status :</label>
                    <select name="status" id="status" class="form-control">
                        <option @if($story->status === 1) selected @endif value="1">Active</option>
                        <option @if($story->status === 0) selected @endif value="0">Inactive</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit"> <i class="fa fa-save fa-fw"></i>Update</button>
            </form>
        </div>
    </div>
@endsection
