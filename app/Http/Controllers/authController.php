<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    function index (){
        if (!Auth::check()){
            return view('auth.login');
        }else{
            return redirect('f');
        }
    }
    function login (Request $request){

        if(Auth::attempt(['email' => $request->username, 'password' => $request->password])){
            return redirect('f');
        }else{
            return redirect('auth/login');
        }
    }
    function logout(){
        Auth::logout();
        return redirect('auth/login');
    }
}
