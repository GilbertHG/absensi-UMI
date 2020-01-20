<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saran extends Model
{
    protected $table = 'saran';
    protected $fillable = ['nama_pengirim', 'kepada', 'judul', 'nim', 'isi'];

    public $timestamps = false;
}
