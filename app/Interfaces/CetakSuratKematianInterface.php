<?php

namespace App\Interfaces;

use App\Http\Requests\CetakSuratKematian;

interface CetakSuratKematianInterface
{
    public function createData(CetakSuratKematian $newDetails);
}
