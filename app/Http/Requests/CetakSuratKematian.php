<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CetakSuratKematian extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tgl_kematian' => 'required',
            'tempat_kematian' => 'required',
            'menentukan' => 'required',
            'sebab' => 'required',
            'tempat' => 'required',
            'ttd' => 'required',
        ];
    }
}
