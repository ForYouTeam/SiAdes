<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\PendudukRequest;
use App\Models\PendudukModel;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function getAllPenduduk()
    {
        try {
            $penduduk= PendudukModel::all();
        } catch (\Throwable $th) {
            $penduduk = $th->getMessage();
        }

        return view('Cms.penduduk')->with('penduduk', $penduduk);
    }

    public function createPenduduk(PendudukRequest $request)
    {
        try {
            $dbResult = PendudukModel::create($request->all());
            $penduduk = array(
                'data' => $dbResult,
                'response' => array(
                    'icon' => 'success',
                    'title' => 'Tersimpan',
                    'message' => 'Data berhasil disimpan',
                ),
                'code' => 201
            );
        } catch (\Throwable $th) {
            $penduduk = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }
        return response()->json($penduduk, $penduduk['code']);
    }

    public function getPendudukById($penduduk_id)
    {
        try {
            $dbResult = PendudukModel::whereId($penduduk_id)->first();
            if ($dbResult) {
                $penduduk = array(
                    'data' => $dbResult,
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Ditemukan',
                        'message' => 'Data berhasil ditemukan',
                    ),
                    'code' => 201
                );
            } else {
                $penduduk = array(
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
            $penduduk = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }

        return $penduduk;
    }
}