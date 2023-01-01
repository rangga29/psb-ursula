<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PsbSettingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'psb_main_year' => 'required',
            'tbtk_registration_open' => 'required',
            'sd_internal_registration_open' => 'required',
            'sd_external_registration_open' => 'required',
            'smp_internal_registration_open' => 'required',
            'smp_external_registration_open' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'psb_main_year.required' => 'PSB Tahun Utama Harus Diisi',
            'tbtk_registration_open.required' => 'PSB TBTK Harus Diisi',
            'sd_internal_registration_open.required' => 'PSB SD Jalur Internal Harus Diisi',
            'sd_external_registration_open.required' => 'PSB SD Jalur External Harus Diisi',
            'smp_internal_registration_open.required' => 'PSB SMP Jalur Internal Harus Diisi',
            'smp_external_registration_open.required' => 'PSB SMP Jalur External Harus Diisi',
        ];
    }
}
