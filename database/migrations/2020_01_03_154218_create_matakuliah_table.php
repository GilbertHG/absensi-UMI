<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatakuliahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_dosen');
            $table->string('kode_mk');
            $table->string('nama_mk');
            $table->string('kelas_mk');
            $table->string('ruangan_mk')->nullable();
            $table->string('hari_mk');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('dosen_mk');
            $table->string('tahun_ajaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mata_kuliah');
    }
}
