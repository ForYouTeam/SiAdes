<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\ArsipSuratModel;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ArsipSuratController extends Controller
{
    public function getAllArsip()
    {
        try {
            $arsip = array(
                'masuk' => ArsipSuratModel::where('jenis_arsip', 'surat masuk')->get(),
                'keluar' => ArsipSuratModel::where('jenis_arsip', 'surat keluar')->get(),
            );
        } catch (\Throwable $th) {
            $arsip = $th->getMessage();
        }

        return view('Page.ArsipSurat')->with('arsip', $arsip);
    }

    public function createArsip(Request $request)
    {
        try {
            $fileUpload = $request->file('format_file');
            $nameFile = $request->no_surat . '-' . $fileUpload->getClientOriginalName();

            $filePath = public_path('storage/format_file/');
            $fileUpload->move($filePath, $nameFile);
            $dataSurat = array();
            $dataSurat = $request->all();
            $dataSurat['format_file'] = $nameFile;
            $dbResult = ArsipSuratModel::create($dataSurat);
            $arsip = array(
                'data' => $dbResult,
                'response' => array(
                    'icon' => 'success',
                    'title' => 'Tersimpan',
                    'message' => 'Data berhasil disimpan',
                ),
                'code' => 201
            );
        } catch (\Throwable $th) {
            $arsip = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }
        return response()->json($arsip, $arsip['code']);
    }

    public function deleteArsip($arsip_id)
    {
        try {
            $dbResult = ArsipSuratModel::whereId($arsip_id);
            $findId = $dbResult->first();
            File::delete(env('APP_URL') . '/storage/format_file/' . $findId->value('format_file'));
            if ($findId) {
                $arsip = array(
                    'data' => $dbResult->delete(),
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Terhapus',
                        'message' => 'Data berhasil dihapus',
                    ),
                    'code' => 201
                );
            } else {
                $arsip = array(
                    'data' => null,
                    'response' => array(
                        'icon' => 'warning',
                        'title' => 'Not Found',
                        'message' => 'Data tidak tersedia',
                    ),
                    'code' => 404
                );
            }
        } catch (\Throwable $th) {
            $arsip = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }

        return $arsip;
    }
}
