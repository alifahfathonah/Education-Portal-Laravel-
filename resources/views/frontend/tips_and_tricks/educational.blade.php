@extends('frontend.layouts.innerapp')
@section('page-name')
    Educational Tips and Tricks
@endsection
@section('main-content')
    <div class="tips-area">
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10 col-lg-10 col-sm-12 col-xs-12">
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
                                                    <h5 class="mt-0" style="font-size: 22px;">{{\Illuminate\Support\Str::limit($interview->title,240,'...')}}</h5>
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
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
@endsection
