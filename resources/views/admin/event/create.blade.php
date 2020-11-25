@extends('admin.app')
@section('main-content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Add Event/Campaign</h2>
            <a href="{{route('admin.event.index')}}" class="btn btn-outline-primary btn-sm text-uppercase">
                <i class="fa fa-list"></i> Event/Campaign List
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('admin.event.store')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="form-group">
                    <label for="event_type">Select Type :</label>
                    <select class="form-control @error('event_type') is-invalid @enderror" id="event_type" name="event_type">
                        <option value="">Select a Type</option>
                        <option value="Event">Event</option>
                        <option value="Campaign">Campaign</option>
                    </select>
                    @error('event_type')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="title">Event/Campaign Title :</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}">
                    @error('title')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                </div>
                <div class="form-group">
                    <label for="short_title">Event/Campaign Short Title :</label>
                    <input type="text" class="form-control @error('short_title') is-invalid @enderror" id="short_title" name="short_title" value="{{old('short_title')}}">
                    @error('short_title')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="start_date">Start Date :</label>
                        <input type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" id="start_date" value="{{old('start_date')}}">
                        @error('start_date')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="end_date">End Date :</label>
                        <input type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" id="end_date" value="{{old('end_date')}}">
                        @error('end_date')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Thumbnail Image :</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="exampleFormControlFile1" name="image">
                    @error('image')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="category">Content :</label>
                    <textarea name="description" id="description" class="@error('description') is-invalid @enderror ">{{old('description')}}</textarea>
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
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $('#description').summernote({
            height:800
        });
    </script>
    <script>
        $(document).ready(function (){
            $(document).on('change','#start_date',function (){
                var startDate = $(this);
                var endDate = $('#end_date');
                if (!endDate.val()){

                }else if(new Date(startDate.val()) > new Date(endDate.val())){
                    Swal.fire('Start date must be smaller than End date..')
                    startDate.val('');
                }
            });
            $(document).on('change','#end_date',function (){
                var startDate = $('#start_date');
                var endDate = $(this);
                if (!startDate.val()){
                    Swal.fire('Please give start date..')
                    endDate.val('');
                }else if(new Date(startDate.val()) > new Date(endDate.val())){
                    Swal.fire('Start date must be smaller than End date..')
                    endDate.val('');
                }
            });
        });
    </script>
@endsection

