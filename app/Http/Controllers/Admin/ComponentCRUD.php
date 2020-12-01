<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

interface ComponentCRUD
{
    public function index();
    public function create();
    public function store(Request $request);
    public function edit($id);
    public function update($id,Request $request);
    public function delete($id);
}
