<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\BarangRequest;
use App\Models\BarangModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function getAllBarang()
    {
        try {
            $barang = BarangModel::all();
        } catch (\Throwable $th) {
            $barang = $th->getMessage();
        }

        return view('Page.Barang')->with('barang', $barang);
    }

    public function createBarang(BarangRequest $request)
    {
        try {
            $dbResult = BarangModel::create($request->all());
            $barang = array(
                'data' => $dbResult,
                'response' => array(
                    'icon' => 'success',
                    'title' => 'Tersimpan',
                    'message' => 'Data berhasil disimpan',
                ),
                'code' => 201
            );
        } catch (\Throwable $th) {
            $barang = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }
        return response()->json($barang, $barang['code']);
    }

    public function getBarangById($barang_id)
    {
        try {
            $dbResult = BarangModel::whereId($barang_id)->first();
            if ($dbResult) {
                $barang = array(
                    'data' => $dbResult,
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Ditemukan',
                        'message' => 'Data berhasil ditemukan',
                    ),
                    'code' => 201
                );
            } else {
                $barang = array(
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
            $barang = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }

        return $barang;
    }

    public function updateBarang($barang_id, Request $request)
    {

        $date = Carbon::now();
        $barangDetails = $request->all();
        $barangDetails['updated_at'] = $date;

        try {
            $dbResult = barangModel::whereId($barang_id);
            $findId = $dbResult->first();
            if ($findId) {
                $barang = array(
                    'data' => $dbResult->update($barangDetails),
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Tersimpan',
                        'message' => 'Data berhasil diperbaharui',
                    ),
                    'code' => 201
                );
            } else {
                $barang = array(
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
            $barang = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }

        return $barang;
    }

    public function deleteBarang($barang_id)
    {
        try {
            $dbResult = BarangModel::whereId($barang_id);
            $findId = $dbResult->first();
            if ($findId) {
                $barang = array(
                    'data' => $dbResult->delete(),
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Terhapus',
                        'message' => 'Data berhasil dihapus',
                    ),
                    'code' => 201
                );
            } else {
                $barang = array(
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
            $barang = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }

        return $barang;
    }
}
