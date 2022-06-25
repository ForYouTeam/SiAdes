<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\TandaTanganRequest;
use App\Models\TandaTanganModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TandaTanganController extends Controller
{
    public function getAllTandaTangan()
    {
        try {
            $ttd = TandaTanganModel::all();
        } catch (\Throwable $th) {
            $ttd = $th->getMessage();
        }

        return view('Page.TandaTangan')->with('ttd', $ttd);
    }

    public function createTandaTangan(TandaTanganRequest $request)
    {
        try {
            $dbResult = TandaTanganModel::create($request->all());
            $ttd = array(
                'data' => $dbResult,
                'response' => array(
                    'icon' => 'success',
                    'title' => 'Tersimpan',
                    'message' => 'Data berhasil disimpan',
                ),
                'code' => 201
            );
        } catch (\Throwable $th) {
            $ttd = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }

        return response()->json($ttd, $ttd['code']);
    }

    public function getTandaTanganById($id)
    {
        try {
            $dbResult = TandaTanganModel::whereId($id)->first();
            if ($dbResult) {
                $ttd = array(
                    'data' => $dbResult,
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Tersimpan',
                        'message' => 'Data berhasil disimpan',
                    ),
                    'code' => 201
                );
            } else {
                $ttd = array(
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
            $ttd = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }
        return response()->json($ttd, $ttd['code']);
    }

    public function updateTandaTangan($id, TandaTanganRequest $request)
    {
        $date = Carbon::now();
        $ttdDetails = $request->all();
        $ttdDetails['updated_at'] = $date;
        try {
            $dbConnect = TandaTanganModel::whereId($id);
            $findId = $dbConnect->first();
            if ($findId) {
                $ttd = array(
                    'data' => $dbConnect->update($ttdDetails),
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Tersimpan',
                        'message' => 'Data berhasil disimpan',
                    ),
                    'code' => 201
                );
            } else {
                $ttd = array(
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
            $ttd = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }
        return response()->json($ttd, $ttd['code']);
    }

    public function deleteTandaTangan($id)
    {
        try {
            $dbConnect = TandaTanganModel::whereId($id);
            $findId = $dbConnect->first();
            if ($findId) {
                $ttd = array(
                    'data' => $dbConnect->delete(),
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Terhapus',
                        'message' => 'Data berhasil dihapus',
                    ),
                    'code' => 201
                );
            } else {
                $ttd = array(
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
            $ttd = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }
        return response()->json($ttd, $ttd['code']);
    }
}
