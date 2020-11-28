@extends('admin.app')
@section('main-content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Add New Slider</h2>
            <a href="{{route('admin.slider.index')}}" class="btn btn-outline-primary btn-sm text-uppercase">
                <i class="fa fa-list"></i> Slider List
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('admin.slider.store')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="form-group">
                    <label for="title">Slider Name : </label>
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Slider Title" autocomplete="off" value="{{old('title')}}">
                    @error('title')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="image">Slider Image : (Max : 5MB)</label>
                    <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" >
                    @error('image')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="priority">Slider Priority :</label>
                    <select name="priority" id="priority" class="form-control @error('priority') is-invalid @enderror">
                        <option value="">Select a Priority</option>
                        @foreach($priorities as $priority)
                            <option @foreach($sliders as $slider) @if($priority->id === $slider) disabled @endif @endforeach value="{{$priority->id}}">{{$priority->title}}</option>
                        @endforeach
                    </select>
                    @error('priority')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

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
    <style>
        select option:disabled{
            color: red!important;
            background: #ededed;
        }
    </style>
@endsection
