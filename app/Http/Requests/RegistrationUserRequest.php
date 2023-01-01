<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'token' => 'nullable',
            'name' => 'nullable',
            'username' => 'nullable',
            'password' => 'nullable',
            'last_login' => 'nullable'
        ];
    }
}
