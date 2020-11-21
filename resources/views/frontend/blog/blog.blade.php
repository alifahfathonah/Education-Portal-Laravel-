@extends('frontend.layouts.innerapp')
@section('page-name')
    Blog
@endsection
@section('main-content')
    <section class="course-area course-area3">
        <div class="course-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="course-tab-wrap">
                            <ul class="course-tab-list nav nav-tabs justify-content-center text-center" role="tablist" id="review">
                                <li role="presentation">
                                    <a href="" class="active">
                                        All
                                    </a>
                                </li>
                                @foreach($categories as $category)
                                    <li role="presentation">
                                        <a href="{{route('user.blog.category',['category'=>$category->id])}}">
                                            {{$category->name}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div><!-- end course-tab-wrap -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end course-wrapper -->
    </section>
    <section class="course-area course-area3">
        <div class="course-content-wrapper">
            <div class="container">
                <div class="row course-item-wrap">
                    <div class="col-lg-12">
                        <div class="tab-content">
                            <div class="row course-block">
                                @foreach($blogs as $blog)
                                    <div class="col-lg-4">
                                        <div class="course-item">
                                            <div class="course-img">
                                                <a href="" class="course__img"><img src="{{url('uploads/blog/thumb/'.$blog->thumb)}}" alt=""></a>
                                            </div><!-- end course-img -->
                                            <div class="course-content">
                                                <p class="course__label">
                                                    Posted By:
                                                    <span class="course__label-text">
                                                        @foreach($admins as $admin)
                                                            @if($blog->created_by === $admin->id)
                                                                {{$admin->name}}
                                                            @endif
                                                        @endforeach
                                                    </span>
                                                </p>
                                                <h3 class="course__title">
                                                    <a href="">{{\Illuminate\Support\Str::limit($blog->title,100,'(...)')}}</a>
                                                </h3>
                                            </div><!-- end course-content -->
                                        </div><!-- end course-item -->
                                    </div>
                                @endforeach
                            </div><!-- end course-block -->
                        </div><!-- end tab-content -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pagination-wrap">
                            <nav aria-label="Page navigation">
{{--                                {{$skills->links()}}--}}
                            </nav>
                        </div><!-- end pagination-wrap -->
                    </div><!-- end col-lg-12 -->
                </div>
            </div><!-- end container -->
        </div><!-- end course-content-wrapper -->
    </section>
@endsection
