<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratKeluarRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tglSurat' => 'required',
            'noSurat' => 'required',
            'perihal' => 'required',
            'tujuan' => 'required',
            'ket' => 'required',
            'format_file' => 'required',
        ];
    }
}
