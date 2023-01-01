<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SdRegistration;

class SdAdminAdministrationController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:sd-registration-list|sd-aggrement-verification|sd-payment-verification')->only('index');
        $this->middleware('permission:sd-aggrement-verification')->only('aggrementVerification');
        $this->middleware('permission:sd-payment-verification')->only('paymentVerification');
    }

    public function index()
    {
        $page_setting = [
            'unit' => 'PSB',
            'unit_slug' => 'psb',
            'grade' => 'SD',
            'grade_slug' => 'sd',
            'title' => 'PSB Kampus Santa Ursula Bandung | Dashboard'
        ];

        $administrations = SdRegistration::where('approval_status', 1)->orderBy('registration_code', 'asc')->get();
        $not_have_administrations = SdRegistration::where('approval_status', 1)->where('aggrement_status', 0)->where('payment_status', 0)->orderBy('registration_code', 'asc')->get();
        $verified_administrations = SdRegistration::where('approval_status', 1)->where('aggrement_status', 1)->where('payment_status', 1)->orderBy('registration_code', 'asc')->get();
        return view('backend.administrations.admin.index', compact('page_setting', 'administrations', 'not_have_administrations', 'verified_administrations'));
    }

    public function aggrementVerification(SdRegistration $sd_registration, $code)
    {
        SdRegistration::where('id', $sd_registration->id)->update(['aggrement_status' => $code]);
        $message = ($code == 1 ? 'Verifikasi Status Form Pernyataan Berhasil Dilakukan' : 'Pembatalan Verifikasi Status Form Pernyataan Berhasil Dilakukan');
        return redirect()->route('dashboard.sd.admin.administration.index')->with('success', $message);
    }

    public function paymentVerification(SdRegistration $sd_registration, $code)
    {
        SdRegistration::where('id', $sd_registration->id)->update(['payment_status' => $code]);
        $message = ($code == 1 ? 'Verifikasi Status Form Keuangan Berhasil Dilakukan' : 'Pembatalan Verifikasi Status Form Keuangan Berhasil Dilakukan');
        return redirect()->route('dashboard.sd.admin.administration.index')->with('success', $message);
    }
}
