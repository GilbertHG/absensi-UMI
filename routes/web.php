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
Route::get('/db-dosen', 'AbsensiController@dosen')->middleware('auth');
Route::post('/db-dosen/add', 'AbsensiController@dosenAdd')->middleware('auth');
Route::post('/db-dosen/edit/{id}', 'AbsensiController@dosenEdit')->middleware('auth');
Route::post('/db-dosen/delete/{id}', 'AbsensiController@dosenDelete')->middleware('auth');
Route::get('/db-mahasiswa', 'AbsensiController@mahasiswa')->middleware('auth');
Route::post('/db-mahasiswa/add', 'AbsensiController@mahasiswaAdd')->middleware('auth');
Route::post('/db-mahasiswa/edit/{id}', 'AbsensiController@mahasiswaEdit')->middleware('auth');
Route::post('/db-mahasiswa/delete/{id}', 'AbsensiController@mahasiswaDelete')->middleware('auth');

//Database Mata Kuliah
Route::get('/db-mk', 'AbsensiController@mk')->middleware('auth');
Route::post('/db-mk/add', 'AbsensiController@mkAdd')->middleware('auth');
Route::post('/db-mk/edit/{id}', 'AbsensiController@mkEdit')->middleware('auth');
Route::post('/db-mk/delete/{id}', 'AbsensiController@mkDelete')->middleware('auth');
Route::get('/tahun-ajaran', 'AbsensiController@ta')->middleware('auth');
Route::post('/tahun-ajaran/add', 'AbsensiController@taAdd')->middleware('auth');
Route::post('/tahun-ajaran/edit/{id}', 'AbsensiController@taEdit')->middleware('auth');
Route::post('/tahun-ajaran/delete/{id}', 'AbsensiController@taDelete')->middleware('auth');
Route::post('/tahunajaran', 'AbsensiController@tahunajaran')->middleware('auth');

//Isi KRS
Route::get('/krs-mahasiswa', 'AbsensiController@krsMahasiswa')->middleware('auth');
Route::get('/data-krs-mahasiswa', 'AbsensiController@dataKrsMahasiswa')->middleware('auth');
Route::get('/isi-krs-mahasiswa', 'AbsensiController@isiKrsMahasiswa')->middleware('auth');

//Saran
Route::get('/saran', 'AbsensiController@saran')->middleware('auth');
Route::post('/saran/add', 'AbsensiController@saranAdd')->middleware('auth');
Route::get('/saran-masuk', 'AbsensiController@saranMasuk')->middleware('auth');
Route::post('/saran-masuk/delete/{id}', 'AbsensiController@saranMasukDelete')->middleware('auth');

