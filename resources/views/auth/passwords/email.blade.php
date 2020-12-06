@extends('frontend.layouts.app')
@section('page-name')
    Password Reset
@endsection
@section('main-content')
    <section class="form-shared">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <div class="contact-form-action">
                        <div class="form-heading text-center">
                            <h3 class="form__title">Reset Password!</h3>
                        </div>
                        <!--Contact Form-->
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email')  }}">@csrf
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="Email" value="{{old('email')}}">
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
                                        <button id="resetBtn" class="theme-btn btn-block" type="submit">Send Password Reset Link</button>
                                    </div>
                                </div><!-- end col-md-12 -->
                            </div><!-- end row -->
                        </form>
                    </div><!-- end contact-form -->
                </div><!-- end col-md-7 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
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
            $('#resetBtn').prop('disabled',true);
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
                                    $('#resetBtn').prop('disabled',false);
                                    $('#email').closest('div').children('span.loading-icon').addClass('hides');
                                    $('#email').closest('div').children('span.loading-icon').removeClass('shows');
                                }else{
                                    $('#resetBtn').prop('disabled',true);
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


{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Reset Password') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    <form method="POST" action="{{ route('password.email') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}
{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Send Password Reset Link') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
