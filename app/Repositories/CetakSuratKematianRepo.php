<?php

namespace App\Repositories;

use App\Http\Requests\CetakSuratKematian;
use App\Interfaces\CetakSuratKematianInterface;
use App\Models\CetaksuratKematianModel;
use Illuminate\Http\Request;

class CetakSuratKematianRepo implements CetakSuratKematianInterface
{
    public function createData(array $newDetails)
    {
        try {
            $dbResult = CetaksuratKematianModel::create($newDetails);
            $result = $dbResult->id;
        } catch (\Throwable $th) {
            $result = $th->getMessage();
        }

        return $result;
    }

    public function deleteData($id)
    {
        $staff = CetaksuratKematianModel::whereId($id)->delete();
    }
}
