<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SdRegistration;
use App\Models\SmpRegistration;
use App\Models\TbtkRegistration;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('Siswa TBTK')) {
            $page_setting = [
                'unit' => 'TBTK',
                'unit_slug' => 'tbtk',
                'title' => 'PSB TBTK Santa Ursula Bandung | Dashboard Calon Siswa'
            ];
            $registration_data = TbtkRegistration::where('user_id', Auth::user()->id)->first();
            return view('backend.indexSiswa', compact('page_setting', 'registration_data'));
        } else if (Auth::user()->hasRole('Siswa SD')) {
            $page_setting = [
                'unit' => 'SD',
                'unit_slug' => 'sd',
                'title' => 'PSB SD Santa Ursula Bandung | Dashboard Calon Siswa'
            ];
            $registration_data = SdRegistration::where('user_id', Auth::user()->id)->first();
            return view('backend.indexSiswa', compact('page_setting', 'registration_data'));
        } else if (Auth::user()->hasRole('Siswa SMP')) {
            $page_setting = [
                'unit' => 'SMP',
                'unit_slug' => 'smp',
                'title' => 'PSB SMP Santa Ursula Bandung | Dashboard Calon Siswa'
            ];
            $registration_data = SmpRegistration::where('user_id', Auth::user()->id)->first();
            return view('backend.indexSiswa', compact('page_setting', 'registration_data'));
        } else {
            $page_setting = [
                'unit' => 'PSB',
                'unit_slug' => 'psb',
                'title' => 'PSB Kampus Santa Ursula Bandung | Dashboard',
                'tbtk_registrations' => TbtkRegistration::all(),
                'tb_data' => TbtkRegistration::where('register_grade', 1)->get(),
                'tk_data' => TbtkRegistration::where('register_grade', '!=', 1)->get(),
                'tbtk_diterima' => TbtkRegistration::where('approval_status', 1)->get(),
                'tbtk_tidak_diterima' => TbtkRegistration::where('approval_status', 2)->get(),
                'sd_registrations' => SdRegistration::all(),
                'sd_internal_data' => SdRegistration::where('registration_path', 'Internal')->get(),
                'sd_external_data' => SdRegistration::where('registration_path', 'External')->get(),
                'sd_diterima' => SdRegistration::where('approval_status', 1)->get(),
                'sd_tidak_diterima' => SdRegistration::where('approval_status', 2)->get(),
                'smp_registrations' => SmpRegistration::all(),
                'smp_registrations' => SmpRegistration::all(),
                'smp_internal_data' => SmpRegistration::where('registration_path', 'Internal')->get(),
                'smp_external_data' => SmpRegistration::where('registration_path', 'External')->get(),
                'smp_diterima' => SmpRegistration::where('approval_status', 1)->get(),
                'smp_tidak_diterima' => SmpRegistration::where('approval_status', 2)->get(),
            ];
            return view('backend.index', compact('page_setting'));
        }
    }
}
