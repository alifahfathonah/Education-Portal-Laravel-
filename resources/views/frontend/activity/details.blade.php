@extends('frontend.layouts.innerapp')
@section('page-name')
    {{$activityPost->short_title}}
@endsection
@section('main-content')
    <section class="blog-area4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="blog-content-wrap">
                        <div class="blog-item">
                            <div class="blog-item" style="padding: 20px">
                                <div class="media">
                                    <img src="{{url($activityPost->logo)}}" class="align-self-center mr-3" alt="...">
                                    <div class="media-body">
                                        <h2 class="mt-0">{{$activityPost->title}}</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="blog-content">
                                <ul class="blog__list">
                                    <li>
                                        <span class="la la-user"></span>By
                                        <a href="javascript:void(0)">
                                            @foreach($admins as $admin)
                                                @if((int)$activityPost->created_by === (int)$admin->id)
                                                    {{$admin->name}}
                                                    @endif
                                            @endforeach
                                        </a>
                                    </li>
                                    <li><span class="fa fa-calendar fa-fw"></span>{{\Carbon\Carbon::parse($activityPost->created_at)->isoFormat('Do MMM, YYYY')}}</li>
                                </ul>
                                {!! $activityPost->description !!}
                                <div class="tags-item">
                                    <ul class="social__links">
                                        <li><span>Share:</span></li>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div><!-- end tags-item -->
                            </div><!-- end blog-content -->

                        </div><!-- end blog-post-item -->
                    </div><!-- end blog-post-wrapper -->
                </div><!-- end col-md-8-->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <style>
        .blog-content-wrap{
            border: 1px solid rgba(127, 136, 151, 0.2);
        }
        .blog-area4 .blog-content-wrap .blog-item .blog-content{
            border: none;
        }
    </style>
@endsection
