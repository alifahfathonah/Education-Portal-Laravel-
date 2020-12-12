@extends('frontend.layouts.innerapp')
@section('page-name')
    Information
@endsection
@section('main-content')
    <section class="modeltest-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="home-section">
                        <div class="section-content">
                            <ul>
                                <li>
                                    <a href="{{route('user.information.admission')}}">
                                        <img width="259" height="261" src="{{asset('frontend/asset/images/dep/u1.png')}}"
                                             class="attachment-medium size-medium wp-post-image" alt="">Admission Information
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img width="259" height="261" src="{{asset('frontend/asset/images/dep/u2.png')}}"
                                             class="attachment-medium size-medium wp-post-image" alt="">Job Bazar Information
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img width="259" height="261" src="{{asset('frontend/asset/images/dep/u3.png')}}"
                                             class="attachment-medium size-medium wp-post-image" alt="">Written and Viva Information
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img width="259" height="261" src="{{asset('frontend/asset/images/dep/u4.png')}}"
                                             class="attachment-medium size-medium wp-post-image" alt="">Internship Information
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img width="259" height="261" src="{{asset('frontend/asset/images/dep/u5.jpg')}}"
                                             class="attachment-medium size-medium wp-post-image" alt="">At a glance of Ministry&Directorate
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

