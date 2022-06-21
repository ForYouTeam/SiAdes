<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasukModel extends Model
{
    use HasFactory;
    protected $table = "surat_masuk";
    protected $fillable = [
        'tgl_penerimaan',
        'noSurat',
        'tglSurat',
        'pengirim',
        'isi',
        'format_file',
    ];
}
