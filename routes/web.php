<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'AbsensiController@index')->middleware('auth');

//Sistem Login
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

//Database
Route::group(['middleware' => ['auth', 'checkRole:Admin']],function(){
	Route::get('/db-dosen', 'AbsensiController@dosen');
	Route::post('/db-dosen/add', 'AbsensiController@dosenAdd');
	Route::post('/db-dosen/edit/{id}', 'AbsensiController@dosenEdit');
	Route::post('/db-dosen/delete/{id}', 'AbsensiController@dosenDelete');
	Route::get('/db-mahasiswa', 'AbsensiController@mahasiswa');
	Route::post('/db-mahasiswa/add', 'AbsensiController@mahasiswaAdd');
	Route::post('/db-mahasiswa/edit/{id}', 'AbsensiController@mahasiswaEdit');
	Route::post('/db-mahasiswa/delete/{id}', 'AbsensiController@mahasiswaDelete');
});

//Database Mata Kuliah
Route::group(['middleware' => ['auth', 'checkRole:Admin']],function(){
	Route::get('/db-mk', 'AbsensiController@mk');
	Route::post('/db-mk/add', 'AbsensiController@mkAdd');
	Route::post('/db-mk/edit/{id}', 'AbsensiController@mkEdit');
	Route::post('/db-mk/delete/{id}', 'AbsensiController@mkDelete');
	Route::get('/tahun-ajaran', 'AbsensiController@ta');
	Route::post('/tahun-ajaran/add', 'AbsensiController@taAdd');
	Route::post('/tahun-ajaran/edit/{id}', 'AbsensiController@taEdit');
	Route::post('/tahun-ajaran/delete/{id}', 'AbsensiController@taDelete');
});

//Sidebar Tahun Ajaran
Route::post('/tahunajaran', 'AbsensiController@tahunajaran')->middleware('auth');

//Isi KRS
Route::group(['middleware' => ['auth', 'checkRole:Admin']],function(){
	Route::get('/krs-mahasiswa', 'AbsensiController@krsMahasiswa');
	Route::get('/data-krs-mahasiswa/{id}', 'AbsensiController@dataKrsMahasiswa');
	Route::post('/data-krs-mahasiswa/delete/{id}', 'AbsensiController@dataKrsMahasiswaDelete');
	Route::get('/isi-krs-mahasiswa/{id}', 'AbsensiController@isiKrsMahasiswa');
	Route::post('/isi-krs-mahasiswa/add', 'AbsensiController@isiKrsMahasiswaAdd');
});

//Jadwal Mengajar
Route::group(['middleware' => ['auth', 'checkRole:Dosen']],function(){
	Route::get('/jadwal-ajar', 'AbsensiController@jadwalajar');
});

//Daftar Hadir Mahasiswa
Route::group(['middleware' => ['auth', 'checkRole:Dosen']],function(){
	Route::get('/daftar-hadir', 'AbsensiController@daftarhadir');
	Route::get('/daftar-hadir/list-peserta/', 'AbsensiController@listpeserta')->name('persentase');   
	Route::get('/daftar-hadir/list-peserta/absen', 'AbsensiController@absen')->name('absen');
	Route::post('/daftar-hadir/list-peserta/absen/input', 'AbsensiController@inputabsen');
});

//Ganti Password
Route::get('/gantiPassword','AuthController@editPassword')->middleware('auth');
Route::post('/changePassword','AuthController@changePassword')->name('changePassword')->middleware('auth');

//Jadwal Mata Kuliah
Route::group(['middleware' => ['auth', 'checkRole:Mahasiswa']],function(){
	Route::get('/jadwal-mata-kuliah', 'AbsensiController@jadwalMK');
});
Route::group(['middleware' => ['auth', 'checkRole:Mahasiswa,Dosen']],function(){
	Route::get('/kehadiran/{id}', 'AbsensiController@kehadiran');
	Route::post('/kehadiran/edit/{id}', 'AbsensiController@kehadiranEdit');
});

//Saran
Route::group(['middleware' => ['auth', 'checkRole:Mahasiswa']],function(){
	Route::get('/saran', 'AbsensiController@saran');
	Route::post('/saran/add', 'AbsensiController@saranAdd');
});
Route::group(['middleware' => ['auth', 'checkRole:Dosen']],function(){
	Route::get('/saran-masuk', 'AbsensiController@saranMasuk');
	Route::post('/saran-masuk/delete/{id}', 'AbsensiController@saranMasukDelete');
});

//File Kuliah
Route::get('/file-kuliah/{id}', 'AbsensiController@file')->middleware('auth');
