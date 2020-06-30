<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function top(){
        $loginInfo = session('loginInfo');
        return view('top')->with('loginInfo', $loginInfo);
    }
}
