<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="school of Engineers">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>School of Engineers</title>

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Libre+Franklin:100,200,300,400,500,600,700&amp;display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" sizes="16x16" href="{{asset('frontend/asset/images/school-of-engineers.png')}}">

    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('frontend/asset/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/asset/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/asset/css/line-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/asset/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/asset/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/asset/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/asset/css/jquery.countdown.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/asset/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/asset/css/fancybox.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/asset/css/style.css')}}">
    <!-- end inject -->
    @yield('css')
</head>
<body>
<div id="preloader">
    <div id="status">
    </div>
</div>

<!--======================================
        START HEADER AREA
    ======================================-->
<section class="header-menu-area">
    <div class="header-menu-fluid">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-widget header-widget1">
                            <ul class="contact-info d-flex align-items-center">
                                <li><a href="#"><span class="la la-phone"></span> 123-456-789</a> </li>
                                <li><a href="mailto:schoolofengr@gmail.com"><span class="la la-envelope-o"></span> schoolofengr@gmail.com</a></li>
                            </ul>
                        </div><!-- end header-widget -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="header-widget header-widget2 d-flex align-items-center justify-content-end">
                            <div class="header-right-info">
                                <ul class="social-info d-flex align-items-center">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                                </ul>
                            </div>
                            <div class="header-right-info d-flex align-items-center">
                                <ul class="user-action d-flex align-items-center">
                                    @if(Route::has('login'))
                                        @auth
                                            <img style="width: 30px;height: 30px;margin-right: 10px;" src="{{asset('frontend/asset/images/avator.png')}}" alt="{{auth()->user()->first_name}}">
                                            <div class="btn-group">
                                                <a type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    {{ucfirst(auth()->user()->first_name).' '.ucfirst(auth()->user()->last_name)}}
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-left" style="background:#EE5222;color: #fff!important;">
                                                    <a class="dropdown-item" type="button" href="{{route('user.profile')}}" style="color: #fff;"><i class="fa fa-user"></i> Profile</a>
                                                    <a style="color: #fff;"  class="dropdown-item" type="button" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();
                                                    "><i class="fa fa-sign-out"></i> Logout</a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </div>
                                                <style>
                                                    a:not([href]):not([tabindex]):focus, a:not([href]):not([tabindex]):hover{
                                                        color:#EE5222!important;
                                                        background: #fff;
                                                    }
                                                </style>
                                            </div>
                                        @else
                                            <li><a href="{{route('login')}}">Login</a></li>
                                            @if(Route::has('register'))
                                                <li><span>or</span></li>
                                                <li><a href="{{route('register')}}">Register</a></li>
                                            @endif
                                        @endauth
                                    @endif
                                </ul>
                            </div>
                        </div><!-- end header-widget -->
                    </div><!-- end col-lg-6 -->
                </div><!-- end row -->
            </div><!-- end container-fluid -->
        </div><!-- end header-top -->
        <section class="logo-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="logo-col">
                            <a href="{{route('user.home')}}">
                                <img src="{{asset('frontend/asset/images/school-of-engineers.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('frontend.inc.home-menu')
    </div><!-- end header-menu-fluid -->
</section><!-- end header-menu-area -->
@include('frontend.inc.breadcrumb')
@section('main-content')
@show


<!--======================================
        START GET-START AREA
======================================-->
<section class="get-start-area get-start-area2">
    <div class="box-icons">
        <div class="box-one"></div>
        <div class="box-two"></div>
        <div class="box-three"></div>
        <div class="box-four"></div>
    </div><!-- end box-icons -->
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="section-heading">
                    <h2 class="section__title section__title2">Become A Member</h2>
                    <div class="heading-content-box">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor ut perspiciatis, alias non provident, eaque architecto, facilis molestias labore nisi minima iusto ducimus placeat sequi doloribus. Esse minus laborum consequuntur!</p>
                    </div>
                </div><!-- end section-heading -->
            </div>
            <div class="col-lg-5 d-flex align-items-center justify-content-center">
                <div class="get-start-btn">
                    @if(Route::has('register'))
                        <a href="{{route('register')}}" class="btn btn-success btn-lg">Join with Us</a>
                    @endif
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
    <div class="box-icons2">
        <div class="box-one"></div>
        <div class="box-two"></div>
        <div class="box-three"></div>
        <div class="box-four"></div>
        <div class="box-five"></div>
    </div><!-- end box-icons2 -->
</section><!-- end get-start-area -->



<!-- ================================
       START CLIENTLOGO AREA
================================= -->
<section class="clientlogo-area">
    <div class="stroke-line">
        <span class="stroke__line"></span>
        <span class="stroke__line"></span>
        <span class="stroke__line"></span>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="section__title">Our Trusted Partners</h2>
                    <span class="section__divider"></span>
                </div><!-- end section-heading -->
            </div><!-- end col-md-12 -->
        </div><!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="client-logo">
                    @foreach(\App\Model\Admin\Partner::where('status',1)->get() as $partner)
                            <div class="client-logo-item">
                                <a href="{{$partner->url}}"><img src="{{url('uploads/partner/main/'.$partner->logo)}}" alt="brand image"></a>
                            </div><!-- end client-logo-item -->
                    @endforeach

                </div><!-- end client-logo -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
    <div class="stroke-line2">
        <span class="stroke__line"></span>
        <span class="stroke__line"></span>
        <span class="stroke__line"></span>
    </div>
</section>


@include('frontend.inc.footer')
<!-- start scroll top -->
<div id="scroll-top">
    <i class="fa fa-angle-up" title="Go top"></i>
</div>
<!-- end scroll top -->
@include('sweetalert::alert')
<!-- theme js files -->
<script src="{{asset('frontend/asset/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('frontend/asset/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/asset/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/asset/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/asset/js/magnific-popup.min.js')}}"></script>
<script src="{{asset('frontend/asset/js/isotope.js')}}"></script>
<script src="{{asset('frontend/asset/js/waypoint.min.js')}}"></script>
<script src="{{asset('frontend/asset/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('frontend/asset/js/particles.min.js')}}"></script>
<script src="{{asset('frontend/asset/js/particlesRun.js')}}"></script>
<script src="{{asset('frontend/asset/js/fancybox.js')}}"></script>
<script src="{{asset('frontend/asset/js/wow.js')}}"></script>
<script src="{{asset('frontend/asset/js/smooth-scrolling.js')}}"></script>
<script src="{{asset('frontend/asset/js/main.js')}}"></script>
<script    type="text/javascript">
    $(window).on('load',function() { // makes sure the whole site is loaded
        $('#status').fadeOut(); // will first fade out the loading animation
        $('#preloader').delay(50).fadeOut(100); // will fade out the white DIV that covers the website.
        $('body').delay(50).css({'overflow':'visible'});
    })
</script>
@yield('js')
</body>

</html>
