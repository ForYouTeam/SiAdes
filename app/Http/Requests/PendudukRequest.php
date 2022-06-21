<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PendudukRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'kk' => 'required|numeric',
            'nik' => 'required|numeric',
            'nama' => 'required',
            'jk' => 'required',
            'tmpLahir' => 'required',
            'tglLahir' => 'required',
            'agama' => 'required',
            'statKeluarga' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'suku' => 'required',
            'hidup' => 'required',
            'ket' => 'required',
        ];
    }
}
