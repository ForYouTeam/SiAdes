<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AkunRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function getAllAkun()
    {
        try {
            $akun = User::all();
        } catch (\Throwable $th) {
            $akun = $th->getMessage();
        }

        return view('Auth.Akun')->with('akun', $akun);
    }

    public function createAkun(AkunRequest $request)
    {
        try {
            $user = $request->only([
                'nama',
                'username',
                'password'
            ]);
            $role = $request->role;
            $dbResult = User::create($user);
            $dbResult->assignRole($role);

            $akun = array(
                'data' => $dbResult,
                'response' => array(
                    'icon' => 'success',
                    'title' => 'Tersimpan',
                    'message' => 'Data berhasil disimpan',
                ),
                'code' => 201
            );
        } catch (\Throwable $th) {
            $akun = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }

        return response()->json($akun, $akun['code']);
    }

    public function deleteAkun($id)
    {
        try {
            $dbConnect = User::whereId($id);
            $findId = $dbConnect->first();
            if ($findId) {
                $akun = array(
                    'data' => $dbConnect->delete(),
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Terhapus',
                        'message' => 'Data berhasil dihapus',
                    ),
                    'code' => 201
                );
            } else {
                $akun = array(
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
            $akun = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }
        return response()->json($akun, $akun['code']);
    }
}
