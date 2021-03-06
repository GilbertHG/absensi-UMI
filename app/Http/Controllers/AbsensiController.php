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
use App\Http\Requests\AbsenRequest;
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

        $mk_diambil = \App\MkMahasiswa::where('id_mk', $id)->get();

        foreach($mk_diambil as $mkdiambil){
            $mkdiambil->delete();    
        }

        $absen = \App\Absen::where('id_mk', $id)->get();

        foreach($absen as $absen){
            $absen->delete();
        }

        $file = \App\FileKuliah::where('id_mk', $id)->get();

        foreach($file as $data){
            // hapus file
            $file = $data->file;
            $destinationPath = 'file_kuliah';
            File::delete($destinationPath.'/'.$file);
            $data->delete();
        }
        
    	return redirect('/db-mk')->with('sukses', "Mata Kuliah berhasil di hapus.");
    }

    public function krsMahasiswa(){
        $filterta = \Session::get('tahunajaran');
		$data_mahasiswa = \App\Mahasiswa::all();
        $data_matkul = \App\MataKuliah::where('tahun_ajaran', $filterta)->pluck('id');
        $data_matkul_ambil    = \App\MkMahasiswa::whereIn('id_mk', $data_matkul)->get();
        return view('admin.dashboard.krs', [
			'data_mahasiswa'		=> $data_mahasiswa,
            'data_matkul_ambil'     => $data_matkul_ambil,
			'title'					=> 'KRS Mahasiswa | Aplikasi Monitoring Absensi'
		]);
	}
	public function dataKrsMahasiswa(Request $request, $id){
        $data_mahasiswa = \App\Mahasiswa::where('id', $id)->first();
        $data_matkul    = \App\MkMahasiswa::with('mata_kuliah')->where('id_mahasiswa', $id)->get();
        return view('admin.dashboard.dataKrs', [
            'mahasiswa'             => $data_mahasiswa,
            'matkul'                => $data_matkul,
			'title'					=> 'Data KRS Mahasiswa | Aplikasi Monitoring Absensi'
		]);
	}

    public function dataKrsMahasiswaDelete(Request $request, $id){
        $mataKuliah = \App\MkMahasiswa::find($id);
        $mataKuliah->delete();

        $absen = \App\Absen::where('id_mk', $mataKuliah->id_mk)->where('id_mahasiswa', $mataKuliah->id_mahasiswa)->get();

        foreach($absen as $absen){
            $absen->delete();
        }

        return redirect('/data-krs-mahasiswa/'.$request->id_mahasiswa)->with('sukses', "Mata Kuliah berhasil di hapus.");
    }

    public function isiKrsMahasiswa(Request $request, $id){
        $data_mahasiswa = \App\Mahasiswa::where('id', $id)->first();
        $filterta = \Session::get('tahunajaran');
        $krs = \App\MkMahasiswa::where('id_mahasiswa', $id)->pluck('id_mk');
        $data_mataKuliah = \App\MataKuliah::whereNotIn('id', $krs)->where('tahun_ajaran', $filterta)->get();
        return view('admin.dashboard.isiKrs', [
            'mahasiswa'             => $data_mahasiswa,
            'matkul'                => $data_mataKuliah,
            'title'                 => 'Isi KRS Mahasiswa | Aplikasi Monitoring Absensi'
        ]);
    }

    public function isiKrsMahasiswaAdd(Request $request){
        $mataKuliah = $request->mataKuliah;

        if($mataKuliah != NULL){
            foreach ($mataKuliah as $mataKuliah_id) {
                \App\MkMahasiswa::create([
                'id_mk' => $mataKuliah_id,
                'id_mahasiswa' => $request->id_mahasiswa,
            ]);
            }
        return redirect('/data-krs-mahasiswa/'.$request->id_mahasiswa)->with('sukses', "Mata Kuliah berhasil di tambah.");
        } 
        return redirect('/data-krs-mahasiswa/'.$request->id_mahasiswa)->with('sukses', "Tidak Ada Mata Kuliah yang di Tambahkan.");

    }

	public function jadwalajar(){
		$filterta = \Session::get('tahunajaran');
		$data = \Auth::user()->name;
		$jadwalajar = \App\MataKuliah::where('dosen_mk', $data)->where('tahun_ajaran', $filterta)->get();
		
		return view('admin.dashboard.jadwalajar',[
			'title'				=> 'Jadwal Mengajar | Aplikasi Monitoring Absensi',
			'jadwalajar'		=> $jadwalajar,
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
		$data = \Auth::user()->name;
		// $daftarhadir = \App\MataKuliah::whereHas("mkmahasiswas", function($q){
		// 	$q->where("id_mk","=","id");
		// })->where('id_dosen', '=', $data)->where('tahun_ajaran', $filterta)->get();
		$daftarhadir = \App\MataKuliah::with('mkmahasiswas')->where('dosen_mk', $data)->where('tahun_ajaran', $filterta)->get();
		return view('admin.dashboard.daftarhadir',[
			'title'                 => 'Daftar Hadir Mahasiswa | Aplikasi Monitoring Absensi',
			'daftarhadir'			=> $daftarhadir
		]);
	}

	public function listpeserta(Request $request){
		$data = $request->mk;
		$listpeserta = \App\MkMahasiswa::with('mahasiswa')->where('id_mk', '=', $data)->get(); //important
        $mataKuliah = \App\MkMahasiswa::where('id_mk', $data)->first();
		$matkul = \App\MataKuliah::where('id', $data)->first();
        $absen = \App\Absen::where('id_mk', $data);
		
		return view('admin.dashboard.listpeserta',[
			'title'                 => 'Daftar Hadir Mahasiswa | Aplikasi Monitoring Absensi',
			'listpeserta'			=> $listpeserta,
			'matkul'				=> $matkul,
            'mataKuliah'            => $mataKuliah,
			'absen'					=> $absen
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

	public function inputabsen(AbsenRequest $request){
		$pertemuan = $request->pertemuan; 
		// $matkul = $request->id_mk;
		// if(\App\Absen::where('pertemuan', '=' , $pertemuan)->exist()){
		// 	return 'Data Telah Ada';
		// }
		// dd($request->all());
		$idmahasiswa = $request->id_mahasiswa;
		$status = $request->status;
		$count = count($request->id_mahasiswa);
		
		for ($i = 0; $i < $count; $i++) {
			if(\App\Absen::where('pertemuan', '=', $pertemuan)
			->where('id_mahasiswa', $idmahasiswa[$i])
            ->where('id_mk', $request->id_mk)
			->first()) {
				return redirect('/daftar-hadir/list-peserta/absen?mk='.$request->id_mk)->with('error', 'Pertemuan Telah Terisi!');
			}
            \App\Absen::create([
				'id_mk' => $request->id_mk,
				'pertemuan' => $request->pertemuan,
				'id_mahasiswa' => $idmahasiswa[$i],
				'status'	=> $status[$i],
				'tanggal_kuliah'	=> $request->tanggal_kuliah,
        	]);
		}

        //Persentase
        $data_mahasiswa = \App\MkMahasiswa::where('id_mk', $request->id_mk)->get();

        foreach($data_mahasiswa as $mahasiswa){
            $data_absensi = \App\Absen::where('id_mk', $request->id_mk)->where('id_mahasiswa', $mahasiswa->id_mahasiswa)->where('status', 1)->count();
            $data_izin = \App\Absen::where('id_mk', $request->id_mk)->where('id_mahasiswa', $mahasiswa->id_mahasiswa)->where('status', 3)->count();
            $data_sakit = \App\Absen::where('id_mk', $request->id_mk)->where('id_mahasiswa', $mahasiswa->id_mahasiswa)->where('status', 4)->count();

            $jumlah_absensi = \App\Absen::where('id_mk', $request->id_mk)->where('id_mahasiswa', $mahasiswa->id_mahasiswa)->count();

            $data_persentase = \App\MkMahasiswa::where('id_mk', $request->id_mk)->where('id_mahasiswa', $mahasiswa->id_mahasiswa)->first();

            $persentase = ($data_absensi + ($data_izin/2) + ($data_sakit/2))  / $jumlah_absensi * 100;

            $data_persentase->update([
                'persentase'           => $persentase,
                ]);

        }

		return redirect('/daftar-hadir/list-peserta?mk='.$request->id_mk)->with('sukses', 'Absensi Berhasil Terisi!');
	}

	public function jadwalMK(Request $request) {
        $data_matkul    = \App\MkMahasiswa::with('mata_kuliah')->where('id_mahasiswa', userMahasiswa()->id)->get();
        return view('admin.dashboard.jadwalMK', [
			'matkul'		        => $data_matkul,
			'title'					=> 'Jadwal Mata Kuliah | Aplikasi Monitoring Absensi'
		]);
	}

	public function kehadiran(Request $request, $id) {
        $data_mkDiambil = \App\MkMahasiswa::find($id);
        $data_matkul = \App\MataKuliah::where('id', $data_mkDiambil->id_mk)->first();
        $data_mahasiswa = \App\Mahasiswa::where('id', $data_mkDiambil->id_mahasiswa)->first();
        $data_absen = \App\Absen::where('id_mahasiswa', $data_mkDiambil->id_mahasiswa)->where('id_mk', $data_mkDiambil->id_mk)->get();
        return view('admin.dashboard.kehadiran', [
            'mahasiswa'             => $data_mahasiswa,
            'absen'                 => $data_absen,
            'matkul'                => $data_matkul,
			'title'					=> 'Kehadiran | Aplikasi Monitoring Absensi'
		]);
	}

    public function kehadiranEdit(Request $request, $id){
        $data_absen = \App\Absen::find($id);

        $data_absen->update([
                'status'              => $request->status,
                ]);

        $data_absensi = \App\Absen::where('id_mk', $data_absen->id_mk)->where('id_mahasiswa', $data_absen->id_mahasiswa)->where('status', 1)->count();
        $data_izin = \App\Absen::where('id_mk', $data_absen->id_mk)->where('id_mahasiswa', $data_absen->id_mahasiswa)->where('status', 3)->count();
        $data_sakit = \App\Absen::where('id_mk', $data_absen->id_mk)->where('id_mahasiswa', $data_absen->id_mahasiswa)->where('status', 4)->count();
        $jumlah_absensi = \App\Absen::where('id_mk', $data_absen->id_mk)->where('id_mahasiswa', $data_absen->id_mahasiswa)->count();

        $data_persentase = \App\MkMahasiswa::where('id_mk', $data_absen->id_mk)->where('id_mahasiswa', $data_absen->id_mahasiswa)->first();

        $persentase = ($data_absensi + ($data_izin/2) + ($data_sakit/2))  / $jumlah_absensi * 100;

        $data_persentase->update([
                'persentase'           => $persentase,
                ]);

        return redirect('/kehadiran/'.$request->id_mkDiambil)->with('sukses', "Status Kehadiran Berhasil di Ubah.");
    }

    public function file($id){
        $data_matkul = \App\MataKuliah::find($id);
        $data_file = \App\FileKuliah::where('id_mk', $id)->get();
        return view('admin.dashboard.file', [
            'file'                  => $data_file,
            'matkul'                => $data_matkul,
            'title'                 => 'File Perkuliahan | Aplikasi Monitoring Absensi'
        ]);
    }

    public function fileAdd(Request $request){
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');
 
        $nama_file = time()."_".$file->getClientOriginalName();
 
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'file_kuliah';
        $file->move($tujuan_upload,$nama_file);
        
        $dt = Carbon::now();
        \App\FileKuliah::create([
            'file' => $nama_file,
            'deskripsi_file' => $request->deskripsi_file,
            'judul_file'     => $request->judul_file,
            'id_mk'          => $request->id_mk,
            'tanggal_upload' => $dt,
        ]);
 
        return redirect('/file-kuliah/'.$request->id_mk)->with('sukses', "File Berhasil di Tambahkan.");
    }

    public function fileEdit(Request $request, $id){
        $data_file = \App\FileKuliah::find($id);
        if($request->hasFile('file')) {
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('file');
 
            $nama_file = time()."_".$file->getClientOriginalName();
 
            // hapus file yang sudah ada
            $file_lama = $request->file_lama;
            $destinationPath = 'file_kuliah';
            File::delete($destinationPath.'/'.$file_lama);
            //Upload File
            $tujuan_upload = 'file_kuliah';
            $file->move($tujuan_upload,$nama_file);
            
            $data_file->update([
                'file' => $nama_file,
                'deskripsi_file' => $request->deskripsi_file,
                'judul_file'     => $request->judul_file,
                ]);  

            return redirect('/file-kuliah/'.$request->id_mk)->with('sukses', "File Berhasil di Edit.");
        }
        else{
             $data_file->update([
                'deskripsi_file' => $request->deskripsi_file,
                'judul_file'     => $request->judul_file,
                ]);  

            return redirect('/file-kuliah/'.$request->id_mk)->with('sukses', "File Berhasil di Edit.");
        }
    }

    public function fileDelete(Request $request, $id){
        // hapus file
        $file = $request->file;
        $destinationPath = 'file_kuliah';
        File::delete($destinationPath.'/'.$file);

        $data_file = \App\FileKuliah::find($id);
        $data_file->delete();

        return redirect('/file-kuliah/'.$request->id_mk)->with('sukses', "File Berhasil di Hapus.");
    }

    public function fileDownload($id){
        $data_file = \App\FileKuliah::find($id);
        $file_name = $data_file->file;

        $file_path = public_path('file_kuliah/'.$file_name);
        return response()->download($file_path);
    }

}
