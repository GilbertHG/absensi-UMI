<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() {
    	return view('auth.login');
    }

    public function postlogin(Request $request) {
    	if(Auth::attempt($request->only('username','password'))){
    		return redirect('/');
    	}

    	return redirect('/login')->with(['error' => 'Username atau Password salah!!']);
    }

    public function logout(Request $request){
    	Auth::logout();
        $request->session()->forget('tahunajaran');
    	return redirect('/login');
    }
}
