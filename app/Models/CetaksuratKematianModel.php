<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CetaksuratKematianModel extends Model
{
    use HasFactory;
    protected $table = "cetak_surat_kematian";
    protected $fillable = [
        'id',
        'tgl_kematian',
        'tempat_kematian',
        'menentukan',
        'sebab',
        'tempat',
    ];
}
