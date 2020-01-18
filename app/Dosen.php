<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';
    protected $fillable = ['nama_dosen', 'user_id', 'nip_nbm_dosen', 'kode_dosen'];

    public $timestamps = false;
}
