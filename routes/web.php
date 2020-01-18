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
Route::get('/tahun-ajaran', 'AbsensiController@ta')->middleware('auth');
