<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postController extends Controller
{
    public function index(){
        $loginInfo = session('loginInfo');
        return view('index')->with('loginInfo', $loginInfo);
    }
}
