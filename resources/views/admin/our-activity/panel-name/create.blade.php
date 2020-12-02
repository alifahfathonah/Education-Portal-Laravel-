@extends('admin.app')
@section('main-content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Add New Activity Panel</h2>
            <a href="{{route('admin.activity.panel.index')}}" class="btn btn-outline-primary btn-sm text-uppercase">
                <i class="fa fa-list"></i> Panel List
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('admin.activity.panel.store')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="form-group">
                    <label for="title">Panel Name : </label>
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Partner Name" autocomplete="off" value="{{old('title')}}">
                    @error('title')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
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
@section('css')
    <link href="{{asset('backend/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('js')
    <script src="{{asset('backend/assets/plugins/jekyll-search.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/select2/js/select2.min.js')}}"></script>
@endsection
