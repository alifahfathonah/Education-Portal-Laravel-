@extends('frontend.layouts.innerapp')
@section('page-name')
    {{$activity->title}}
@endsection
@section('main-content')
    @foreach($activity->activityPanels as $panel)
        @if((int)$panel->status === 1)
            <section class="modeltest-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="home-section">
                                <div class="section-title">
                                    <h2>{{$panel->title}}</h2>
                                </div>
                                <div class="section-content">
                                    <ul>
                                        <li><a href="online-preparation-section.html">
                                                <img width="259" height="261" src="{{asset('frontend/asset/images/dep/cse.png')}}"
                                                     class="attachment-medium size-medium wp-post-image" alt="">Computer Science & Engineering</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endforeach
@endsection
