@extends('admin.app')
@section('main-content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Edit Event/Campaign</h2>
            <a href="{{route('admin.event.index')}}" class="btn btn-outline-primary btn-sm text-uppercase">
                <i class="fa fa-list"></i> Event/Campaign List
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('admin.event.update',['id'=>$event->id])}}" method="post" enctype="multipart/form-data">@csrf
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="event_type">Select Type :</label>
                    <select class="form-control @error('event_type') is-invalid @enderror" id="event_type" name="event_type">
                        <option value="">Select a Type</option>
                        <option @if($event->event_type === 'Event') selected @endif value="Event">Event</option>
                        <option @if($event->event_type === 'Campaign') selected @endif value="Campaign">Campaign</option>
                    </select>
                    @error('event_type')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="title">Event/Campaign Title :</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{$event->title}}">
                    @error('title')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                </div>
                <div class="form-group">
                    <label for="short_title">Event/Campaign Short Title :</label>
                    <input type="text" class="form-control @error('short_title') is-invalid @enderror" id="short_title" name="short_title" value="{{$event->short_title}}">
                    @error('short_title')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="start_date">Start Date :</label>
                        <input type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" id="start_date" value="{{$event->start_date}}">
                        @error('start_date')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="end_date">End Date :</label>
                        <input type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" id="end_date" value="{{$event->end_date}}">
                        @error('end_date')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label style="display: block" for="exampleFormControlFile2">Current Image : <a target="_blank" class="btn btn-warning pull-right" href="{{url('uploads/event/main/'.$event->image)}}"><i class="fa fa-eye"></i> View Large Image</a></label>
                    <img style="max-width: 130px;height: auto;" src="{{url('uploads/event/thumb/'.$event->thumb)}}" alt="">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Thumbnail Image :</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="exampleFormControlFile1" name="image">
                    @error('image')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="category">Content :</label>
                    <textarea name="description" id="description" class="@error('description') is-invalid @enderror ">{{$event->description}}</textarea>
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

