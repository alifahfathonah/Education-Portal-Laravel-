@extends('frontend.layouts.innerapp')
@section('page-name')
    Photo Gallery
@endsection
@section('main-content')
    <section class="photo-gallery">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>{{$year}} - Photo gallery</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                @foreach($photos as $photo)
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 pl-0 pr-0">
                    <div class="inner">
                        <div class="image">
                            <a class="test-popup-link" href="{{url('uploads/gallery/main/'.$photo->image)}}">
                                <img src="{{url('uploads/gallery/thumb/'.$photo->thumb)}}">
                                <span class="overlay"></span>
                                <i class="fa fa-search-plus"></i>
                                <p>{{$photo->title}}</p>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script type="text/javascript">
        $('.test-popup-link').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            },
        });
    </script>
@endsection
