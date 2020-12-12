@extends('frontend.layouts.innerapp')
@section('page-name')
    Admission Information
@endsection
@section('main-content')
    <section class="modeltest-area">
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="home-section">
                        <div class="section-content">
                            <table class="table  rank-table">
                                <tbody>
                                    <tr>
                                        <td><img style="max-width: 60px;height: auto;border-radius: 10px" src="{{asset('frontend/asset/images/dep/u1.png')}}"></td>
                                        <td align="center" style="font-size: 18px;font-weight:bold;">Dhaka University</td>
                                        <td align="right"><button class="theme-button">Click Here</button></td>
                                    </tr>
                                    <tr>
                                        <td><img style="max-width: 60px;height: auto;border-radius: 10px" src="{{asset('frontend/asset/images/dep/u1.png')}}"></td>
                                        <td align="center">Dhaka University</td>
                                        <td align="right"><button class="theme-button">Click Here</button></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </section>
    <style>
        .section-content table tr td{
            border-bottom: 1px solid #dee2e6;
        }
        .theme-button{
            font-size: 15px;
            text-transform: uppercase;
            background-color: #f05323;
            color: #fff;
            font-weight: 500;
            letter-spacing: .1px;
            padding: 0 20px 0 20px;
            line-height: 40px;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            position: relative;
            z-index: 1;
            display: inline-block;
            -webkit-transition: .3s ease-in;
            -moz-transition: .3s ease-in;
            -ms-transition: .3s ease-in;
            -o-transition: .3s ease-in;
            transition: .3s ease-in;
            border: 0;
            overflow: hidden;
        }
    </style>
@endsection
