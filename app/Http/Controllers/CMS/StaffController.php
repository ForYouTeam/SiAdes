<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaffRequest;
use App\Models\StaffModel;
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

        return view('Page.Staff')->with('data', $staff);
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
}
