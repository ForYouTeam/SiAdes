<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CetakSuratRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_penduduk' => 'required',
            'jenis_surat' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'id_ctksuratkematian' => 'required',
            'ttd' => 'required',
        ];
    }
}
