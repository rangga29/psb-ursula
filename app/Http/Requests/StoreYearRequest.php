<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreYearRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'code' => 'required|unique:years',
            'year' => 'required|unique:years'
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Kode Tahun Harus Diisi',
            'code.unique' => 'Kode Tahun Sudah Digunakan',
            'year.required' => 'Nama Tahun Harus Diisi',
            'year.unique' => 'Nama Tahun Sudah Digunakan'
        ];
    }
}
