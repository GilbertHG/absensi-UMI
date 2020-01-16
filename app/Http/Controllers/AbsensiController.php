<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use Carbon\Carbon;
use File;

class AbsensiController extends Controller
{
    public function index(){
    	return view('admin.dashboard.index');
    }
    public function dosen(){
        return view('admin.dashboard.dosen');
    }
    public function mk(){
        return view('admin.dashboard.mk');
    }
    public function ta(){
        return view('admin.dashboard.ta');
    }
}
