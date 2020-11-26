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
                        <a href="{{route('user.contact.us')}}">Conatct us</a>
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
                                        <li><a href="{{route('user.blood.donation')}}">Blood Donation</a></li>
                                        <li>
                                            <a href="#">Media</a>
                                            <ul class="dropdown-menu-item">
                                                <li><a href="tips.html">News</a></li>
                                                <li><a href="photo-gallery.html">Photo Gallery</a></li>
                                                <li><a href="{{route('user.video.gallery')}}">Video Gallery</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{route('user.blog')}}">Blog</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">About Us</a>
                                    <ul class="dropdown-menu-item">
                                        <li><a href="{{route('user.about')}}">About, SOE</a></li>
                                        <li><a href="{{route('user.contact.us')}}">Contact Us</a></li>
                                        <li><a href="{{route('user.soe.team')}}">SOE Team</a></li>
                                        @if(Route::has('register'))
                                            <li><a href="{{route('register')}}">Become a Member</a></li>
                                        @endif
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
                                    <a href="{{route('user.document.upload')}}" class="btn btn-danger" style="background: #EE5222"><i class="fa fa-upload"></i> Upload Document</a>
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
