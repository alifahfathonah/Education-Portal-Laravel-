@extends('frontend.layouts.innerapp')
@section('page-name')
    Tips and Tricks Details
@endsection
@section('main-content')
    <section class="blog-area4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="blog-content-wrap">
                        <div class="blog-item">
                            <div class="blog-img-box">
                                <img src="{{url('uploads/tips/main/'.$tips->image)}}" alt="">
                                <span class="blog__date">{{\Carbon\Carbon::parse($tips->created_at)->isoFormat('MMM Do, YYYY')}}</span>
                            </div>
                            <div class="blog-content">
                                <h3 class="blog__title">{{$tips->title}}</h3>
                                <ul class="blog__list">
                                    <li><span class="la la-user"></span>By
                                        <a href="javascript:void(0)">
                                            @foreach($admins as $admin)
                                                @if($admin->id === (int)$tips->created_by)
                                                    {{$admin->name}}
                                                @endif
                                            @endforeach
                                        </a></li>
                                    <li><span class="la la-tags"></span>
                                        <a href="javascript:void (0)">{{ucfirst($tips->category)}}</a>
                                    </li>
                                    <li><span class="la la-calendar"></span>{{\Carbon\Carbon::parse($tips->created_at)->isoFormat('MMM Do, YYYY')}}</li>
                                </ul>
                                {!! $tips->description !!}
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
                <div class="col-lg-4 col-sm-12">
                    <div class="sidebar">
                        <div class="sidebar-widget recent-widget">
                            <h3 class="widget__title">Related Tips and Tricks</h3>
                            <span class="section__divider"></span>
                            @foreach($relateds as $key=>$related)
                                @if($tips->id != $related->id)
                                    @if($key < 5)
                                        <div class="recent-item">
                                            <div class="recent-img">
                                                <a href="{{route('user.skill.details',['slug'=>$related->slug])}}">
                                                    <img src="{{url('uploads/tips/thumb/'.$related->thumb)}}" alt="blog image">
                                                </a>
                                            </div><!-- end recent-img -->
                                            <div class="recentpost-body">
                                                <span class="recent__meta">{{\Carbon\Carbon::parse($related->start_date)->isoFormat('Do MMM, YYYY')}}</span>
                                                <h4 class="recent__link">
                                                    <a href="{{route('user.event.detail',['slug'=>$related->slug])}}">{{\Illuminate\Support\Str::limit($related->title,60,'..')}}</a>
                                                </h4>
                                            </div><!-- end recent-img -->
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div><!-- end sidebar-widget -->
                    </div><!-- end sidebar -->
                </div><!-- end col-md-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
