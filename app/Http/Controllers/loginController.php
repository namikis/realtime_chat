<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Model\User;
use Hash;

class loginController extends Controller
{
    public function signUp(){
        return view('signUP')->with('loginInfo', 'loginInfo');
    }

    public function register(Request $request){
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'pass' => 'required'
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['pass']);
        $data['id'] = User::InsertUser($data);

        $request->session()->put('loginInfo', [
            'email' => $data['email'],
            'user_id' => $data['id'],
            'user_name' => $data['name']
        ]);

        return view('signUp_completed');
    }

    public function login(){
        return view('login');
    }

    public function auth(Request $request){
        $request->validate([
            'email' => 'required|email',
            'pass' => 'required|min:4'
        ]);

        $email = $request->email;
        $password = $request->pass;

        if(Auth::attempt(['email' => $email, 'password' => $password])){
            $data = User::getByEmail($email);

            $user = array(
                'user_name' => $data->name,
                'user_id' => $data->id,
                'email' => $email
            );

            $request->session()->put('loginInfo', $user);
            $loginInfo = session('loginInfo');

            return redirect('/index');
        }

        return view('login');
    }

    public function logout(Request $request){
        $loginInfo = session('loginInfo');
        if(!isset($loginInfo)){
            return redirect('/login');
        }

        $request->session()->invalidate();
        return redirect('/');
    }
}
