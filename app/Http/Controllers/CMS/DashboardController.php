<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\ArsipSuratModel;
use App\Models\BarangModel;
use App\Models\PendudukModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = array(
            'penduduk' => PendudukModel::count(),
            'barang' => BarangModel::count(),
            'arsipmasuk' => ArsipSuratModel::where('jenis_arsip', 'surat masuk')->count(),
            'arsipkeluar' => ArsipSuratModel::where('jenis_arsip', 'surat keluar')->count(),
        );
        return view('Page.Dashboard')->with('data', $data);
    }
}
