@extends('frontend.layouts.innerapp')
@section('page-name')
    Interview Tips
@endsection
@section('main-content')
    <div class="tips-area">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
                    <div class="tips-content">
                        <ul class="main">
                            @foreach($interviews as $interview)
                                <li>
                                <div class="media">
                                    <a href="{{route('user.tips.details',['slug'=>$interview->slug])}}">
                                        <img src="{{url('uploads/tips/thumb/'.$interview->thumb)}}" class="align-self-center mr-3" alt="{{$interview->title}}">
                                    </a>
                                    <div class="media-body">
                                        <div class="heading">
                                            <a href="{{route('user.tips.details',['slug'=>$interview->slug])}}">
                                                <h5 class="mt-0">{{\Illuminate\Support\Str::limit($interview->title,150,'...')}}</h5>
                                            </a>
                                        </div>
                                        <div class="social">
                                            <ul>
                                                <li><a href=""> <i class="fa fa-facebook"></i></a></li>
                                                <li><a href=""> <i class="fa fa-twitter"></i></a></li>
                                                <li><a href=""> <i class="fa fa-instagram"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                    <div class="sidebar">
                        <div class="heading">
                            <h2>Most Popular</h2>
                        </div>
                        @foreach($populars as $popular)
                            <div class="popular-list">
                            <div class="media">
                                <a href="{{route('user.tips.details',['slug'=>$popular->slug])}}">
                                    <img src="{{url('uploads/tips/thumb/'.$popular->thumb)}}" class="align-self-center mr-3" alt="...">
                                </a>
                                <div class="media-body">
                                    <a href="{{route('user.tips.details',['slug'=>$popular->slug])}}">
                                        <h5 class="mt-0">{{\Illuminate\Support\Str::limit($popular->title,55,'..')}}</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                    <div class="pagination-wrap">
                        <nav aria-label="Page navigation">
                            {{$interviews->links()}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
