<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TandaTanganModel extends Model
{
    use HasFactory;
    protected $table = "tanda_tangan";
    protected $fillable = [
        'id',
        'nama',
        'jabatan'
    ];
}
