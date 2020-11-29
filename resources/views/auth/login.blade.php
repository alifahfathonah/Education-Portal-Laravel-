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
                                        <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{old('email')}}">
                                        <span class="la la-user input-icon"></span>
                                        <span class="loading-icon fa fa-spinner fa-spin hides"></span>
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
                                        <a href="{{route('password.request')}}" class="pass__desc"> Forgot my password?</a>
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
    <style>
        .loading-icon{
            position: absolute;
            right: 10px;
            top: 20px;
            color: #EE5222;
        }
        .hides{
            visibility: hidden;
        }
        .shows{
            visibility: visible;
        }

    </style>
@endsection
@section('js')
    <script>
        $(document).ready(function (){
            $(document).on('blur','#email',function (){
                $('#email').closest('div').children('span.loading-icon').removeClass('hides');
                $('#email').closest('div').children('span.loading-icon').addClass('shows');
                var valueEmail = $(this).val();
                if (!valueEmail){
                    $('#email').closest('div').children('span.loading-icon').addClass('hides');
                    $('#email').closest('div').children('span.loading-icon').removeClass('shows');
                    removePreviousLog();
                }else{
                    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if (!filter.test(valueEmail)){
                        removePreviousLog();
                        $('#email').closest('input').addClass('is-invalid');
                        $('#email').closest('div').append('<span class="invalid-feedback"><strong>Please enter correct email.</strong></span>');
                    }else{
                        $.ajax({
                            url:'{{route('user.valid')}}',
                            method:'POST',
                            data:{'_token':'{{csrf_token()}}','email':valueEmail},
                            success:function (data){
                                if (data === true){
                                    removePreviousLog();
                                    $('#email').closest('input').addClass('is-valid');
                                    $('#email').css('border-color','green');
                                    $('#email').closest('div').append('<span class="valid-feedback"><strong>This email is  registered</strong></span>');

                                    $('#email').closest('div').children('span.loading-icon').addClass('hides');
                                    $('#email').closest('div').children('span.loading-icon').removeClass('shows');

                                }else{
                                    removePreviousLog();
                                    $('#email').closest('input').addClass('is-invalid');
                                    $('#email').closest('div').append('<span class="invalid-feedback"><strong>This email is not registered</strong></span>');

                                    $('#email').closest('div').children('span.loading-icon').addClass('hides');
                                    $('#email').closest('div').children('span.loading-icon').removeClass('shows');
                                }
                            }
                        });
                    }

                }
            });
        });
        function removePreviousLog(){
            $('#email').closest('input').removeClass('is-invalid');
            $('#email').closest('div').children('span.invalid-feedback').remove();

            $('#email').closest('input').removeClass('is-valid');
            $('#email').closest('div').children('span.valid-feedback').remove();
            $('#email').css('border-color','rgba(127, 136, 151, 0.2)');

        }


    </script>
@endsection
