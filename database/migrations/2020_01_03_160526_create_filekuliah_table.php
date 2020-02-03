<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilekuliahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_kuliah', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_mk');
            $table->string('judul_file');
            $table->string('file');
            $table->text('deskripsi_file');
            $table->date('tanggal_upload');
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
        Schema::dropIfExists('file_kuliah');
    }
}
