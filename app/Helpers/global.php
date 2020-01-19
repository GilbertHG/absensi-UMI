<?php 

use App\TahunAjaran;

function dropdownta()
{
	$data_dropdownta = \App\TahunAjaran::all();
	return $data_dropdownta;
}