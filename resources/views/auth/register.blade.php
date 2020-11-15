@extends('frontend.layouts.app')
@section('page-name')
    Signup
@endsection
@section('main-content')
    <!-- ================================
       START FORM AREA
================================= -->
    <section class="form-shared">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <div class="contact-form-action">
                        <div class="form-heading text-center">
                            <h3 class="form__title">Create an account!</h3>
                        </div>
                        <!--Contact Form-->
                        <form method="post" action="{{route('register')}}">@csrf
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" placeholder="First Name" value="{{old('first_name')}}">
                                        <span class="la la-user input-icon"></span>
                                        @error('first_name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div><!-- end col-md-12 -->
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" placeholder="Last Name" value="{{old('last_name')}}">
                                        <span class="la la-user input-icon"></span>
                                        @error('last_name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div><!-- end col-md-12 -->
                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control @error('mobile') is-invalid @enderror" type="text" name="mobile" placeholder="Mobile Number" value="{{old('mobile')}}">
                                        <span class="la la-phone input-icon"></span>
                                        @error('mobile')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div><!-- end col-md-12 -->
                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <select class="form-control @error('profession') is-invalid @enderror" id="profession" name="profession" >
                                            <option value="">Select Profession</option>
                                            <option value="Student">Student</option>
                                            <option value="Professional">Professional</option>
                                        </select>
                                        <i class="fa fa-id-card"></i>
                                        @error('profession')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div><!-- end col-md-12 -->
                                <div class="col-lg-12 col-sm-12" id="add_education_type">

                                </div>
                                <div class="col-lg-12 col-sm-12" id="add_type">

                                </div>
                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control @error('institute_name') is-invalid @enderror" type="Text" name="institute_name" placeholder="Institute name" value="{{old('institute_name')}}">
                                        <i class="fa fa-university"></i>
                                        @error('institute_name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div><!-- end col-md-12 -->
                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email Address" value="{{old('email')}}">
                                        <span class="la la-envelope-o input-icon"></span>
                                        @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div><!-- end col-md-12 -->
                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">
                                        <span class="la la-lock input-icon"></span>
                                        @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div><!-- end col-md-12 -->
                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
                                        <span class="la la-lock input-icon"></span>
                                    </div>
                                </div><!-- end col-md-12 -->

                                <div class="col-lg-12 col-sm-12">
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="chb1" name="blood_check"/>
                                        <label for="chb1">I Want to Donate Blood.</label>
                                    </div>
                                </div><!-- end col-md-12 -->
                                <div class="blood_section" id="blood_section">

                                </div>
                                <div class="col-lg-12 col-sm-12 ">
                                    <div class="form-group">
                                        <button class="theme-btn btn-block" type="submit">Register Account</button>
                                    </div>
                                </div><!-- end col-md-12 -->
                                <div class="col-lg-12 col-sm-12">
                                    <div class="account-assist">
                                        <p class="account__desc">Already have an account?<a href="{{url('/login')}}"> Log in</a></p>
                                    </div>
                                </div><!-- end col-md-12 -->
                            </div><!-- end row -->
                        </form>
                    </div><!-- end contact-form -->
                </div><!-- end col-md-7 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end form-shared -->
    <!-- ================================
           START FORM AREA
    ================================= -->
@endsection
@section('js')
    <script src="{{asset('frontend/asset/js/countries.js')}}"></script>
    <script src="{{asset('frontend/asset/js/custom.js')}}"></script>
@endsection
