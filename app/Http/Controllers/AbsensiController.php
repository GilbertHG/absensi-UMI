<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use Carbon\Carbon;
use File;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserStoreRequest;

class AbsensiController extends Controller
{
    public function index(){
    	return view('admin.dashboard.index', [
    		'title'				=> 'Beranda | Aplikasi Monitoring Absensi'
    		]);
    }
    public function dosen(){
    	$data_dosen = \App\Dosen::all();
        return view('admin.dashboard.dosen', [
        	'data_dosen'		=> $data_dosen,
        	'title'				=> 'Database Dosen | Aplikasi Monitoring Absensi'
        	]);
    }

    public function dosenAdd(UserStoreRequest $request){

    	$validated = $request->validated();

    	//Insert table User
    	$user = new \App\User;
    	$user->role = 'Dosen';
    	$user->name = $request->nama_dosen;
    	$user->username = $request->nip_nbm_dosen;
    	$user->password = bcrypt('123456');
    	$user->remember_token = Str::random(60);
    	$user->save();

		//Insert table pegawai
    	$request->request->add(['user_id' => $user->id]);
    	$dosen = \App\Dosen::create($request->all());

        return redirect('/db-dosen')->with('sukses', "Dosen berhasil di tambahkan.");
    }

    public function dosenEdit(UserUpdateRequest $request, $id){
    	$dosen = \App\Dosen::find($id);
    	$dosen->update($request->all());

    	$user = \App\User::where('id', $dosen->user_id);
    	$user->update([
                'name'              => $request->nama_dosen,
                'username'          => $request->nip_nbm_dosen,
                ]);   

    	return redirect('/db-dosen')->with('sukses', "Data Dosen berhasil di ubah.");
    }

    public function dosenDelete(Request $request, $id){
    	$dosen = \App\Dosen::find($id);
    	$dosen->delete();

    	$user = \App\User::where('id', $dosen->user_id);
    	$user->delete();

    	return redirect('/db-dosen')->with('sukses', "Data Dosen berhasil di hapus.");
    }

    public function mahasiswa(){
    	$data_mahasiswa = \App\Mahasiswa::all();
        return view('admin.dashboard.mahasiswa', [
        	'data_mahasiswa'		=> $data_mahasiswa,
        	'title'					=> 'Database Mahasiswa | Aplikasi Monitoring Absensi'
        	]);
    }

    public function mahasiswaAdd(UserStoreRequest $request){
    	$validated = $request->validated();
    	if($request->hasFile('foto')) {
        	//get filename with extension
        	$filenamewithextension = $request->file('foto')->getClientOriginalName();
        	//get filename without extension
        	$filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        	//get file extension
        	$extension = $request->file('foto')->getClientOriginalExtension();
        	//filename to store
        	$filenametostore = $filename.'_'.time().'.'.$extension;
        	//Upload File
        	$request->file('foto')->storeAs('public/profil_images', $filenametostore);
        	//Resize image here
        	$fotopath = public_path('storage/profil_images/'.$filenametostore);
        	$img = Image::make($fotopath)->resize(354, 472)->save($fotopath);


    		//Insert table User
	    	$user = new \App\User;
	    	$user->role = 'Mahasiswa';
	    	$user->name = $request->nama_mahasiswa;
	    	$user->username = $request->nim_mahasiswa;
	    	$user->password = bcrypt('654321');
	    	$user->remember_token = Str::random(60);
	    	$user->save();
    	}
    	$request->request->add(['foto_mahasiswa' => $filenametostore]);
    	$request->request->add(['user_id' => $user->id]);
    	$mahasiswa = \App\Mahasiswa::create($request->all());
        return redirect('/db-mahasiswa')->with('sukses', "Mahasiswa Berhasil di Tambahkan.");
    }

    public function mahasiswaEdit(UserUpdateRequest $request, $id){
    	$mahasiswa = \App\Mahasiswa::find($id);
    	$user = \App\User::where('id', $mahasiswa->user_id);

    	if($request->hasFile('foto')) {
        	//get filename with extension
        	$filenamewithextension = $request->file('foto')->getClientOriginalName();
        	//get filename without extension
        	$filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        	//get file extension
        	$extension = $request->file('foto')->getClientOriginalExtension();
        	//filename to store
        	$filenametostore = $filename.'_'.time().'.'.$extension;
        	//delete existing file
        	$foto_lama = $request->foto_lama;
        	$destinationPath = 'storage/profil_images';
 			File::delete($destinationPath.'/'.$foto_lama);
        	//Upload File
        	$request->file('foto')->storeAs('public/profil_images', $filenametostore);
        	//Resize image here
        	$fotopath = public_path('storage/profil_images/'.$filenametostore);
        	$img = Image::make($fotopath)->resize(354, 472)->save($fotopath);

        	$user->update([
                'name'              => $request->nama_mahasiswa,
                'username'          => $request->nim_mahasiswa,
                ]);  

        	$request->request->add(['foto_mahasiswa' => $filenametostore]);
    		$mahasiswa->update($request->all());
        	return redirect('/db-mahasiswa')->with('sukses', "Data Mahasiswa Berhasil di Ubah.");
    	}
    	else{
    		$user->update([
    			'name'				=> $request->nama_mahasiswa,
    			'username'			=> $request->nim_mahasiswa,
    			]);

    		$mahasiswa->update($request->all());
        	return redirect('/db-mahasiswa')->with('sukses', "Data Mahasiswa Berhasil di Ubah.");
    	}
    }

    public function mahasiswaDelete(Request $request, $id){
    	//delete existing file
        $foto_lama = $request->foto;
        $destinationPath = 'storage/profil_images';
 		File::delete($destinationPath.'/'.$foto_lama);

    	$mahasiswa = \App\Mahasiswa::find($id);
    	$mahasiswa->delete();

    	$user = \App\User::where('id', $mahasiswa->user_id);
    	$user->delete();

    	return redirect('/db-mahasiswa')->with('sukses', "Data Mahasiswa berhasil di hapus.");
    }
}
