<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AkunRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama' => 'required',
            'username' => 'required|min:5|max:10',
            'password' => 'required|min:5',
        ];
    }
}
