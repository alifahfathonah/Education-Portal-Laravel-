@extends('frontend.layouts.innerapp')
@section('page-name')
    News
@endsection
@section('main-content')
    <section class="course-area course-area3">
        <div class="course-content-wrapper">
            <div class="container">
                <div class="row course-item-wrap">
                    <div class="col-lg-12">
                        <div class="tab-content">
                            <div class="row course-block">
                                @foreach($newses as $news)
                                    <div class="col-lg-4">
                                    <div class="course-item">
                                        <div class="course-img">
                                            <a href="{{route('user.news.details',['slug'=>$news->slug])}}" class="course__img"><img src="{{url($news->thumb)}}" alt=""></a>
                                        </div><!-- end course-img -->
                                        <div class="course-content">
                                            <p class="course__label">
                                                Posted By:
                                                <span class="course__label-text">
                                                    @foreach($admins as $admin)
                                                        @if((int)$news->created_by ===(int) $admin->id)
                                                            {{$admin->name}}
                                                        @endif
                                                    @endforeach
                                                </span>

                                            </p>
                                            <h3 class="course__title">
                                                <a href="{{route('user.news.details',['slug'=>$news->slug])}}">{{\Illuminate\Support\Str::limit($news->title,60,'..')}}</a>
                                            </h3>
                                        </div><!-- end course-content -->
                                    </div><!-- end course-item -->
                                </div><!-- end col-lg-4 -->
                                @endforeach
                            </div>
                        </div><!-- end tab-content -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pagination-wrap">
                            <nav aria-label="Page navigation">
                                {{$newses->links()}}
                            </nav>
                        </div><!-- end pagination-wrap -->
                    </div><!-- end col-lg-12 -->
                </div>

            </div><!-- end container -->
        </div><!-- end course-content-wrapper -->
    </section>
@endsection
