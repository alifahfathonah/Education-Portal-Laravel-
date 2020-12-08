@extends('frontend.layouts.app')
@section('page-name')
    {{auth()->user()->first_name.' '.auth()->user()->last_name}}
@endsection
@section('main-content')
    <section class="profile-area">
        <div class="container">
            <div class="section-contentx">
                <div class="row">
                    <div class="col-sx-12 col-sm-4 col-md-4">
                        <div class="doctor-thumb">
                            <img src="{{url(auth()->user()->iamge ?:'uploads/mix/profile.jpg')}}" alt="">
                        </div>
                        <div class="info p-20 bg-black-333">
                            <h4 class="text-uppercase text-white text-center">{{auth()->user()->first_name.' '.auth()->user()->last_name}}</h4>
                            <ul class="list angle-double-right m-0">
                                <li class="mt-0 text-gray-silver text-center"><strong class="text-gray-lighter">Email</strong><br>{{auth()->user()->email}}</li>
                            </ul>

                            <ul class="styled-icons icon-gray icon-circled icon-sm mt-15 mb-15 text-center">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                            <style>
                                 ul li a i{
                                    line-height: 29px!important;
                                }
                            </style>
                            <a class="btn btnpro btn-info btn-flat mt-10 mb-sm-30" href="{{route('user.profile.edit')}}">Edit Profile</a>
                            <a class="btn btnpro btn-danger btn-flat mt-10 mb-sm-30" href="{{route('logout')}}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                            >Logout</a>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-8 col-md-8">
                        <div class="section-title">
                            <h2>My Test Result</h2>
                        </div>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th style="width: 40%;  font-size: 12px; text-align: left;">Model Test</th>
                                <th style="width: 15%; font-size: 12px; text-align: center">Total Marks</th>
                                <th style="width: 15%; font-size: 12px; text-align: center">Total Question</th>
                                <th style="width: 15%; font-size: 12px; text-align: center">Total Time</th>
                                <th style="width: 15%; font-size: 12px; text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td style="text-align: left; font-size: 13px;">Model Test 1</td>
                                <td style="text-align: center; font-size: 13px;">40</td>
                                <td style="text-align: center; font-size: 13px;">40</td>
                                <td style="text-align: center; font-size: 13px;">40 min</td>
                                <td align="center">
                                    <a class="btn theme-btn btn-mt pum-trigger" href="#" style="cursor: pointer; height: 35px; font-size: 12px;">View</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align: left; font-size: 13px;">Model Test 1</td>
                                <td style="text-align: center; font-size: 13px;">40</td>
                                <td style="text-align: center; font-size: 13px;">40</td>
                                <td style="text-align: center; font-size: 13px;">40 min</td>
                                <td align="center">
                                    <a class="btn theme-btn btn-mt pum-trigger" href="#" style="cursor: pointer; height: 35px; font-size: 12px;">View</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align: left; font-size: 13px;">Model Test 1</td>
                                <td style="text-align: center; font-size: 13px;">40</td>
                                <td style="text-align: center; font-size: 13px;">40</td>
                                <td style="text-align: center; font-size: 13px;">40 min</td>
                                <td align="center">
                                    <a class="btn theme-btn btn-mt pum-trigger" href="#" style="cursor: pointer; height: 35px; font-size: 12px;">View</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align: left; font-size: 13px;">Model Test 1</td>
                                <td style="text-align: center; font-size: 13px;">40</td>
                                <td style="text-align: center; font-size: 13px;">40</td>
                                <td style="text-align: center; font-size: 13px;">40 min</td>
                                <td align="center">
                                    <a class="btn theme-btn btn-mt pum-trigger" href="#" style="cursor: pointer; height: 35px; font-size: 12px;">View</a>
                                </td>
                            </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
