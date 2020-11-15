@extends('frontend.layouts.app')
@section('page-name')
    Login
@endsection
@section('main-content')
    <section class="form-shared">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <div class="contact-form-action">
                        <div class="form-heading text-center">
                            <h3 class="form__title">Login to your account!</h3>
                        </div>
                        <!--Contact Form-->
                        <form method="POST" action="{{ route('login') }}">@csrf
                            <div class="row">

                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{old('email')}}">
                                        <span class="la la-user input-icon"></span>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><!-- end col-md-12 -->
                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" >
                                        <span class="la la-lock input-icon"></span>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><!-- end col-md-12 -->
                                <div class="col-lg-12 col-sm-12">
                                    <div class="custom-checkbox mb-4">
                                        <input type="checkbox" id="chb1" name="remember" {{old('remember')?'checked':''}}>
                                        <label for="chb1">Remember Me</label>
                                        <a href="#" class="pass__desc"> Forgot my password?</a>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <button class="theme-btn btn-block" type="submit">login now</button>
                                    </div>
                                </div><!-- end col-md-12 -->
                                <div class="col-lg-12 col-sm-12">
                                    <div class="account-assist">
                                        <p class="account__desc">Not a member?<a href="{{route('register')}}"> Register now</a></p>
                                    </div>
                                </div><!-- end col-md-12 -->
                            </div><!-- end row -->
                        </form>
                    </div><!-- end contact-form -->
                </div><!-- end col-md-7 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end form-shared -->
@endsection
