<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function signUp(){
        return view('signUP')->with('loginInfo', 'loginInfo');
    }
}
