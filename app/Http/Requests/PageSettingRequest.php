<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageSettingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'header_logo_white' => 'image|mimes:jpg,jpeg,png,bmp,tiff',
            'header_logo_black' => 'image|mimes:jpg,jpeg,png,bmp,tiff',
            'footer_logo' => 'image|mimes:jpg,jpeg,png,bmp,tiff',
            'footer_content' => 'required',
            'youtube_link' => 'required',
            'tbtk_instagram_link' => 'required',
            'sd_instagram_link' => 'required',
            'smp_instagram_link' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'header_logo_white.image' => '[Header] Logo Versi Putih Harus Berupa Gambar',
            'header_logo_white.mimes' => '[Header] Logo Versi Putih Harus Berekstensi JPG/JPEG/PNG/BMP/TIFF',
            'header_logo_black.image' => '[Header] Logo Versi Hitam Harus Berupa Gambar',
            'header_logo_black.mimes' => '[Header] Logo Versi Hitam Harus Berekstensi JPG/JPEG/PNG/BMP/TIFF',
            'footer_logo.image' => '[Footer] Logo Harus Berupa Gambar',
            'footer_logo.mimes' => '[Footer] Logo Harus Berekstensi JPG/JPEG/PNG/BMP/TIFF',
            'footer_content.required' => '[Footer] Konten Harus Diisi',
            'youtube_link.required' => 'Link Youtube Harus Diisi',
            'tbtk_instagram_link.required' => 'Link Instagram TBTK Harus Diisi',
            'sd_instagram_link.required' => 'Link  Instagram SD Harus Diisi',
            'smp_instagram_link.required' => 'Link  Instagram SMP Harus Diisi',
        ];
    }
}
