@extends('frontend.layouts.innerapp')
@section('page-name')
    Contact Us
@endsection
@section('main-content')
    <!-- ================================
       START CONTACT AREA
================================= -->
    <section class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="contact-item contact-item1">
                        <div class="hover-overlay"></div>
                        <span class="la la-user contact__icon"></span>
                        <h4 class="contact__title">About Us</h4>
                        <p class="contact__desc">
                            Lorem ipsum is simply free text dolor
                            sit amet, duise consectetur ullam
                        </p>
                    </div><!-- end contact-item -->
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4 col-sm-6">
                    <div class="contact-item contact-item2">
                        <div class="hover-overlay"></div>
                        <span class="la la-map contact__icon"></span>
                        <h4 class="contact__title">Our Location</h4>
                        <p class="contact__desc">
                            660 broklyn street , 88 new york, United states of america
                        </p>
                    </div><!-- end contact-item -->
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4 col-sm-6">
                    <div class="contact-item contact-item3">
                        <div class="hover-overlay"></div>
                        <span class="la la-envelope-o contact__icon"></span>
                        <h4 class="contact__title">Contact Info</h4>
                        <ul class="contact__list">
                            <li><a href="mailto:info@example.com"> info@example.com</a></li>
                            <li><a href="tel:009-215-5595"> 009-215-5595</a></li>
                        </ul>
                    </div><!-- end contact-item -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
            <div class="row contact-form-wrap">
                <div class="col-lg-5">
                    <div class="section-heading">
                        <p class="section__meta">get in touch</p>
                        <h2 class="section__title">Have a Question? Drop Us a Line</h2>
                        <span class="section__divider"></span>
                        <p class="section__desc">
                            Lorem ipsum is simply free text dolor sit amett quie
                            adipiscing elit. When an unknown printer took a galley.
                            quiaies lipsum dolor sit atur adip scing
                        </p>
                        <ul class="section__list">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                        </ul>
                    </div><!-- end sec-heading -->
                </div><!-- end col-md-5 -->
                <div class="col-lg-7">
                    <div class="contact-form-action">
                        <!--Contact Form-->
                        <form method="post" action="{{route('user.contact.store')}}">@csrf
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Your Name" autocomplete="off">
                                        <span class="la la-user input-icon"></span>
                                        @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email Address">
                                        <span class="la la-envelope-o input-icon"></span>
                                        @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control @error('email') is-invalid @enderror" type="text" name="phone" placeholder="Ex: 01XXX-XXXXXX ">
                                        <span class="la la-phone input-icon"></span>
                                        @error('phone')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control @error('subject') is-invalid @enderror" type="text" name="subject" placeholder="Subject">
                                        <span class="la la-book input-icon"></span>
                                        @error('subject')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea class="message-control form-control @error('message') is-invalid @enderror" name="message" placeholder="Write Message Here"></textarea>
                                        <span class="la la-pencil input-icon"></span>
                                        @error('message')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div><!-- end col-lg-12 -->
                                <div class="col-lg-12">
                                    <button class="theme-btn" type="submit">Send Message</button>
                                </div><!-- end col-md-12 -->
                            </div><!-- end row -->
                        </form>
                    </div><!-- end contact-form-action -->
                </div><!-- end col-md-7 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end contact-area -->
    <!-- ================================
           START CONTACT AREA
    ================================= -->


    <!--Google Map Start-->
    <div class="map-responsive">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d912.0798524200086!2d90.39800831526149!3d23.8782898529775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c43ed4656af3%3A0x1518002d20b4a418!2sHouse%20No-37%2C%205%20Rd%20No%3A%2009%2C%20Dhaka%201230!5e0!3m2!1sen!2sbd!4v1606194137064!5m2!1sen!2sbd"></iframe>
    </div>
    <!--Google Map End-->
    @include('sweetalert::alert')
@endsection
