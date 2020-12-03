@extends('admin.app')
@section('main-content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Add New Activity Post</h2>
            <a href="{{route('admin.activity.post.index')}}" class="btn btn-outline-primary btn-sm text-uppercase">
                <i class="fa fa-list"></i> Activity Post List
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('admin.activity.post.store')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="form-group">
                    <label for="title">Post Title :</label>
                    <textarea class="form-control @error('title') is-invalid @enderror" id="title" name="title"  rows="3">{{\Illuminate\Support\Facades\Input::old('title')}}</textarea>
                    @error('title')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="short_title">Short Title : </label>
                    <input type="text" name="short_title" id="short_title" class="form-control @error('short_title') is-invalid @enderror" value="{{old('short_title')}}">
                    @error('short_title')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="logo">Thumbnail Image : (Max : 512 KB)</label>
                    <input type="file" class="form-control @error('logo') is-invalid @enderror" id="exampleFormControlFile1" name="logo">
                    @error('logo')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="activity-name" style="display: block;overflow: hidden">Connect To Activity : (If Don't want to connect now, Leave it.)</label>
                    <select class="js-example-basic-multiple form-control" name="activity[]" multiple="multiple">
                        @foreach($activities as $activity)
                            <option value="{{$activity->id}}">{{$activity->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="activity-name" style="display: block;overflow: hidden">Connect To Activity Panel : (If Don't want to connect now, Leave it.)</label>
                    <select class="js-example-basic-multiple form-control" name="activity_panel[]" multiple="multiple">
                        @foreach($panelNames as $panelName)
                            <option value="{{$panelName->id}}">{{$panelName->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Content :</label>
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

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link href="{{asset('backend/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('js')
    <script src="{{asset('backend/assets/plugins/jekyll-search.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $('#description').summernote({
            height:800
        });
    </script>
@endsection

