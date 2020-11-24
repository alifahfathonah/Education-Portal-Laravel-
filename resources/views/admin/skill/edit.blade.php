@extends('admin.app')
@section('main-content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Edit Skill</h2>
            <a href="{{route('admin.skill.index')}}" class="btn btn-outline-primary btn-sm text-uppercase">
                <i class="fa fa-list"></i> Skill List
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('admin.event.update',['id'=>$skill->id])}}" method="post" enctype="multipart/form-data">@csrf
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="title">Skill Title :</label>
                    <textarea class="form-control @error('title') is-invalid @enderror" id="title" name="title"  rows="3">{{$skill->title}}</textarea>
                    @error('title')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                </div>
                <div class="form-group">
                    <label for="category">Select Category :</label>
                    <select class="form-control @error('category') is-invalid @enderror" id="category" name="category">
                        <option value="">Select a Category</option>
                        <option value="soft skill" @if($skill->category === 'soft skill') selected @endif>{{ucfirst('soft skill')}}</option>
                        <option value="academic skill" @if($skill->category === 'academic skill') selected @endif>{{ucfirst('academic skill')}}</option>
                        <option value="professional skill" @if($skill->category === 'professional skill') selected @endif>{{ucfirst('professional skill')}}</option>
                    </select>
                    @error('category')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label style="display: block" for="exampleFormControlFile2">Current Image : <a target="_blank" class="btn btn-warning pull-right" href="{{url('uploads/skill/main/'.$skill->image)}}"><i class="fa fa-eye"></i> View Large Image</a></label>
                    <img style="max-width: 130px;height: auto;" src="{{url('uploads/skill/thumb/'.$skill->thumb)}}" alt="">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Thumbnail Image :</label>
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="exampleFormControlFile1" name="image">
                    @error('image')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="category">Content :</label>
                    <textarea name="description" id="description" class="@error('description') is-invalid @enderror">{{$skill->description}}</textarea>
                    @error('description')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="category">Select Status :</label>
                    <select name="status" class="form-control">
                        <option @if($skill->status === 1) selected @endif value="1">Active</option>
                        <option @if($skill->status === 0) selected @endif value="0">Inactive</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">Update</button>
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

