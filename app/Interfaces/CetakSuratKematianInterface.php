<?php

namespace App\Interfaces;

use App\Http\Requests\CetakSuratKematian;
use Illuminate\Http\Request;

interface CetakSuratKematianInterface
{
    public function createData(array $newDetails);
}
