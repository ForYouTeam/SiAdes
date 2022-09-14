<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipSuratModel extends Model
{
    use HasFactory;
    protected $table = "arsip_surat";
    protected $fillable = [
        'id',
        'jenis_arsip',
        'tgl_surat',
        'tgl_penerimaan',
        'no_surat',
        'perihal',
        'pengirim',
        'ditujukan_kepada',
        'isi_singkat',
        'ket',
        'format_file',
        'created_at',
        'updated_at',
    ];
}
