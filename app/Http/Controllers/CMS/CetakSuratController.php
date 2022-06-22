<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Interfaces\CetakSuratKematianInterface;
use App\Models\CetakSuratModel;
use Illuminate\Http\Request;

class CetakSuratController extends Controller
{
    public function __construct(CetakSuratKematianInterface $suratMati)
    {
        $this->suratMati = $suratMati;
    }

    public function getAll()
    {
        try {
            $dbResult = CetakSuratModel::with('pendudukRole')->get();
            $surat = array(
                'data' => $dbResult,
                'message' => 'success'
            );
        } catch (\Throwable $th) {
            $surat = array(
                'data' => null,
                'message' => $th->getMessage()
            );
        }
        return view('Page.CetakSurat')->with('data', $surat);
    }
}
