<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDapodikKependudukanRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required',
            'nik' => 'required',
            'nkk' => 'required',
            'nak' => 'required',
            'pas_foto' => 'required|image|mimes:jpg,jpeg,png,bmp,tiff',
            'kk_alamat' => 'required',
            'kk_rt' => 'required',
            'kk_rw' => 'required',
            'kk_kelurahan' => 'required',
            'kk_kecamatan' => 'required',
            'kk_kota' => 'required',
            'kk_kodepos' => 'required',
            'tt_alamat' => 'required',
            'tt_rt' => 'required',
            'tt_rw' => 'required',
            'tt_kelurahan' => 'required',
            'tt_kecamatan' => 'required',
            'tt_kota' => 'required',
            'tt_kodepos' => 'required',
            'tinggal_bersama' => 'required',
            'transportasi' => 'required',
            'jarak_tempuh' => 'required',
            'waktu_tempuh' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'ID User Harus Diisi',
            'nik.required' => 'Nomor Induk Kependudukan Harus Diisi',
            'nkk.required' => 'Nomor Kartu Keluarga Harus Diisi',
            'nak.required' => 'Nomor Akta Kelahiran Harus Diisi',
            'pas_foto.required' => 'Pas Foto Harus Diisi',
            'pas_foto.image' => 'Pas Foto Harus Berupa Gambar',
            'pas_foto.mimes' => 'Pas Foto Harus Berekstensi JPG/JPEG/PNG/BMP/TIFF',
            'kk_alamat.required' => '[KK] Alamat Harus Diisi',
            'kk_rt.required' => '[KK] RT Harus Diisi',
            'kk_rw.required' => '[KK] RW Harus Diisi',
            'kk_kelurahan.required' => '[KK] Keluarahan Harus Diisi',
            'kk_kecamatan.required' => '[KK] Kecamatan Harus Diisi',
            'kk_kota.required' => '[KK] Kota / Kabupaten Harus Diisi',
            'kk_kodepos.required' => '[KK] Kodepos Harus Diisi',
            'tt_alamat.required' => '[Domisili] Alamat Harus Diisi',
            'tt_rt.required' => '[Domisili] RT Harus Diisi',
            'tt_rw.required' => '[Domisili] RW Harus Diisi',
            'tt_kelurahan.required' => '[Domisili] Keluarahan Harus Diisi',
            'tt_kecamatan.required' => '[Domisili] Kecamatan Harus Diisi',
            'tt_kota.required' => '[Domisili] Kota / Kabupaten Harus Diisi',
            'tt_kodepos.required' => '[Domisili] Kodepos Harus Diisi',
            'tinggal_bersama.required' => 'Tinggal Bersama Harus Diisi',
            'transportasi.required' => 'Moda Transportasi Harus Diisi',
            'jarak_tempuh.required' => 'Jarak Tempuh Harus Diisi',
            'waktu_tempuh.required' => 'Waktu Tempuh Harus Diisi'
        ];
    }
}
