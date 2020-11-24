@extends('frontend.layouts.innerapp')
@section('page-name')
    Event/Campaign
@endsection
@section('main-content')
    <section class="category-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2 class="section__title">SOE Events</h2>
                        <span class="section__divider"></span>
                    </div><!-- end section-heading -->
                    <div class="row category-wrapper">
                        @foreach($events as $event)
                            <div class="col-lg-3">
                            <div class="category-item">
                                <img src="{{url('uploads/event/thumb/'.$event->thumb)}}" alt="">
                                <div class="category-content">
                                    <h3 class="cat__title">{{$event->short_title}}</h3>
                                    <p class="cat__meta">{{\Carbon\Carbon::parse($event->start_date)->isoFormat('Do MMM, YYYY')}}</p>
                                    <a href="{{route('user.event.detail',['slug'=>$event->slug])}}" class="cat__link">explore now</a>
                                </div><!-- end category-content -->
                            </div><!-- end category-item -->
                        </div><!-- end col-lg-4 -->
                        @endforeach
                    </div><!-- end row -->
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            @if(count($events) > 8)
                                <a href="javascript:void(0)" class="theme-btn">More Campaign</a>
                            @endif
                        </div>
                    </div>
                </div><!-- end col-lg-9 -->
            </div><!-- end row -->

        </div><!-- end container -->
    </section>
    <section class="category-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2 class="section__title">SOE Campaigns</h2>
                        <span class="section__divider"></span>
                    </div><!-- end section-heading -->
                    <div class="row category-wrapper">
                        @foreach($campaigns as $campaign)
                        <div class="col-lg-3">
                            <div class="category-item">
                                <img src="{{url('uploads/event/thumb/'.$campaign->thumb)}}" alt="">
                                <div class="category-content">
                                    <h3 class="cat__title">{{$campaign->title}}</h3>
                                    <p class="cat__meta">{{\Carbon\Carbon::parse($event->start_date)->isoFormat('Do MMM, YYYY')}}</p>
                                    <a href="{{route('user.event.detail',['slug'=>$campaign->slug])}}" class="cat__link">explore now</a>
                                </div><!-- end category-content -->
                            </div><!-- end category-item -->
                        </div><!-- end col-lg-4 -->
                        @endforeach
                    </div><!-- end row -->
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            @if(count($events) > 8)
                            <a href="javascript:void(0)" class="theme-btn">More Events</a>
                                @endif
                        </div>
                    </div>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
