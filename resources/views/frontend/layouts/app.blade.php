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
    @yield('css')
    <link rel="stylesheet" href="{{asset('frontend/asset/css/style.css')}}">
    <!-- end inject -->
</head>
<body>

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
                                <li><a href="#"><span class="la la-envelope-o"></span> schoolofengr@gmail.com</a></li>
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
                                            <li><a href="">Profile</a></li>
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
        <div class="header-menu-content">
            <div class="container-fluid">
                <div class="row align-items-center main-menu-content">
                    <div class="col-md-1"></div>
                    <div class="col-md-1">
                        <div class="logo-box-col">
                            <a href="{{route('user.home')}}" class="logo" title="School of Engineers"><img src="{{asset('frontend/asset/images/school-of-engineers.png')}}" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="wrap-col">
                            <div class="shape">
                                <a href="contact.html">Conatct us</a>
                            </div>
                            <div class="shape3">
                                <form action="">
                                    <input type="text" name="search" autocomplete="off">
                                    <button><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div class="menu-wrapper">
                                <nav class="main-menu">
                                    <ul>
                                        <li>
                                            <a href="{{route('user.home')}}">Home</a>
                                        </li>
                                        <li>
                                            <a href="job.html">Job Preparation</a>
                                        </li>
                                        <li>
                                            <a href="information.html">Information</a>
                                        </li>
                                        <li>
                                            <a href="scholarship.html">Higher Study</a>
                                        </li>
                                        <li>
                                            <a href="#">Skill Development</a>
                                            <ul class="dropdown-menu-item">
                                                <li><a href="{{route('user.skill.softskill')}}">Soft Skill</a></li>
                                                <li><a href="{{route('user.skill.academicskill')}}">Academic Skill</a></li>
                                                <li><a href="{{route('user.skill.professionalskill')}}">Professional Skill</a></li>
                                                <li>
                                                    <a href="javascript:void(0)">Tips and Tricks</a>
                                                    <ul class="dropdown-menu-item">
                                                        <li><a href="{{route('user.tips.interview')}}">Interview</a></li>
                                                        <li><a href="{{route('user.tips.educational')}}">Educational</a></li>
                                                        <li><a href="{{route('user.tips.career')}}">Career and planing</a></li>
                                                        <li><a href="{{route('user.tips.others')}}">Others</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Our Activity</a>
                                            <ul class="dropdown-menu-item">
                                                <li><a href="careeractivity.html">Career Activity</a></li>
                                                <li><a href="careeractivity.html">Social Activity</a></li>
                                                <li><a href="careeractivity.html">Global Activity</a></li>
                                                <li><a href="careeractivity.html">Training Activity</a></li>

                                                <li><a href="careeractivity.html">Seminar and Workshop</a></li>
                                                <li><a href="blood.html">Blood Donation</a></li>
                                                <li>
                                                    <a href="#">Media</a>
                                                    <ul class="dropdown-menu-item">
                                                        <li><a href="tips.html">News</a></li>
                                                        <li><a href="photo-gallery.html">Photo Gallery</a></li>
                                                        <li><a href="#">Video Gallery</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="blog.html">Blog</a>
                                        </li>
                                        <li>
                                            <a href="">About Us</a>
                                            <ul class="dropdown-menu-item">
                                                <li><a href="about.html">About, SOE</a></li>
                                                <li><a href="contact.html">Contact Us</a></li>
                                                <li><a href="team.html">SOE Team</a></li>
                                                <li><a href="signup.html">Become a Member</a></li>
                                            </ul>
                                        </li>
                                    </ul><!-- end ul -->
                                </nav><!-- end main-menu -->
                                <div class="logo-right-button">
                                    <div class="overlays">
                                        <p>Please Upload your question, Your book, Solution</p>
                                    </div>
                                    <style>
                                        .logo-right-button{
                                            position: relative;
                                        }
                                        .logo-right-button::after{
                                            position: absolute;
                                            content: '';
                                            bottom: -20px;
                                            left:40%;
                                            right: 0;
                                            width: 20px;
                                            height: 20px;
                                            background: #28a745;
                                            transform: rotate(45deg);
                                            z-index: 9;
                                            visibility: hidden;
                                            -webkit-transition: ease-out .2s;
                                            -moz-transition: ease-out .2s;
                                            -ms-transition: ease-out .2s;
                                            -o-transition: ease-out .2s;
                                            transition: ease-out .2s;
                                            text-align: center;
                                        }
                                        .logo-right-button:hover::after{
                                            visibility: visible;
                                        }
                                        .logo-right-button .overlays{
                                            position: absolute;
                                            bottom: -70px;
                                            left: -25px;
                                            width: 220px;
                                            background: #28a745;
                                            height: auto;
                                            padding: 10px;
                                            border-radius: 4px;
                                            visibility: hidden;
                                            -webkit-transition: ease-out .2s;
                                            -moz-transition: ease-out .2s;
                                            -ms-transition: ease-out .2s;
                                            -o-transition: ease-out .2s;
                                            transition: ease-out .2s;
                                            text-align: center;
                                            z-index: 99;
                                        }
                                        .logo-right-button .overlays p{
                                            margin: 0;
                                            padding: 0;
                                            color: #fff;
                                        }
                                        .logo-right-button:hover .overlays{
                                            visibility: visible;
                                        }
                                    </style>
                                    <ul>
                                        <li class="ticket-button-box">
                                            <a href="upload-document.html" class="btn btn-danger" style="background: #EE5222"><i class="fa fa-upload"></i> Upload Document</a>
                                        </li>
                                    </ul>
                                    <div class="side-menu-open">
                                        <span class="menu__bar"></span>
                                        <span class="menu__bar"></span>
                                        <span class="menu__bar"></span>
                                    </div>
                                </div><!-- end logo-right-button -->
                                <div class="side-nav-container">
                                    <div class="humburger-menu">
                                        <div class="humburger-menu-lines side-menu-close"></div><!-- end humburger-menu-lines -->
                                    </div><!-- end humburger-menu -->
                                    <div class="side-menu-wrap">
                                        <ul class="side-menu-ul">
                                            <li class="sidenav__item"><a href="{{route('user.home')}}">Home</a></li>
                                            <li class="sidenav__item">
                                                <a href="job.html">Job Preparation</a>
                                            </li>
                                            <li class="sidenav__item">
                                                <a href="information.html">Information</a>
                                                <span class="menu-plus-icon"></span>
                                                <ul class="side-sub-menu">
                                                    <li><a href="course-grid.html">menu</a></li>
                                                    <li><a href="course-details.html">menu</a></li>
                                                </ul>
                                            </li>
                                            <li class="sidenav__item">
                                                <a href="scholarship.html">Scholarship</a>
                                                <span class="menu-plus-icon"></span>
                                                <ul class="side-sub-menu">
                                                    <li><a href="course-grid.html">menu</a></li>
                                                    <li><a href="course-details.html">menu</a></li>
                                                </ul>
                                            </li>
                                            <li class="sidenav__item">
                                                <a href="#">Skill Development</a>
                                                <span class="menu-plus-icon"></span>
                                                <ul class="side-sub-menu">
                                                    <li><a href="course-grid.html">menu</a></li>
                                                    <li><a href="course-details.html">menu</a></li>
                                                </ul>
                                            </li>
                                            <li class="sidenav__item">
                                                <a href="gallery.html">Gallery</a>
                                            </li>
                                            <li class="sidenav__item"><a href="blog.html">Blog</a></li>
                                        </ul>
                                        <div class="side-btn-box">
                                            <a href="signup.html" class="btn btn-danger">Registration</a>
                                        </div>

                                    </div><!-- end side-menu-wrap -->
                                </div><!-- end side-nav-container -->
                            </div>
                        </div>
                        <!-- end menu-wrapper -->
                    </div><!-- end col-lg-9 -->

                </div><!-- end row -->
            </div><!-- end container-fluid -->
        </div><!-- end header-menu-content -->
    </div><!-- end header-menu-fluid -->
