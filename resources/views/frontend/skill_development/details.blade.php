@extends('frontend.layouts.innerapp')
@section('page-name')
    Skill Development Details
@endsection
@section('main-content')
    <section class="blog-area4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="blog-content-wrap">
                        <div class="blog-item">
                            <div class="blog-img-box">
                                <img src="{{url('uploads/skill/main/'.$skill->image)}}" alt="">
                                <span class="blog__date">{{\Carbon\Carbon::parse($skill->created_at)->isoFormat('MMM Do, YYYY')}}</span>
                            </div>
                            <div class="blog-content">
                                <h3 class="blog__title">{{$skill->title}}</h3>
                                <ul class="blog__list">
                                    <li><span class="la la-user"></span>By
                                        <a href="javascript:void(0)">
                                            @foreach($admins as $admin)
                                                @if($admin->id === (int)$skill->created_by)
                                                    {{$admin->name}}
                                                @endif
                                            @endforeach
                                        </a></li>
                                    <li><span class="la la-tags"></span>
                                        <a href="javascript:void (0)">{{ucfirst($skill->category)}}</a>
                                    </li>
                                    <li><span class="la la-calendar"></span>{{\Carbon\Carbon::parse($skill->created_at)->isoFormat('MMM Do, YYYY')}}</li>
                                </ul>
                                {!! $skill->description !!}
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
                            <h3 class="widget__title" style="font-size: 22px;">Related Skill Development</h3>
                            <span class="section__divider"></span>
                            @foreach($relateds as $key=>$related)
                                @if($skill->id != $related->id)
                                    @if($key < 5)
                                        <div class="recent-item">
                                            <div class="recent-img">
                                                <a href="{{route('user.skill.details',['slug'=>$related->slug])}}">
                                                    <img src="{{url('uploads/skill/thumb/'.$related->thumb)}}" alt="blog image">
                                                </a>
                                            </div><!-- end recent-img -->
                                            <div class="recentpost-body">
                                                <span class="recent__meta">{{\Carbon\Carbon::parse($related->start_date)->isoFormat('Do MMM, YYYY')}}</span>
                                                <h4 class="recent__link">
                                                    <a href="{{route('user.skill.details',['slug'=>$related->slug])}}">{{\Illuminate\Support\Str::limit($related->title,60,'..')}}</a>
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
