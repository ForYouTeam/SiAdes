<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratMasukTable extends Migration
{
    public function up()
    {
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('tgl_penerimaan');
            $table->string('noSurat');
            $table->string('tglSurat');
            $table->string('pengirim');
            $table->string('isi');
            $table->string('ket');
            $table->string('format_file');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('surat_masuk');
    }
}
