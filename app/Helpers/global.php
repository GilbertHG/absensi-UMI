<?php 

use App\TahunAjaran;

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