<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\CetakSuratRequest;
use App\Interfaces\CetakSuratKematianInterface;
use App\Models\CetakSuratModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CetakSuratController extends Controller
{
    public function __construct(CetakSuratKematianInterface $suratMati)
    {
        $this->suratMati = $suratMati;
    }

    public function getAll()
    {
        try {
            $dbResult = CetakSuratModel::with('pendudukRole', 'ayahRole', 'ibuRole')->get();
            $surat = array(
                'data' => $dbResult,
                'message' => 'success'
            );
        } catch (\Throwable $th) {
            $surat = array(
                'data' => null,
                'message' => $th->getMessage()
            );
        }
        return view('Page.CetakSurat')->with('data', $surat);
    }

    public function createCetak(CetakSuratRequest $request)
    {
        $jenisSurat = $request->jenis_surat;
        $cetakDetail = $request->only([
            'no_surat',
            'jenis_surat',
            'id_penduduk',
            'ttd',
        ]);
        switch ($jenisSurat) {
            case 'Keterangan kurang Mampu':
            case 'Pengakuan Warga':
                $cetakDetail['nama_ayah'] = $request->nama_ayah;
                $cetakDetail['nama_ibu'] = $request->nama_ibu;

                $validator = Validator::make($cetakDetail, [
                    'nama_ayah' => 'required',
                    'nama_ibu' => 'required',
                ]);
                break;
            case 'Domisili':
                $cetakDetail['alamat_sebelumnya'] = $request->alamat_sebelumnya;
                $cetakDetail['keperluan'] = $request->keperluan;

                $validator = Validator::make($cetakDetail, [
                    'alamat_sebelumnya' => 'required',
                    'keperluan' => 'required',
                ]);
                break;
            case 'Surat Kematian':
                $secondDetail = array(
                    'tgl_kematian' => $request->tgl_kematian,
                    'tempat_kematian' => $request->tempat_kematian,
                    'menentukan' => $request->menentukan,
                    'sebab' => $request->sebab,
                    'tempat' => $request->tempat,
                );
                $cetakDetail['id_ctksuratkematian'] = $this->suratMati->createData($secondDetail);
                $validator = Validator::make($secondDetail, [
                    'tgl_kematian' => 'required',
                    'tempat_kematian' => 'required',
                    'menentukan' => 'required',
                    'sebab' => 'required',
                    'tempat' => 'required',
                ]);
                break;
            default:
                $validator = null;
                break;
        }

        if ($validator) {
            if ($validator->fails()) {
                throw new HttpResponseException(response()->json([
                    'response' => array(
                        'icon' => 'error',
                        'title' => 'Validasi Gagal',
                        'message' => 'Data yang di input tidak tervalidasi',
                    ),
                    'errors' => array(
                        'length' => count($validator->errors()),
                        'data' => $validator->errors()
                    ),
                ], 422));
            }
        }

        try {
            $dbResult = CetakSuratModel::create($cetakDetail);
            $cetak = array(
                'data' => $dbResult,
                'response' => array(
                    'icon' => 'success',
                    'title' => 'Tersimpan',
                    'message' => 'Tekan Ok Untuk Mendownload Surat',
                ),
                'code' => 201
            );
        } catch (\Throwable $th) {
            $cetak = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }

        return response()->json($cetak, $cetak['code']);
    }

    public function export($id)
    {
        $allData = CetakSuratModel::whereId($id)->with('pendudukRole', 'cetaksuratKematianRole', 'ttdRole:id,nama,jabatan', 'ayahRole', 'ibuRole')->first();

        $allData['path'] = public_path('logoLuwuTimur.png');
        $allData['dateNow'] = Carbon::now()->isoFormat('D MMMM Y');

        switch ($allData['jenis_surat']) {
            case 'Domisili':
                $path = 'Pdf.Domisili';
                break;
            case 'Keterangan kurang Mampu':
                $path = 'Pdf.SuratMiskin';
                break;
            case 'Pengakuan Warga':
                $path = 'Pdf.SuratPengakuanWarga';
                break;
            case 'Surat Kematian':
                $path = 'Pdf.SuratMati';
                break;
            default:
                $path = 'Pdf.SuratSkck';
                break;
        }
        $pdf = Pdf::loadView($path, ['data' => $allData]);
        return $pdf->download('Surat ' . $allData['pendudukRole']['nama'] . '.pdf');
    }

    public function deleteStaff($id)
    {
        try {
            $dbConnect = CetakSuratModel::whereId($id);
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
                if ($findId->jenis_surat) {
                    $this->suratMati->deleteData($findId->id_ctksuratkematian);
                }
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
