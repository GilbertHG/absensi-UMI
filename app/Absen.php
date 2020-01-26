<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table = 'absen';
    protected $guarded = ['id'];

    public $timestamps = false;

    public function getStatusAttribute($status){
        if($status==1){
            return 'Hadir';
        }else if($status==2){
            return 'Tidak Hadir';
        }else if($status==3){
            return 'Izin';
        }else if($status==4){
            return 'Sakit';
        }
    }

    public function mahasiswa(){
        return $this->belongTo('App/Mahasiswa', 'id_mahasiswa');
    }
}
