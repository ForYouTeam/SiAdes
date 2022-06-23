<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCetakSuratKematianTable extends Migration
{
    public function up()
    {
        Schema::create('cetak_surat_kematian', function (Blueprint $table) {
            $table->id();
            $table->timestamp('tgl_kematian');
            $table->string('tempat_kematian');
            $table->string('menentukan');
            $table->string('sebab');
            $table->string('tempat');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cetak_surat_kematian');
    }
}
