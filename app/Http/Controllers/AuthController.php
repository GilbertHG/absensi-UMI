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
            $tahun_ajaran = \App\TahunAjaran::all()->sortByDesc('id')->first();
            if($tahun_ajaran != ''){
                \Session::put('tahunajaran', $tahun_ajaran->tahun_ajaran);
    		  return redirect('/');
            }
            else{
                \Session::put('tahunajaran', 'kosong');
                return redirect('/');
            }
    	}

    	return redirect('/login')->with(['error' => 'Username atau Password salah!!']);
    }

    public function logout(Request $request){
    	Auth::logout();
        $request->session()->forget('tahunajaran');
    	return redirect('/login');
    }
}
