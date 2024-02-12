<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return view('test.test');
    }
    public function add(Request $request)
    {
        dd($request->all());
    }
}
