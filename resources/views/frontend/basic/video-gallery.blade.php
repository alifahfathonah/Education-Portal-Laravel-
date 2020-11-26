@extends('frontend.layouts.innerapp')
@section('page-name')
    Video Gallery
@endsection
@section('main-content')
    <div class="video-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
                    <div class="section-heading">
                        <h2 class="section__title">Video Gallery</h2>
                        <span class="section__divider"></span>
                    </div>
                </div>
                @foreach($videos as $video)
                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                        <div class="videos">
                            <iframe  src="{{$video->link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div>
                            <p style="margin-top: 5px;">{{$video->title}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
