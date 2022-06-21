<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama' => 'required',
            'jabatan' => 'required',
            'tmpLahir' => 'required',
            'tglLahir' => 'required',
            'jk' => 'required',
            'pendidikan' => 'required',
            'noSK' => 'required',
            'alamat' => 'required',
        ];
    }
}
