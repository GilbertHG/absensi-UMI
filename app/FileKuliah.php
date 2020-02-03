<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileKuliah extends Model
{
    protected $table = 'file_kuliah';
    protected $fillable = ['id_mk', 'judul_file', 'file', 'deskripsi_file', 'tanggal_upload'];

    public $timestamps = false;
}
