<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        //
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }
    public function edit($id)
    {

    }

    public function update($id, Request $request)
    {

    }

    public function delete($id)
    {

    }

    public function trashIndex()
    {

    }

    public function restore($id)
    {

    }

    public function forceDelete($id)
    {

    }
}
