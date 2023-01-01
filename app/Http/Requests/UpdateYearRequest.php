<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateYearRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'code' => ['required', Rule::unique('years', 'code')->ignore($this->year)],
            'name' => ['required', Rule::unique('years', 'name')->ignore($this->year)]
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Kode Tahun Harus Diisi',
            'code.unique' => 'Kode Tahun Sudah Digunakan',
            'name.required' => 'Nama Tahun Harus Diisi',
            'name.unique' => 'Nama Tahun Sudah Digunakan'
        ];
    }
}
