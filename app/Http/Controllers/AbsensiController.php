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
    public function dbdosen(){
        return view('admin.dashbord.dosen');
    }
}
