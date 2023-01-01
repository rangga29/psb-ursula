<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DapodikWaliRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required',
            'wali_nama_lengkap' => 'required',
            'wali_nik' => 'required',
            'wali_kota_lahir' => 'required',
            'wali_tanggal_lahir' => 'required',
            'wali_agama' => 'required',
            'wali_kewarganegaraan' => 'required',
            'wali_pendidikan' => 'required',
            'wali_pekerjaan' => 'required',
            'wali_jabatan' => 'required_if:wali_pekerjaan,PNS/TNI/Polri,Karyawan Swasta,Pedagang Kecil,Pedagang Besar,Wiraswasta,Wirausaha,Buruh',
            'wali_pendapatan' => 'required',
            'wali_nama_perusahaan' => 'required_if:wali_pekerjaan,PNS/TNI/Polri,Karyawan Swasta,Pedagang Kecil,Pedagang Besar,Wiraswasta,Wirausaha,Buruh',
            'wali_alamat_perusahaan' => 'required_if:wali_pekerjaan,PNS/TNI/Polri,Karyawan Swasta,Pedagang Kecil,Pedagang Besar,Wiraswasta,Wirausaha,Buruh',
            'wali_kebutuhan_khusus' => 'required',
            'wali_jenis_kebutuhan_khusus' => 'required_if:wali_kebutuhan_khusus,Ya',
            'wali_telepon' => 'required',
            'wali_email' => 'required|email',
            'wali_hubungan_anak' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'ID User Harus Diisi',
            'wali_nama_lengkap.required' => 'Nama Lengkap Harus Diisi',
            'wali_nik.required' => 'Nomor Induk Kependudukan Harus Diisi',
            'wali_kota_lahir.required' => 'Kota Kelahiran Harus Diisi',
            'wali_tanggal_lahir.required' => 'Tanggal Lahir Harus Diisi',
            'wali_agama.required' => 'Agama Harus Diisi',
            'wali_kewarganegaraan.required' => 'Kewarganegaraan Harus Diisi',
            'wali_pendidikan.required' => 'Pendidikan Terakhir Harus Diisi',
            'wali_pekerjaan.required' => 'Pekerjaan Harus Diisi',
            'wali_jabatan.required_if' => 'Jabatan Pekerjaan Harus Diisi',
            'wali_pendapatan.required' => 'Pendapatan Per Bulan Harus Diisi',
            'wali_nama_perusahaan.required_if' => 'Nama Perusahaan Harus Diisi',
            'wali_alamat_perusahaan.required_if' => 'Alamat Perusahaan Harus Diisi',
            'wali_kebutuhan_khusus.required' => 'Kebutuhan Khusus Harus Diisi',
            'wali_jenis_kebutuhan_khusus.required_if' => 'Jenis Kebutuhan Khusus Harus Diisi',
            'wali_telepon.required' => 'No. Handphone Harus Diisi',
            'wali_email.required' => 'Alamat Email Harus Diisi',
            'wali_email.email' => 'Alamat Email Harus Berupa Email',
            'wali_hubungan_anak.required' => 'Hubungan Wali Dengan Anak Harus Diisi'
        ];
    }
}
