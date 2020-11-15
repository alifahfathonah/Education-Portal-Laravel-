<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function information()
    {
        return view('frontend.information');
    }
}
