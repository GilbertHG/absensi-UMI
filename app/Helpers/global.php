<?php 

use App\TahunAjaran;
use App\Mahasiswa;
use App\User;

function dropdownta()
{
	$data_dropdownta = \App\TahunAjaran::all()->sortByDesc('id');
	return $data_dropdownta;
}

function dropdownds()
{
	$data_dropdownds = \App\Dosen::all();
	return $data_dropdownds;
}

function userMahasiswa()
{
	$user = $user = auth()->user()->id;

	$data_mahasiswa = \App\Mahasiswa::where('user_id', $user);
	return $data_mahasiswa;
}