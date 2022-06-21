<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluarModel extends Model
{
    use HasFactory;
    protected $table = "surat_keluar";
    protected $fillable = [
        'id',
        'tglSurat',
        'noSurat',
        'perihal',
        'tujuan',
        'ket',
        'format_file',
    ];
}
