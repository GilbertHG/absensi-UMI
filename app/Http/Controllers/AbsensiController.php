<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use Carbon\Carbon;
use File;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\MkStoreRequest;
use Session;

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

    public function ta(){
    	$data_tahunAjaran = \App\TahunAjaran::all();
        return view('admin.dashboard.ta', [
        	'title'					=> 'Tahun Ajaran | Aplikasi Monitoring Absensi',
        	'data_tahunAjaran'		=> $data_tahunAjaran
        	]);
    }

    public function taAdd(UserStoreRequest $request){
    	$tahunAjaran = \App\TahunAjaran::create($request->all());

        return redirect('/tahun-ajaran')->with('sukses', "Tahun Ajaran berhasil di tambahkan.");
    }

    public function taEdit(UserUpdateRequest $request, $id){
    	$tahunAjaran = \App\TahunAjaran::find($id);
    	$tahunAjaran->update($request->all());

    	return redirect('/tahun-ajaran')->with('sukses', "Tahun Ajaran berhasil di ubah.");
    }

    public function taDelete(Request $request, $id){
    	$tahunAjaran = \App\TahunAjaran::find($id);
    	$tahunAjaran->delete();

    	return redirect('/tahun-ajaran')->with('sukses', "Tahun Ajaran berhasil di hapus.");
    }

    public function tahunajaran(Request $request){
    	\Session::put('tahunajaran', $request->tahunajaran);

    	return redirect('/'.$request->url);
    	
    }//PENTING!!!

    public function mk(){
    	$filterta = \Session::get('tahunajaran');
    	$data_mataKuliah = \App\MataKuliah::where('tahun_ajaran', $filterta)->get();
        return view('admin.dashboard.mk', [
        	'data_mataKuliah'		=> $data_mataKuliah,
        	'title'					=> 'Mata Kuliah | Aplikasi Monitoring Absensi' 
        	]);
    }

    public function mkAdd(MkStoreRequest $request){
    	$filterta = \Session::get('tahunajaran');
    	$dosen = \App\Dosen::where('nama_dosen', $request->dosen_mk)->first()	;

    	$request->request->add(['id_dosen' => $dosen->id]);
    	$request->request->add(['tahun_ajaran' => $filterta]);
    	$mataKuliah = \App\MataKuliah::create($request->all());

        return redirect('/db-mk')->with('sukses', "Mata Kuliah berhasil di tambahkan.");
    }

    public function mkEdit(Request $request, $id){
    	$dosen = \App\Dosen::where('nama_dosen', $request->dosen_mk)->first();
    	$mataKuliah = \App\MataKuliah::find($id);

    	$request->request->add(['id_dosen' => $dosen->id]);
    	$mataKuliah->update($request->all());

    	return redirect('/db-mk')->with('sukses', "Mata Kuliah berhasil di ubah.");
    }

    public function mkDelete(Request $request, $id){
    	$mataKuliah = \App\MataKuliah::find($id);
    	$mataKuliah->delete();

    	return redirect('/db-mk')->with('sukses', "Mata Kuliah berhasil di hapus.");
    }

    public function krsMahasiswa(){
		$data_mahasiswa = \App\Mahasiswa::all();
        return view('admin.dashboard.krs', [
			'data_mahasiswa'		=> $data_mahasiswa,
			'title'					=> 'KRS Mahasiswa | Aplikasi Monitoring Absensi'
		]);
	}
	public function dataKrsMahasiswa(){
        return view('admin.dashboard.dataKrs', [
			'title'					=> 'Data KRS Mahasiswa | Aplikasi Monitoring Absensi'
		]);
	}

	public function jadwalajar(){
		$filterta = \Session::get('tahunajaran');
		$data = \Auth::user()->id;
		$jadwalajar = \App\MataKuliah::where('id_dosen', '=', $data)->where('tahun_ajaran', $filterta)->get();
		
		return view('admin.dashboard.jadwalajar',[
			'title'				=> 'Tahun Ajaran | Aplikasi Monitoring Absensi',
			'jadwalajar'		=> $jadwalajar,
		]);
	}
	public function isiKrsMahasiswa(){
        return view('admin.dashboard.isiKrs', [
			'title'					=> 'Isi KRS Mahasiswa | Aplikasi Monitoring Absensi'
		]);
	}

    public function saran(){
        return view('admin.dashboard.saran', [
            'title'                 => 'Saran | Aplikasi Monitoring Absensi'
        ]);
    }

    public function saranAdd(UserStoreRequest $request){
        $saran = \App\Saran::create($request->all());

        return redirect('/saran')->with('sukses', "Saran Berhasil Di Kirim.");
    }

    public function saranMasuk(){
        $user = auth()->user()->name;
        $saran = \App\Saran::where('kepada', $user)->get();
        return view('admin.dashboard.saranMasuk', [
            'data_saran'            => $saran,
            'title'                 => 'Saran Masuk | Aplikasi Monitoring Absensi'
        ]);       
    }

    public function saranMasukDelete(Request $request, $id){
        $saran = \App\Saran::find($id);
        $saran->delete();

        return redirect('/saran-masuk')->with('sukses', "Pesan Berhasil Di Hapus.");
	}
	
	public function daftarHadir(){
		//$jadwalajar = \App\MkMahasiswa::with('mata_kuliah','mahasiswa')->where('id_dosen', '=', $data)->where('tahun_ajaran', $filterta)->get();
		$filterta = \Session::get('tahunajaran');
		$data = \Auth::user()->id;
		// $daftarhadir = \App\MataKuliah::whereHas("mkmahasiswas", function($q){
		// 	$q->where("id_mk","=","id");
		// })->where('id_dosen', '=', $data)->where('tahun_ajaran', $filterta)->get();
		$daftarhadir = \App\MataKuliah::with('mkmahasiswas')->where('id_dosen', '=', $data)->where('tahun_ajaran', $filterta)->get();
		return view('admin.dashboard.daftarhadir',[
			'title'                 => 'Daftar Hadir Mahasiswa | Aplikasi Monitoring Absensi',
			'daftarhadir'			=> $daftarhadir
		]);
	}

	public function listpeserta(Request $request){
		$data = $request->mk;
		$listpeserta = \App\MkMahasiswa::with('mahasiswa')->where('id_mk', '=', $data)->get();
		$matkul = \App\MkMahasiswa::with('mata_kuliah')->where('id_mk', '=', $data)->first();
		return view('admin.dashboard.listpeserta',[
			'title'                 => 'Daftar Hadir Mahasiswa | Aplikasi Monitoring Absensi',
			'listpeserta'			=> $listpeserta,
			'matkul'				=> $matkul
		]);
	}

	public function absen(Request $request){
		$data = $request->mk;
		$listpeserta = \App\MkMahasiswa::with('mahasiswa')->where('id_mk', '=', $data)->get();
		$matkul = \App\MkMahasiswa::with('mata_kuliah')->where('id_mk', '=', $data)->first();
		return view('admin.dashboard.absen',[
			'title'                 => 'Daftar Hadir Mahasiswa | Aplikasi Monitoring Absensi',
			'listpeserta'			=> $listpeserta,
			'matkul'				=> $matkul
		]);
	}
}
