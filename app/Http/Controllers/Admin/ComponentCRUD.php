<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

interface ComponentCRUD
{
    //For Indexing
    public function index();
    //For Create Page View
    public function create();
    //For Store new Data
    public function store(Request $request);
    //For Edit page view
    public function edit($id);
    //For Store update Data
    public function update($id,Request $request);
    //For Delete Data
    public function delete($id);
}
