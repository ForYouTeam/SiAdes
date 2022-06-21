<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratMasukRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tgl_penerimaan' => 'required',
            'noSurat' => 'required',
            'tglSurat' => 'required',
            'pengirim' => 'required',
            'isi' => 'required',
            'ket' => 'required',
            'format_file' => 'required',
        ];
    }
}
