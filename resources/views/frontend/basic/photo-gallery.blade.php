@extends('frontend.layouts.innerapp')
@section('page-name')
    Photo Gallery
@endsection
@section('main-content')
    @foreach($photoYears as $year)
        @foreach($emptyCheck as $check)
            @if((int)$check === (int)$year->id)
            <section class="photo-gallery">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title">
                                <h2>{{$year->name}} - Photo gallery</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
            <div class="row">
                @foreach($photos as $key => $photo)
                    @if((int)$photo->year === (int) $year->id)
                        @if($key < 8)
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 pl-0 pr-0">
                            <div class="inner">
                                <div class="image">
                                    <a class="test-popup-link" href="{{url('uploads/gallery/main/'.$photo->image)}}">
                                        <img src="{{url('uploads/gallery/thumb/'.$photo->thumb)}}">
                                        <span class="overlay"></span>
                                        <i class="fa fa-search-plus"></i>
                                        <p>Image title</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endif
                @endforeach
                @if(count($photos) > 8)
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 gallery-btn">
                    <a class="theme-btn" href="{{route('user.photo.gallery.year',['id'=>$year->id,'year'=>$year->name])}}">View More</a>
                </div>
                @endif
            </div>
        </div>
            </section>
            @endif
        @endforeach
    @endforeach
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
