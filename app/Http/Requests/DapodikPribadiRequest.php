<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DapodikPribadiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required',
            'nama_lengkap' => 'required',
            'nama_panggilan' => 'required',
            'kota_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'kewarganegaraan' => 'required',
            'nama_negara' => 'required_if:kewarganegaraan,WNA',
            'agama' => 'required',
            'paroki' => 'required_if:agama,Katolik',
            'kebutuhan_khusus' => 'required',
            'jenis_kebutuhan_khusus' => 'required_if:kebutuhan_khusus,Ya',
            'anak_keberapa' => 'required',
            'saudara_kandung' => 'required',
            'gol_darah' => 'required',
            'tinggi_badan' => 'required',
            'berat_badan' => 'required',
            'lingkar_kepala' => 'required',
            'nisn' => 'nullable',
            'asal_sekolah' => 'nullable',
            'asal_sekolah_alamat' => 'required_with:asal_sekolah',
            'asal_sekolah_kota' => 'required_with:asal_sekolah'
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'ID User Harus Diisi',
            'nama_lengkap.required' => 'Nama Lengkap Harus Diisi',
            'nama_panggilan.required' => 'Nama Panggilan Harus Diisi',
            'kota_lahir.required' => 'Kota Kelahiran Harus Diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir Harus Diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin Harus Diisi',
            'kewarganegaraan.required' => 'Kewarganegaraan Harus Diisi',
            'nama_negara.required_if' => 'Nama Negara Harus Diisi',
            'agama.required' => 'Agama Harus Diisi',
            'paroki.required_if' => 'Nama Paroki Harus Diisi',
            'kebutuhan_khusus.required' => 'Kebutuhan Khusus Harus Diisi',
            'jenis_kebutuhan_khusus.required_if' => 'Jenis Kebutuhan Khusus Harus Diisi',
            'anak_keberapa.required' => 'Anak Keberapa Harus Diisi',
            'saudara_kandung.required' => 'Jumlah Saudara Kandung Harus Diisi',
            'gol_darah.required' => 'Golongan Darah Harus Diisi',
            'tinggi_badan.required' => 'Tinggi Badan Harus Diisi',
            'berat_badan.required' => 'Berat Badan Harus Diisi',
            'lingkar_kepala.required' => 'Lingkar Kepala Harus Diisi',
            'asal_sekolah_alamat.required_with' => 'Alamat Asal Sekolah Harus Diisi',
            'asal_sekolah_kota.required_with' => 'Kota Asal Sekolah Harus Diisi'
        ];
    }
}
