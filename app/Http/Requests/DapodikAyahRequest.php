<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DapodikAyahRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required',
            'ayah_nama_lengkap' => 'required',
            'ayah_nik' => 'required',
            'ayah_kota_lahir' => 'required',
            'ayah_tanggal_lahir' => 'required',
            'ayah_agama' => 'required',
            'ayah_kewarganegaraan' => 'required',
            'ayah_pendidikan' => 'required',
            'ayah_pekerjaan' => 'required',
            'ayah_jabatan' => 'required_if:ayah_pekerjaan,PNS/TNI/Polri,Karyawan Swasta,Pedagang Kecil,Pedagang Besar,Wiraswasta,Wirausaha,Buruh',
            'ayah_pendapatan' => 'required',
            'ayah_nama_perusahaan' => 'required_if:ayah_pekerjaan,PNS/TNI/Polri,Karyawan Swasta,Pedagang Kecil,Pedagang Besar,Wiraswasta,Wirausaha,Buruh',
            'ayah_alamat_perusahaan' => 'required_if:ayah_pekerjaan,PNS/TNI/Polri,Karyawan Swasta,Pedagang Kecil,Pedagang Besar,Wiraswasta,Wirausaha,Buruh',
            'ayah_kebutuhan_khusus' => 'required',
            'ayah_jenis_kebutuhan_khusus' => 'required_if:ayah_kebutuhan_khusus,Ya',
            'ayah_telepon' => 'required',
            'ayah_email' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'ID User Harus Diisi',
            'ayah_nama_lengkap.required' => 'Nama Lengkap Harus Diisi',
            'ayah_nik.required' => 'Nomor Induk Kependudukan Harus Diisi',
            'ayah_kota_lahir.required' => 'Kota Kelahiran Harus Diisi',
            'ayah_tanggal_lahir.required' => 'Tanggal Lahir Harus Diisi',
            'ayah_agama.required' => 'Agama Harus Diisi',
            'ayah_kewarganegaraan.required' => 'Kewarganegaraan Harus Diisi',
            'ayah_pendidikan.required' => 'Pendidikan Terakhir Harus Diisi',
            'ayah_pekerjaan.required' => 'Pekerjaan Harus Diisi',
            'ayah_jabatan.required_if' => 'Jabatan Pekerjaan Harus Diisi',
            'ayah_pendapatan.required' => 'Pendapatan Per Bulan Harus Diisi',
            'ayah_nama_perusahaan.required_if' => 'Nama Perusahaan Harus Diisi',
            'ayah_alamat_perusahaan.required_if' => 'Alamat Perusahaan Harus Diisi',
            'ayah_kebutuhan_khusus.required' => 'Kebutuhan Khusus Harus Diisi',
            'ayah_jenis_kebutuhan_khusus.required_if' => 'Jenis Kebutuhan Khusus Harus Diisi',
            'ayah_telepon.required' => 'No. Handphone Harus Diisi',
            'ayah_email.required' => 'Alamat Email Harus Diisi',
            'ayah_email.email' => 'Alamat Email Harus Berupa Email'
        ];
    }
}
