<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCetakSuratTable extends Migration
{
    public function up()
    {
        Schema::create('cetak_surat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_penduduk')->constrained('penduduk');
            $table->string('jenis_surat');
            $table->foreignId('nama_ayah')->constrained('penduduk')->nullable();
            $table->foreignId('nama_ibu')->constrained('penduduk')->nullable();
            $table->foreignId('id_ctksuratkematian')->constrained('cetak_surat_kematian')->nullable();
            $table->string('alamat_sebelumnya')->nullable();
            $table->string('keperluan')->nullable();
            $table->string('ttd');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cetak_surat');
    }
}
