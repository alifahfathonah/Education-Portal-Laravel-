@extends('frontend.layouts.innerapp')
@section('page-name')
    Soft Skill
@endsection
@section('main-content')
    <section class="course-area course-area3">
        <div class="course-content-wrapper">
            <div class="container">
                <div class="row course-item-wrap">
                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                        <div class="section-heading">
                            <h2 class="section__title">Soft Skill</h2>
                            <span class="section__divider"></span>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="tab-content">
                            <div class="row course-block">
                                @foreach($skills as $skill)
                                    <div class="col-lg-4">
                                        <div class="course-item">
                                            <div class="course-img">
                                                <a href="{{route('user.skill.softskill.details',['slug'=>$skill->slug])}}" class="course__img"><img src="{{url('uploads/skill/thumb/'.$skill->thumb)}}" alt=""></a>
                                            </div><!-- end course-img -->
                                            <div class="course-content">
                                                <p class="course__label">
                                                    Posted By:
                                                    <span class="course__label-text">
                                                        @foreach($admins as $admin)
                                                            @if($skill->created_by === $admin->id)
                                                                {{$admin->name}}
                                                            @endif
                                                        @endforeach
                                                    </span>
                                                </p>
                                                <h3 class="course__title">
                                                    <a href="{{route('user.skill.softskill.details',['slug'=>$skill->slug])}}">{{\Illuminate\Support\Str::limit($skill->title,100,'(...)')}}</a>
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
                    {{$skills->links()}}
{{--                    <div class="col-lg-12">--}}
{{--                        <div class="pagination-wrap">--}}
{{--                            <nav aria-label="Page navigation">--}}
{{--                                <ul class="pagination text-center justify-content-center">--}}
{{--                                    <li class="page-item">--}}
{{--                                        <a class="page-link" href="#" aria-label="Previous">--}}
{{--                                            <span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">4</a></li>--}}
{{--                                    <li class="page-item">--}}
{{--                                        <a class="page-link" href="#" aria-label="Next">--}}
{{--                                            <span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </nav>--}}
{{--                        </div><!-- end pagination-wrap -->--}}
{{--                    </div><!-- end col-lg-12 -->--}}
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end course-content-wrapper -->
    </section>
@endsection
