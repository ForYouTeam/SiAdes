<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatakSuratModel extends Model
{
    use HasFactory;
    protected $table = "cetak_surat";
    protected $fillable = [
        'id',
        'id_penduduk',
        'jenis_surat',
        'nama_ayah',
        'nama_ibu',
        'id_ctksuratkematian',
        'ttd',
    ];

    public function pendudukRole()
    {
        $this->belongsTo(PendudukModel::class, 'id_penduduk');
    }
    public function cetaksuratKematianRole()
    {
        $this->belongsTo(CetaksuratKematianModel::class, 'id_ctksuratkematian');
    }
}
