@extends('frontend.layouts.innerapp')
@section('page-name')
    SOE Team
@endsection
@section('main-content')
    @foreach($panelNames as $panelName)
        <section class="team-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>{{$panelName->name}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($teams as $team)
                        @if($team->panel_name_id === $panelName->id)
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="team">
                            <img src="{{asset('uploads/team/main/'.$team->image)}}" alt="">
                            <div class="overlay-image"></div>
                            <div class="overlay-content">
                                <div class="social-icon">
                                    <ul>
                                        <li><a @if($team->facebook != null) target="_blank" @endif href="{{$team->facebook ? $team->facebook : 'javascript:void(0)'}}"><i class="fa fa-facebook"></i></a></li>
                                        <li><a @if($team->twitter != null) target="_blank" @endif href="{{$team->twitter ? $team->twitter : 'javascript:void(0)'}}"><i class="fa fa-twitter"></i></a></li>
                                        <li><a @if($team->linkedin != null) target="_blank" @endif href="{{$team->linkedin ? $team->linkedin : 'javascript:void(0)'}}"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a @if($team->gmail != null) target="_blank" @endif href="{{$team->gmail ? $team->gmail : 'javascript:void(0)'}}"><i class="fa fa-envelope"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-name">
                                <p>{{$team->name}}</p>
                            </div>
                            <div class="team-identity">
                                <p>{{$team->designation}}</p>
                            </div>
                        </div>
                    </div>
                        @endif
                    @endforeach
                </div><!-- end row -->
            </div><!-- end container -->
    </section>
    @endforeach
@endsection
