<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DapodikIbuRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required',
            'ibu_nama_lengkap' => 'required',
            'ibu_nik' => 'required',
            'ibu_kota_lahir' => 'required',
            'ibu_tanggal_lahir' => 'required',
            'ibu_agama' => 'required',
            'ibu_kewarganegaraan' => 'required',
            'ibu_pendidikan' => 'required',
            'ibu_pekerjaan' => 'required',
            'ibu_jabatan' => 'required_if:ibu_pekerjaan,PNS/TNI/Polri,Karyawan Swasta,Pedagang Kecil,Pedagang Besar,Wiraswasta,Wirausaha,Buruh',
            'ibu_pendapatan' => 'required',
            'ibu_nama_perusahaan' => 'required_if:ibu_pekerjaan,PNS/TNI/Polri,Karyawan Swasta,Pedagang Kecil,Pedagang Besar,Wiraswasta,Wirausaha,Buruh',
            'ibu_alamat_perusahaan' => 'required_if:ibu_pekerjaan,PNS/TNI/Polri,Karyawan Swasta,Pedagang Kecil,Pedagang Besar,Wiraswasta,Wirausaha,Buruh',
            'ibu_kebutuhan_khusus' => 'required',
            'ibu_jenis_kebutuhan_khusus' => 'required_if:ibu_kebutuhan_khusus,Ya',
            'ibu_telepon' => 'required',
            'ibu_email' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'ID User Harus Diisi',
            'ibu_nama_lengkap.required' => 'Nama Lengkap Harus Diisi',
            'ibu_nik.required' => 'Nomor Induk Kependudukan Harus Diisi',
            'ibu_kota_lahir.required' => 'Kota Kelahiran Harus Diisi',
            'ibu_tanggal_lahir.required' => 'Tanggal Lahir Harus Diisi',
            'ibu_agama.required' => 'Agama Harus Diisi',
            'ibu_kewarganegaraan.required' => 'Kewarganegaraan Harus Diisi',
            'ibu_pendidikan.required' => 'Pendidikan Terakhir Harus Diisi',
            'ibu_pekerjaan.required' => 'Pekerjaan Harus Diisi',
            'ibu_jabatan.required_if' => 'Jabatan Pekerjaan Harus Diisi',
            'ibu_pendapatan.required' => 'Pendapatan Per Bulan Harus Diisi',
            'ibu_nama_perusahaan.required_if' => 'Nama Perusahaan Harus Diisi',
            'ibu_alamat_perusahaan.required_if' => 'Alamat Perusahaan Harus Diisi',
            'ibu_kebutuhan_khusus.required' => 'Kebutuhan Khusus Harus Diisi',
            'ibu_jenis_kebutuhan_khusus.required_if' => 'Jenis Kebutuhan Khusus Harus Diisi',
            'ibu_telepon.required' => 'No. Handphone Harus Diisi',
            'ibu_email.required' => 'Alamat Email Harus Diisi',
            'ibu_email.email' => 'Alamat Email Harus Berupa Email'
        ];
    }
}
