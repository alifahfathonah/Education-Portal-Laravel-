@extends('frontend.layouts.homeapp')
@section('main-content')

    <section class="category-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-heading">
                        <h2 class="section__title">Current Events & Program</h2>
                        <span class="section__divider"></span>
                    </div><!-- end section-heading -->
                    <div class="row category-wrapper">
                        @foreach($events as $event)
                            <div class="col-lg-4">
                            <div class="category-item">
                                <img src="{{url('uploads/event/thumb/'.$event->thumb)}}" alt="">
                                <div class="category-content">
                                    <h3 class="cat__title">{{$event->short_title}}</h3>
                                    <p class="cat__meta">{{\Carbon\Carbon::parse($event->start_date)->isoFormat('Do MMM, YYYY')}}</p>
                                    <a href="{{route('user.event.detail',['slug'=>$event->slug])}}" class="cat__link">explore now</a>
                                </div><!-- end category-content -->
                            </div><!-- end category-item -->
                        </div>
                        @endforeach
                    </div><!-- end row -->
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <a href="{{route('user.event')}}" class="theme-btn">More Events</a>
                        </div>
                    </div>
                </div><!-- end col-lg-9 -->

                <div class="col-lg-4">
                    <div class="section-heading">
                        <h2 class="section__title">Upcoming Events</h2>
                        <span class="section__divider"></span>
                    </div><!-- end section-heading -->
                    <div class="upcoming-event-box">
                        @foreach($upcomingEvents as $upComing)
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="{{url('uploads/event/thumb/'.$upComing->thumb)}}" class="card-img" alt="...">
                                    </div>
                                    <div class="col-md-8 align-self-center">
                                        <div class="card-body">
                                            <p class="card-text">{{$upComing->short_title}}</p>
                                            <p class="card-text"><small class="text-muted">{{\Carbon\Carbon::parse($upComing->start_date)->isoFormat('Do MMM, YYYY')}}</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end category-area -->

@endsection
