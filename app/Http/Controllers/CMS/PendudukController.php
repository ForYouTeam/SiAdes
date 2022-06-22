<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\PendudukRequest;
use App\Models\PendudukModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function getAllPenduduk()
    {
        try {
            $penduduk = PendudukModel::all();
        } catch (\Throwable $th) {
            $penduduk = $th->getMessage();
        }

        return view('Page.Penduduk')->with('penduduk', $penduduk);
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

    public function updatePenduduk($penduduk_id, Request $request)
    {

        $date = Carbon::now();
        $pendudukDetails = $request->all();
        $pendudukDetails['updated_at'] = $date;

        try {
            $dbResult = PendudukModel::whereId($penduduk_id);
            $findId = $dbResult->first();
            if ($findId) {
                $penduduk = array(
                    'data' => $dbResult->update($pendudukDetails),
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Tersimpan',
                        'message' => 'Data berhasil diperbaharui',
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

    public function deletePenduduk($penduduk_id)
    {
        try {
            $dbResult = PendudukModel::whereId($penduduk_id);
            $findId = $dbResult->first();
            if ($findId) {
                $penduduk = array(
                    'data' => $dbResult->delete(),
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Terhapus',
                        'message' => 'Data berhasil dihapus',
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