</section><!-- end header-menu-area -->
<!--======================================
        END HEADER AREA
======================================-->
@include('frontend.inc.banner')

@section('main-content')
@show

<section class="footer-area">
    <div class="ocean">
        <div class="wave"></div>
        <div class="wave"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h3 class="footer-title">About us</h3>
                    <span class="section__divider"></span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum earum eum, maiores et enim, quae quidem doloremque modi sequi aperiam officiis velit illum perspiciatis tempora natus quibusdam nobis optio amet!</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h3 class="footer-title">Our SOE</h3>
                    <span class="section__divider"></span>
                    <ul class="footer-link">
                        <li><a href="#">Privacy policy</a></li>
                        <li><a href="#">Terms &amp; condition</a></li>
                        <li><a href="#">support</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">blog</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h3 class="footer-title">Important Link</h3>
                    <span class="section__divider"></span>
                    <ul class="footer-link">
                        <li><a href="#">Blood Donate</a></li>
                        <li><a href="#">PHP Learning</a></li>
                        <li><a href="#">Spoken English</a></li>
                        <li><a href="#">Self-Driving Car</a></li>
                        <li><a href="#">Garbage Collectors</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h3 class="footer-title">Contact us</h3>
                    <span class="section__divider"></span>
                    <ul class="footer-address mt-0">
                        <li><a href="tel:+8801912679289">+8801912679289</a></li>
                        <li><a href="mailto:support@wbsite.com" class="mail">support@website.com</a></li>
                        <li>House No-37,Road No-05,Nikunja-2,Dhaka, Bangladesh</li>
                    </ul>
                    <ul class="footer-social">
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row copyright-content align-items-center">
            <div class="col-lg-10">
                <p class="copy__desc">&copy; 2020 SchoolOfEngineers. All Rights Reserved. Developed by <a href="javascript:void(0)">Ezze Technology LTD.</a></p>
            </div>
        </div>
    </div>
</section>

<!-- start scroll top -->
<div id="scroll-top">
    <i class="fa fa-angle-up" title="Go top"></i>
</div>
<!-- end scroll top -->


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
@yield('js')


</body>

</html>
