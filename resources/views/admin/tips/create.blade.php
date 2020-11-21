@extends('admin.app')
@section('main-content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Add New Tips and Tricks</h2>
            <a href="{{route('admin.tips.index')}}" class="btn btn-outline-primary btn-sm text-uppercase">
                <i class="fa fa-list"></i> Tips List
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('admin.tips.store')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="form-group">
                    <label for="title">Tips and Tricks Title :</label>
                    <textarea class="form-control @error('title') is-invalid @enderror" id="title" name="title"  rows="3">{{\Illuminate\Support\Facades\Input::old('title')}}</textarea>
                    @error('title')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                </div>
                <div class="form-group">
                    <label for="category">Select Category :</label>
                    <select class="form-control @error('category') is-invalid @enderror" id="category" name="category">
                        <option value="">Select a Category</option>
                        <option value="interview" @if(old('category') === 'interview')selected @endif>{{ucfirst('interview'.' Tips and Tricks')}}</option>
                        <option value="educational" @if(old('category') === 'educational')selected @endif>{{ucfirst('educational'.' Tips and Tricks')}}</option>
                        <option value="career and planing" @if(old('category') === 'career and planing')selected @endif>{{ucfirst('career and planing'.' Tips and Tricks')}}</option>
                        <option value="others" @if(old('category') === 'others')selected @endif>{{ucfirst('others'.' Tips and Tricks')}}</option>
                    </select>
                    @error('category')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Thumbnail Image :</label>
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="exampleFormControlFile1" name="image">
                    @error('image')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="category">Content :</label>
                    <textarea name="description" id="description" class="@error('description') is-invalid @enderror">{{old('description')}}</textarea>
                    @error('description')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
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

@section('js')
    {{--    <script src="{{asset('backend/assets/ckeditor/ckeditor.js')}}"></script>--}}
    <script src="https://ckeditor.com/assets/libs/ckeditor4/4.15.1/ckeditor.js"></script>
    <script>
        $(document).ready(function(){
            CKEDITOR.replace('description');
        });
    </script>
@endsection

