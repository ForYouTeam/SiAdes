<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArsipSuratTable extends Migration
{
    public function up()
    {
        Schema::create('arsip_surat', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_arsip');
            $table->date('tgl_surat');
            $table->date('tgl_penerimaan')->nullable();
            $table->string('no_surat');
            $table->string('perihal')->nullable();
            $table->string('pengirim')->nullable();
            $table->string('ditujukan_kepada')->nullable();
            $table->string('isi_singkat')->nullable();
            $table->string('ket');
            $table->string('format_file');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('arsip_surat');
    }
}
