@extends('frontend.layouts.homeapp')
@section('main-content')
    <section class="slider-area">
        <div class="homepage-slide1">
            <div class="single-slide-item slide-bg1">
            </div><!-- end single-slide-item -->
            <div class="single-slide-item slide-bg2">
            </div><!-- end single-slide-item -->
            <div class="single-slide-item slide-bg3">
            </div><!-- end single-slide-item -->
        </div><!-- end homepage-slides -->
    </section><!-- end slider-area -->

    <section class="feature-area">
        <div class="container">
            <div class="row feature-content-wrap">
                <div class="col-lg-12 col-sm-12">
                    <div class="feature-item feature-item1">
                        <div class="row">
                            <div class="col-md-8 align-self-center">
                                <h5>School of Engineers | We Shape the Dream</h5>
                            </div>
                            <div class="col-md-4">
                                <div class="btn-group float-left" role="group" aria-label="Basic example" style="margin-left: 98px;">
                                    <a target="_blank" href="https://www.facebook.com/schoolofengineers/videos/2114968958646718/" class="btn btn-lg btn-danger">Live Program</a>
                                </div>

                                <div class="btn-group float-right" role="group" aria-label="Basic example">
                                    <a href="live-test.html" class="btn btn-lg btn-success">Online Test</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- end feature-item -->
                </div><!-- end col-lg-3 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end feature-area -->

    <section class="quick-access">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-lg-3 col-sm-6 col xs-12">
                    <div class="access-box">
                        <a href="" class="btn btn-success">Job Preparation</a>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-6 col xs-12">
                    <div class="access-box">
                        <a href="" class="btn btn-danger">Tips and Tricks</a>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-6 col xs-12">
                    <div class="access-box">
                        <a href="" class="btn btn-danger">Information</a>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-6 col xs-12">
                    <div class="access-box">
                        <a href="" class="btn btn-danger">Higher Study</a>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-6 col xs-12">
                    <div class="access-box">
                        <a href="" class="btn btn-danger">Skill Development</a>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-6 col xs-12">
                    <div class="access-box">
                        <a href="" class="btn btn-danger">Our Activity</a>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-6 col xs-12">
                    <div class="access-box">
                        <a href="{{route('user.about')}}" class="btn btn-danger">About Us</a>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-6 col xs-12">
                    <div class="access-box">
                        <a href="" class="btn btn-danger">Tips and Tricks</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--New Counter Start-->
    <section class="new-counter">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="counter-box">
                        <div class="circle-one">
                        </div>
                        <div class="circle-two">
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="text">
                                <h2 class="counter">{{count(\App\User::all())}}</h2>
                            </div>
                            <div class="heading">
                                <p>REGISTERED USER</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="counter-box">
                        <div class="circle-one">
                        </div>
                        <div class="circle-two">
                            <div class="icon">
                                <i class="fa fa-university"></i>
                            </div>
                            <div class="text">
                                <h2 class="counter">1,248</h2>
                            </div>
                            <div class="heading">
                                <p>CAMPUS</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="counter-box">
                        <div class="circle-one">
                        </div>
                        <div class="circle-two">
                            <div class="icon">
                                <i class="fa fa-trophy"></i>
                            </div>
                            <div class="text">
                                <h2 class="counter">980</h2>
                            </div>
                            <div class="heading">
                                <p>SUCCESS CAMPAIGN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="counter-box">
                        <div class="circle-one">
                        </div>
                        <div class="circle-two">
                            <div class="icon">
                                <i class="fa fa-book"></i>
                            </div>
                            <div class="text">
                                <h2 class="counter">200</h2>
                            </div>
                            <div class="heading">
                                <p>CAMPAIGN RUNNING</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--New Counter End-->
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
    <div class="quick-activity">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <h2 class="section__title">Our Activity</h2>
                        <span class="section__divider"></span>
                    </div><!-- end section-heading -->
                </div><!-- end col-md-8 -->
            </div>
            <div class="row">
                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                    <a href="">
                        <div class="quick">
                            <div class="image">
                                <img src="{{asset('frontend/asset/images/career.png')}}" alt="">
                            </div>
                            <div class="text">
                                <h2>Career Activity</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                    <a href="">
                        <div class="quick">
                            <div class="image">
                                <img src="{{asset('frontend/asset/images/social.jpg.webp')}}" alt="">
                            </div>
                            <div class="text">
                                <h2>Social Activity</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                    <a href="careeractivity.html">
                        <div class="quick">
                            <div class="image">
                                <img src="{{asset('frontend/asset/images/global.jpg')}}" alt="">
                            </div>
                            <div class="text">
                                <h2>Global Activity</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                    <a href="">
                        <div class="quick">
                            <div class="image">
                                <img src="{{asset('frontend/asset/images/compute.jpg')}}" alt="">
                            </div>
                            <div class="text">
                                <h2>Traning Activity</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section class="testimonial-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <h2 class="section__title">Success Stories</h2>
                        <span class="section__divider"></span>
                    </div><!-- end section-heading -->
                </div><!-- end col-md-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonial-wrap">
                        <div class="testimonial-item">
                            <div class="testimonial__name">
                                <img src="{{asset('frontend/asset/images/testi-img3.jpg')}}" alt="small-avatar">
                                <h3 class="testimonial__name-title">Bernice Pease</h3>
                                <span class="testimonial__name-meta">student</span>
                                <span class="testimonial__name-rating">
                                 <i class="la la-star"></i>
                                 <i class="la la-star"></i>
                                 <i class="la la-star"></i>
                                 <i class="la la-star"></i>
                                 <i class="la la-star"></i>
                            </span>
                            </div><!-- end testimonial__name -->
                            <div class="testimonial__desc">
                                <p class="testimonial__desc-desc">
                                    The best part about Aduca is the selection.
                                    You can find a course for anything you want to learn!
                                    really Aduca i closed with you.
                                </p>
                            </div><!-- end testimonial__desc -->
                        </div><!-- end testimonial-item -->
                        <div class="testimonial-item">
                            <div class="testimonial__name">
                                <img src="{{asset('frontend/asset/images/testi-img4.jpg')}}" alt="small-avatar">
                                <h3 class="testimonial__name-title">Daniel Ward</h3>
                                <span class="testimonial__name-meta">student</span>
                                <span class="testimonial__name-rating">
                                 <i class="la la-star"></i>
                                 <i class="la la-star"></i>
                                 <i class="la la-star"></i>
                                 <i class="la la-star"></i>
                                 <i class="la la-star"></i>
                            </span>
                            </div><!-- end testimonial__name -->
                            <div class="testimonial__desc">
                                <p class="testimonial__desc-desc">
                                    The best part about Aduca is the selection.
                                    You can find a course for anything you want to learn!
                                    really Aduca i closed with you.
                                </p>
                            </div><!-- end testimonial__desc -->
                        </div><!-- end testimonial-item -->
                        <div class="testimonial-item">
                            <div class="testimonial__name">
                                <img src="{{asset('frontend/asset/images/testi-img.jpg')}}" alt="small-avatar">
                                <h3 class="testimonial__name-title">Kevin Martin</h3>
                                <span class="testimonial__name-meta">student</span>
                                <span class="testimonial__name-rating">
                                 <i class="la la-star"></i>
                                 <i class="la la-star"></i>
                                 <i class="la la-star"></i>
                                 <i class="la la-star"></i>
                                 <i class="la la-star"></i>
                            </span>
                            </div><!-- end testimonial__name -->
                            <div class="testimonial__desc">
                                <p class="testimonial__desc-desc">
                                    The best part about Aduca is the selection.
                                    You can find a course for anything you want to learn!
                                    really Aduca i closed with you.
                                </p>
                            </div><!-- end testimonial__desc -->
                        </div><!-- end testimonial-item -->
                        <div class="testimonial-item">
                            <div class="testimonial__name">
                                <img src="{{asset('frontend/asset/images/testi-img6.jpg')}}" alt="small-avatar">
                                <h3 class="testimonial__name-title">Mike Hardson</h3>
                                <span class="testimonial__name-meta">student</span>
                                <span class="testimonial__name-rating">
                                 <i class="la la-star"></i>
                                 <i class="la la-star"></i>
                                 <i class="la la-star"></i>
                                 <i class="la la-star"></i>
                                 <i class="la la-star"></i>
                            </span>
                            </div><!-- end testimonial__name -->
                            <div class="testimonial__desc">
                                <p class="testimonial__desc-desc">
                                    The best part about Aduca is the selection.
                                    You can find a course for anything you want to learn!
                                    really Aduca i closed with you.
                                </p>
                            </div><!-- end testimonial__desc -->
                        </div><!-- end testimonial-item -->
                        <div class="testimonial-item">
                            <div class="testimonial__name">
                                <img src="{{asset('frontend/asset/images/testi-img2.jpg')}}" alt="small-avatar">
                                <h3 class="testimonial__name-title">Bernice Pease</h3>
                                <span class="testimonial__name-meta">student</span>
                                <span class="testimonial__name-rating">
                                 <i class="la la-star"></i>
                                 <i class="la la-star"></i>
                                 <i class="la la-star"></i>
                                 <i class="la la-star"></i>
                                <i class="la la-star"></i>
                            </span>
                            </div><!-- end testimonial__name -->
                            <div class="testimonial__desc">
                                <p class="testimonial__desc-desc">
                                    The best part about Aduca is the selection.
                                    You can find a course for anything you want to learn!
                                    really Aduca i closed with you.
                                </p>
                            </div><!-- end testimonial__desc -->
                        </div><!-- end testimonial-item -->
                        <div class="testimonial-item">
                            <div class="testimonial__name">
                                <img src="{{asset('frontend/asset/images/testi-img3.jpg')}}" alt="small-avatar">
                                <h3 class="testimonial__name-title">Daniel Ward</h3>
                                <span class="testimonial__name-meta">student</span>
                                <span class="testimonial__name-rating">
                                 <i class="la la-star"></i>
                                 <i class="la la-star"></i>
                                 <i class="la la-star"></i>
                                 <i class="la la-star"></i>
                                 <i class="la la-star"></i>
                            </span>
                            </div><!-- end testimonial__name -->
                            <div class="testimonial__desc">
                                <p class="testimonial__desc-desc">
                                    The best part about Aduca is the selection.
                                    You can find a course for anything you want to learn!
                                    really Aduca i closed with you.
                                </p>
                            </div><!-- end testimonial__desc -->
                        </div><!-- end testimonial-item -->
                    </div><!-- end testimonial-wrap -->
                </div><!-- end col-md-12 -->
            </div><!-- end row -->
        </div><!-- container-fluid -->
    </section><!-- end testimonial-area -->

    <section class="blog-area blog-area2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <h2 class="section__title">Latest Blog</h2>
                        <span class="section__divider"></span>
                    </div><!-- end section-heading -->
                </div><!-- end col-md-8 -->
            </div><!-- end row -->
            <div class="row blog-post-wrapper">
                <div class="col-lg-12">
                    <div class="blog-post-carousel">
                        @foreach($latestBlog as $lBlog)
                            <div class="blog-post-item">
                            <div class="blog-post-img">
                                <img src="{{url('uploads/blog/thumb/'.$lBlog->thumb)}}" alt="blog image" class="blog__img">
                                <div class="blog__date">
                                    <span>{{\Carbon\Carbon::parse($lBlog->created_at)->isoFormat('Do MMM')}}</span>
                                </div><!-- end blog__date -->
                            </div><!-- end blog-post-img -->
                            <div class="post-body">
                                <div class="blog-title">
                                    <a href="" class="blog__title">
                                        {{\Illuminate\Support\Str::limit($lBlog->title,65,'..')}}
                                    </a>
                                </div>
                                <ul class="blog__panel d-flex align-items-center">
                                    <li>By<a href="javascript:void(0)" class="blog-admin-name">
                                            @foreach($admins as $admin)
                                                @if((int)$admin->id === (int)$lBlog->created_by)
                                                    {{$admin->name}}
                                                @endif
                                            @endforeach
                                        </a></li>
                                </ul>
                            </div><!-- end post-body -->
                        </div>
                        @endforeach
                    </div><!-- end blog-post-carousel -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end blog-area -->
@endsection
