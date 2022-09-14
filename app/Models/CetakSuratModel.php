<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CetakSuratModel extends Model
{
    use HasFactory;
    protected $table = "cetak_surat";
    protected $fillable = [
        'id',
        'no_surat',
        'id_penduduk',
        'jenis_surat',
        'nama_ayah',
        'nama_ibu',
        'id_ctksuratkematian',
        'alamat_sebelumnya',
        'keperluan',
        'ttd',
    ];

    public function pendudukRole()
    {
        return $this->belongsTo(PendudukModel::class, 'id_penduduk');
    }
    public function ayahRole()
    {
        return $this->belongsTo(PendudukModel::class, 'nama_ayah');
    }
    public function ibuRole()
    {
        return $this->belongsTo(PendudukModel::class, 'nama_ibu');
    }
    public function cetaksuratKematianRole()
    {
        return $this->belongsTo(CetaksuratKematianModel::class, 'id_ctksuratkematian');
    }
    public function ttdRole()
    {
        return $this->belongsTo(TandaTanganModel::class, 'ttd');
    }
}
