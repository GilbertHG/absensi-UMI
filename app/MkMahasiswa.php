<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MataKuliah;
use App\Mahasiswa;

class MkMahasiswa extends Model
{
    protected $table = 'mk_diambil';
    protected $fillable = ['id_mk', 'id_mahasiswa', 'persentase',];

    public $timestamps = false;

    public function mata_kuliah(){
        return $this->belongsTo(MataKuliah::class, 'id_mk');
    }

    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }
}
