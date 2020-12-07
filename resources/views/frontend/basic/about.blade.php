@extends('frontend.layouts.innerapp')
@section('page-name')
    About Us
@endsection
@section('main-content')
    <section class="about-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 pl-0">
                    <div class="img">
                        <img src="{{asset('frontend/asset/images/about.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="content">
                        <h2>Our Mission</h2>
                        <p style="margin-right: 50px;text-align: left">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like</p>
                    </div>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end contact-area -->
    <section class="about-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="content">
                        <h2>Our Vision</h2>
                        <p style="text-align: left;margin-left: 50px;margin-right: 20px;">School of Engineers is the largest online educational platform for engineering students and professionals of Bangladesh.School of Engineers is specially working for 1.3 Million Engineering students to emphasis their career plan & to ensure a skilled generation to lead The Bangladesh towards vision 2021</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 pl-0">
                    <div class="img">
                        <img src="{{asset('frontend/asset/images/about.jpg')}}" alt="">
                    </div>
                </div>

            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end contact-area -->
@endsection
