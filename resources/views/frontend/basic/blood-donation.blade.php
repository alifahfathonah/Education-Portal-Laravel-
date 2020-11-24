@extends('frontend.layouts.innerapp')
@section('page-name')
    Blood Donation
@endsection
@section('main-content')
    <div class="donar-gallery">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <h2 class="section__title">Blood Donation Camp</h2>
                        <span class="section__divider"></span>
                    </div><!-- end section-heading -->
                </div><!-- end col-md-8 -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="blood-point">
                        <div class="img">
                            <img src="{{asset('frontend/asset/images/img5.jpg')}}" alt="">
                        </div>
                        <div class="text">
                            <p>Lorem ipsum dolor sit amet</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="blood-point">
                        <div class="img">
                            <img src="{{asset('frontend/asset/images/img5.jpg')}}" alt="">
                        </div>
                        <div class="text">
                            <p>Lorem ipsum dolor sit amet</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="blood-point">
                        <div class="img">
                            <img src="{{asset('frontend/asset/images/img5.jpg')}}" alt="">
                        </div>
                        <div class="text">
                            <p>Lorem ipsum dolor sit amet</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="blood-point">
                        <div class="img">
                            <img src="{{asset('frontend/asset/images/img5.jpg')}}" alt="">
                        </div>
                        <div class="text">
                            <p>Lorem ipsum dolor sit amet</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="blood-point">
                        <div class="img">
                            <img src="{{asset('frontend/asset/images/img5.jpg')}}" alt="">
                        </div>
                        <div class="text">
                            <p>Lorem ipsum dolor sit amet</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="blood-point">
                        <div class="img">
                            <img src="{{asset('frontend/asset/images/img5.jpg')}}" alt="">
                        </div>
                        <div class="text">
                            <p>Lorem ipsum dolor sit amet</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="get-start-area get-start-area2 blood-donor">
        <div class="box-icons">
            <div class="box-one"></div>
            <div class="box-two"></div>
            <div class="box-three"></div>
            <div class="box-four"></div>
        </div><!-- end box-icons -->
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="section-heading">
                        <h2 class="section__title section__title2">Become A <span style="color: #EE5222;">Blood Donor</span></h2>
                        <div class="heading-content-box">
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor ut perspiciatis, alias non provident, eaque architecto, facilis molestias labore nisi minima iusto ducimus placeat sequi doloribus. Esse minus laborum consequuntur!</p>
                        </div>
                    </div><!-- end section-heading -->
                </div>
                <div class="col-lg-5 d-flex align-items-center justify-content-center">
                    <div class="get-start-btn">
                        <a href="{{route('register')}}" class="btn btn-success btn-lg">Register Now</a>
                    </div>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
        <div class="box-icons2">
            <div class="box-one"></div>
            <div class="box-two"></div>
            <div class="box-three"></div>
            <div class="box-four"></div>
            <div class="box-five"></div>
        </div><!-- end box-icons2 -->
    </section><!-- end get-start-area -->

    <section class="blood-rule">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="rules">
                        <div class="headline">
                            <h2>Why donate Blood?</h2>
                        </div>
                        <div class="text">
                            <ul>
                                <li> <i class="fa fa-arrow-right"></i> Lorem ipsum dolor sit amet, consectetur  </li>
                                <li> <i class="fa fa-arrow-right"></i> Lorem ipsum dolor sit amet, consectetur  </li>
                                <li> <i class="fa fa-arrow-right"></i> Lorem ipsum dolor sit amet, consectetur  </li>
                                <li> <i class="fa fa-arrow-right"></i> Lorem ipsum dolor sit amet, consectetur  </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="rules">
                        <div class="headline">
                            <h2>Why donate Blood?</h2>
                        </div>
                        <div class="text">
                            <ul>
                                <li> <i class="fa fa-arrow-right"></i> Lorem ipsum dolor sit amet, consectetur  </li>
                                <li> <i class="fa fa-arrow-right"></i> Lorem ipsum dolor sit amet, consectetur  </li>
                                <li> <i class="fa fa-arrow-right"></i> Lorem ipsum dolor sit amet, consectetur  </li>
                                <li> <i class="fa fa-arrow-right"></i> Lorem ipsum dolor sit amet, consectetur  </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="modeltest-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="home-section">
                        <div class="section-title">
                            <h2>Donor List</h2>
                        </div>
                        <div class="section-content">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Blood Group</th>
                                    <th>District</th>
                                    <th>Last Donation</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>01</td>
                                    <td>Md Ashikul Islam</td>
                                    <td>AB-</td>
                                    <td>Jashore</td>
                                    <td>30-12-2020</td>
                                </tr>
                                <tr>
                                    <td>01</td>
                                    <td>Md Ashikul Islam</td>
                                    <td>AB-</td>
                                    <td>Jashore</td>
                                    <td>30-12-2020</td>
                                </tr>
                                <tr>
                                    <td>01</td>
                                    <td>Md Ashikul Islam</td>
                                    <td>AB-</td>
                                    <td>Jashore</td>
                                    <td>30-12-2020</td>
                                </tr>
                                <tr>
                                    <td>01</td>
                                    <td>Md Ashikul Islam</td>
                                    <td>AB-</td>
                                    <td>Jashore</td>
                                    <td>30-12-2020</td>
                                </tr>
                                <tr>
                                    <td>01</td>
                                    <td>Md Ashikul Islam</td>
                                    <td>AB-</td>
                                    <td>Jashore</td>
                                    <td>30-12-2020</td>
                                </tr>
                                <tr>
                                    <td>01</td>
                                    <td>Md Ashikul Islam</td>
                                    <td>AB-</td>
                                    <td>Jashore</td>
                                    <td>30-12-2020</td>
                                </tr>
                                <tr>
                                    <td>01</td>
                                    <td>Md Ashikul Islam</td>
                                    <td>AB-</td>
                                    <td>Jashore</td>
                                    <td>30-12-2020</td>
                                </tr>
                                <tr>
                                    <td>01</td>
                                    <td>Md Ashikul Islam</td>
                                    <td>AB-</td>
                                    <td>Jashore</td>
                                    <td>30-12-2020</td>
                                </tr>
                                <tr>
                                    <td>01</td>
                                    <td>Md Ashikul Islam</td>
                                    <td>AB-</td>
                                    <td>Jashore</td>
                                    <td>30-12-2020</td>
                                </tr>
                                <tr>
                                    <td>01</td>
                                    <td>Md Ashikul Islam</td>
                                    <td>AB-</td>
                                    <td>Jashore</td>
                                    <td>30-12-2020</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
