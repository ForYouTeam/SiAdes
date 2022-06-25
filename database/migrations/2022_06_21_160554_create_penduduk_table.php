<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendudukTable extends Migration
{
    public function up()
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();
            $table->string('kk');
            $table->string('nik');
            $table->string('nama');
            $table->string('jk');
            $table->string('tmpLahir');
            $table->date('tglLahir');
            $table->string('umur')->nullable();
            $table->string('agama');
            $table->string('statKeluarga');
            $table->string('pekerjaan');
            $table->string('alamat');
            $table->string('suku');
            $table->boolean('hidup')->default(true);
            $table->string('ket');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penduduk');
    }
}
