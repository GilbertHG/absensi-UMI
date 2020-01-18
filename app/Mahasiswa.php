<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $fillable = ['nama_mahasiswa', 'nim_mahasiswa', 'user_id', 'foto_mahasiswa', 'konsentrasi_mahasiswa'];

    public $timestamps = false;
}
