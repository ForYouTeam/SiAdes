<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\CetakSuratRequest;
use App\Interfaces\CetakSuratKematianInterface;
use App\Models\CetakSuratModel;
use Barryvdh\DomPDF\Facade\Pdf;
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
        $cetakDetail = $request->only([
            'no_surat',
            'jenis_surat',
            'id_penduduk',
            'ttd',
        ]);
        switch ($jenisSurat) {
            case 'Keterangan kurang Mampu':
            case 'Pengakuan Warga':

                $cetakDetail['nama_ayah'] = $request->nama_ayah;
                $cetakDetail['nama_ibu'] = $request->nama_ibu;
                break;
            case 'Domisili':
                $cetakDetail['alamat_sebelumnya'] = $request->alamat_sebelumnya;
                $cetakDetail['keperluan'] = $request->keperluan;
                break;
            case 'Surat Kematian':
                $cetakDetail['tgl_kematian'] = $request->tgl_kematian;
                $cetakDetail['tempat_kematian'] = $request->tempat_kematian;
                $cetakDetail['menentukan'] = $request->menentukan;
                $cetakDetail['sebab'] = $request->sebab;
                $cetakDetail['tempat'] = $request->tempat;
                $cetakDetail['ttd'] = $request->ttd;
                break;
            default:

                break;
        }
        return response()->json($cetakDetail, 200);

        $pdf = Pdf::loadView('Pdf.Domisili');
        return $pdf->stream();
    }
}
