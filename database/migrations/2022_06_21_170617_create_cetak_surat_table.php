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
            $table->string('no_surat');
            $table->foreignId('id_penduduk')->constrained('penduduk');
            $table->string('jenis_surat');
            $table->foreignId('nama_ayah')->nullable()->constrained('penduduk');
            $table->foreignId('nama_ibu')->nullable()->constrained('penduduk');
            $table->foreignId('id_ctksuratkematian')->nullable()->constrained('cetak_surat_kematian');
            $table->string('alamat_sebelumnya')->nullable();
            $table->string('keperluan')->nullable();
            $table->foreignId('ttd')->constrained('tanda_tangan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cetak_surat');
    }
}
