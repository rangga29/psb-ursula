<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSdRegistrationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'nullable',
            'unique_code' => 'nullable',
            'registration_code' => 'nullable',
            'virtual_code' => 'nullable',
            'registration_path' => 'nullable',
            'full_name' => 'required',
            'nick_name' => 'required',
            'birth_town' => 'required',
            'birth_date' => 'required',
            'origin_school' => 'required',
            'gender' => 'required',
            'register_year' => 'nullable',
            'register_grade' => 'nullable',
            'parent_name' => 'required',
            'parent_phone' => 'required',
            'parent_email' => 'required|email',
            'payment_proof' => 'required|image|mimes:jpg,jpeg,png,bmp,tiff',
            'registration_status' => 'nullable',
            'selection_status' => 'nullable',
            'approval_status' => 'nullable',
            'dapodik_status' => 'nullable',
            'aggrement_status' => 'nullable',
            'payment_status' => 'nullable',
            'uniform_status' => 'nullable',
            'book_status' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => 'Nama Lengkap Harus Diisi',
            'nick_name.required' => 'Nama Panggilan Harus Diisi',
            'birth_town.required' => 'Kota Kelahiran Harus Diisi',
            'birth_date.required' => 'Tanggal Lahir Harus Diisi',
            'origin_school.required' => 'Asal Sekolah Harus Diisi',
            'gender.required' => 'Pilihan Jenis Kelamin Harus Diisi',
            'parent_name.required' => 'Nama Orang Tua Harus Diisi',
            'parent_phone.required' => 'No. Handphone Harus Diisi',
            'parent_email.required' => 'Alamat Email Harus Diisi',
            'parent_email.email' => 'Alamat Email Harus Berupa Email',
            'payment_proof.required' => 'Bukti Pembayaran Harus Diisi',
            'payment_proof.image' => 'Bukti Pembayaran Harus Berupa Gambar',
            'payment_proof.mimes' => 'Bukti Pembayaran Harus Berupa JPG/JPEG/PNG/BMP/TIFF'
        ];
    }
}
