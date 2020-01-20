<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MkMahasiswa;

class MataKuliah extends Model
{
     protected $table = 'mata_kuliah';
    protected $guarded = ['id_dosen', 'kode_mk', 'nama_mk', 'kelas_mk', 'hari_mk', 'jam_mulai', 'jam_selesai', 'dosen_mk', 'tahun_ajaran'];

    public $timestamps = false;

    public function mkmahasiswas(){
        return $this->hasMany(MkMahasiswa::class, 'id_mk');
    }
}
