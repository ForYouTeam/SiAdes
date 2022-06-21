<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'jenisBarang' => 'requaired',
            'namaBarang' => 'requaired',
            'jumlahBarang' => 'requaired',
            'tahunPerolehan' => 'requaired',
            'sumberAnggaran' => 'requaired',
            'hargaSatuan' => 'requaired',
            'hargaTotal' => 'requaired',
        ];
    }
}
