<?php

namespace Database\Seeders;

use App\Models\General;
use Illuminate\Database\Seeder;

class GeneralSeeder extends Seeder
{
    public function run()
    {
        General::create([
            'header_logo_white' => 'headerLogoWhite.png',
            'header_logo_black' => 'headerLogoBlack.png',
            'footer_logo' => 'footerLogo.png',
            'footer_content' => 'Jadilah pemimpin yang mandiri dan pantang menyerah bersama Kampus Santa Ursula Bandung.',
            'youtube_link' => 'https://www.youtube.com/c/OFFICIALSANTAURSULABANDUNG',
            'tbtk_instagram_link' => 'https://www.instagram.com/tbtk.santaursulabdg/',
            'sd_instagram_link' => 'https://www.instagram.com/sd.santaursulabdg/',
            'smp_instagram_link' => 'https://www.instagram.com/smp.santaursulabdg/',
            'psb_main_year' => '2023/2024',
            'tbtk_registration_open' => 1,
            'sd_internal_registration_open' => 1,
            'sd_external_registration_open' => 1,
            'smp_internal_registration_open' => 1,
            'smp_external_registration_open' => 1
        ]);
    }
}
