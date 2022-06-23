<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArsipSuratRequest;
use App\Models\ArsipSuratModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArsipSuratController extends Controller
{
    public function getAllArsip()
    {
        try {
            $arsip = ArsipSuratModel::all();
        } catch (\Throwable $th) {
            $arsip = $th->getMessage();
        }

        return view('Page.ArsipSurat')->with('arsip', $arsip);
    }

    public function createArsip(Request $request)
    {
        return response()->json($request->all(),200);
        try {
            $fileUpload = $request->file('format_file');
            $nameFile = $fileUpload->getClientOriginalName();

            $filePath = public_path('storage/format_file/');
            $fileUpload->move($filePath, $fileUpload->getClientOriginalName());
            $request['format_file']=$nameFile;
            $dbResult = ArsipSuratModel::create($request->all());
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

    public function getArsipById($arsip_id)
    {
        try {
            $dbResult = ArsipSuratModel::whereId($arsip_id)->first();
            if ($dbResult) {
                $arsip = array(
                    'data' => $dbResult,
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Ditemukan',
                        'message' => 'Data berhasil ditemukan',
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

    public function updateArsip($arsip_id, Request $request)
    {

        $date = Carbon::now();
        $arsipDetails = $request->all();
        $arsipDetails['updated_at'] = $date;

        try {
            $dbResult = ArsipSuratModel::whereId($arsip_id);
            $findId = $dbResult->first();
            if ($findId) {
                $arsip = array(
                    'data' => $dbResult->update($arsipDetails),
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Tersimpan',
                        'message' => 'Data berhasil diperbaharui',
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

    public function deleteArsip($arsip_id)
    {
        try {
            $dbResult = ArsipSuratModel::whereId($arsip_id);
            $findId = $dbResult->first();
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
