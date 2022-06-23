<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\CetakSuratRequest;
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

    public function createCetak(CetakSuratRequest $request)
    {
        $jenisSurat = $request->jenis_surat;
        switch ($jenisSurat) {
            case 'Keterangan kurang Mampu':
            case 'Pengakuan Warga':
                # code...
                break;
            case 'Surat Kematian':

                break;
            default:
                # code...
                break;
        }
        return response()->json($request->all());
    }
}
