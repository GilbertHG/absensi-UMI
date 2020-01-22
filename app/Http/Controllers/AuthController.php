<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function editPassword(){
        return view('admin.dashboard.changePassword',[
			'title'                 => 'Ubah Password | Aplikasi Monitoring Absensi',
		]);
    }

    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

    }
}
