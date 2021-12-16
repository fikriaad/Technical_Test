<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_peserta', function (Blueprint $table) {
            $table->bigIncrements('peserta_id');
            $table->string('peserta_nama');
            $table->string('peserta_email');
            $table->integer('peserta_nilai_x');
            $table->integer('peserta_nilai_y');
            $table->integer('peserta_nilai_z');
            $table->integer('peserta_nilai_w');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_peserta');
    }
}
