<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaffRequest;
use App\Models\StaffModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function getAllStaff()
    {
        try {
            $staff = array(
                'data' => StaffModel::all(),
                'message' => 'success'
            );
        } catch (\Throwable $th) {
            $staff = array(
                'data' => null,
                'message' => $th->getMessage()
            );
        }
        return view('Page.Staff')->with('staff', $staff);
    }

    public function createStaff(StaffRequest $request)
    {
        try {
            $dbResult = StaffModel::create($request->all());
            $staff = array(
                'data' => $dbResult,
                'response' => array(
                    'icon' => 'success',
                    'title' => 'Tersimpan',
                    'message' => 'Data berhasil disimpan',
                ),
                'code' => 201
            );
        } catch (\Throwable $th) {
            $staff = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }

        return response()->json($staff, $staff['code']);
    }

    public function getStaffById($id)
    {
        try {
            $dbResult = StaffModel::whereId($id)->first();
            if ($dbResult) {
                $staff = array(
                    'data' => $dbResult,
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Tersimpan',
                        'message' => 'Data berhasil disimpan',
                    ),
                    'code' => 201
                );
            } else {
                $staff = array(
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
            $staff = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }
        return response()->json($staff, $staff['code']);
    }

    public function updateStaff($id, StaffRequest $request)
    {
        $date = Carbon::now();
        $staffDetails = $request->all();
        $staffDetails['updated_at'] = $date;
        try {
            $dbConnect = StaffModel::whereId($id);
            $findId = $dbConnect->first();
            if ($findId) {
                $staff = array(
                    'data' => $dbConnect->update($staffDetails),
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Tersimpan',
                        'message' => 'Data berhasil disimpan',
                    ),
                    'code' => 201
                );
            } else {
                $staff = array(
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
            $staff = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }
        return response()->json($staff, $staff['code']);
    }

    public function deleteStaff($id)
    {
        try {
            $dbConnect = StaffModel::whereId($id);
            $findId = $dbConnect->first();
            if ($findId) {
                $staff = array(
                    'data' => $dbConnect->delete(),
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Terhapus',
                        'message' => 'Data berhasil dihapus',
                    ),
                    'code' => 201
                );
            } else {
                $staff = array(
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
            $staff = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }
        return response()->json($staff, $staff['code']);
    }
}
