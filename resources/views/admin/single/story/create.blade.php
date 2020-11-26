@extends('admin.app')
@section('main-content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Add New Success Story</h2>
            <a href="{{route('admin.story.index')}}" class="btn btn-outline-primary btn-sm text-uppercase">
                <i class="fa fa-list"></i> Success Story List
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('admin.story.store')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="form-group">
                    <label for="name">Person Name : </label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Category Name" autocomplete="off" value="{{old('name')}}">
                    @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="designation">Designation : </label>
                    <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" placeholder="Ex: Student" autocomplete="off" value="{{old('designation')}}">
                    @error('designation')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="story">Success Story : </label>
                    <textarea name="story" id="story" rows="5" class="form-control  @error('story') is-invalid @enderror">{{old('story')}}</textarea>
                    @error('story')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="rating">Rating : </label>
                    <select name="rating" id="rating" class="form-control @error('rating') is-invalid @enderror">
                        <option value="">Select a Rating</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    @error('rating')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="image">Image : </label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
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
