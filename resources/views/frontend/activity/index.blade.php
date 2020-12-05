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
                                        @foreach($activityPosts as $post)
                                            @foreach($post->activities as $activityName)
                                                @if((int)$activityName->id === (int)$activity->id )
                                                    @foreach($post->activityPanels as $panelName)
                                                        @if((int) $panelName->id === (int) $panel->id)
                                                        <li><a href="{{route('user.activity.post.detail',['slug'=>$post->slug])}}">
                                                                <img width="259" height="261" src="{{url($post->logo)}}"
                                                                     class="attachment-medium size-medium wp-post-image" alt="">{{$post->short_title}}</a>
                                                        </li>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endforeach
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
