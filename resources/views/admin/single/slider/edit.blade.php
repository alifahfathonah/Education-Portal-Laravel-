@extends('admin.app')
@section('main-content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Edit Slider</h2>
            <a href="{{route('admin.slider.index')}}" class="btn btn-outline-primary btn-sm text-uppercase">
                <i class="fa fa-list"></i> Slider List
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('admin.slider.update',['id'=>$slider->id])}}" method="post" enctype="multipart/form-data">@csrf
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="title">Slider Name : </label>
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Slider Title" autocomplete="off" value="{{$slider->title}}">
                    @error('title')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label style="display: block" for="exampleFormControlFile2">Current Image : <a target="_blank" class="btn btn-warning pull-right" href="{{url('uploads/slider/main/'.$slider->image)}}"><i class="fa fa-eye"></i> View Large Image</a></label>
                    <img style="max-width: 500px;height: auto;" src="{{url('uploads/slider/main/'.$slider->image)}}" alt="">
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
                            <option @foreach($allSlider as $current) @if((int)$current === (int)$priority->id) @if((int)$current != (int)$slider->priority) disabled  @endif @if((int)$current === (int)$slider->priority) selected @endif @endif @endforeach value="{{$priority->id}}">{{$priority->title}}</option>
                        @endforeach
                    </select>
                    @error('priority')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                </div>
                <div class="form-group">
                    <label for="status">Select Status :</label>
                    <select name="status" id="status" class="form-control">
                        <option @if($slider->status === 1) selected @endif value="1">Active</option>
                        <option  @if($slider->status === 0) selected @endif value="0">Inactive</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit"> <i class="fa fa-save fa-fw"></i>Update</button>
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
