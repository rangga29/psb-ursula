<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SmpRegistration;

class SmpAdminAdministrationController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:smp-registration-list|smp-aggrement-verification|smp-payment-verification')->only('index');
        $this->middleware('permission:smp-aggrement-verification')->only('aggrementVerification');
        $this->middleware('permission:smp-payment-verification')->only('paymentVerification');
    }

    public function index()
    {
        $page_setting = [
            'unit' => 'PSB',
            'unit_slug' => 'psb',
            'grade' => 'SMP',
            'grade_slug' => 'smp',
            'title' => 'PSB Kampus Santa Ursula Bandung | Dashboard'
        ];

        $administrations = SmpRegistration::where('approval_status', 1)->orderBy('registration_code', 'asc')->get();
        $not_have_administrations = SmpRegistration::where('approval_status', 1)->where('aggrement_status', 0)->where('payment_status', 0)->orderBy('registration_code', 'asc')->get();
        $verified_administrations = SmpRegistration::where('approval_status', 1)->where('aggrement_status', 1)->where('payment_status', 1)->orderBy('registration_code', 'asc')->get();
        return view('backend.administrations.admin.index', compact('page_setting', 'administrations', 'not_have_administrations', 'verified_administrations'));
    }

    public function aggrementVerification(SmpRegistration $smp_registration, $code)
    {
        SmpRegistration::where('id', $smp_registration->id)->update(['aggrement_status' => $code]);
        $message = ($code == 1 ? 'Verifikasi Status Form Pernyataan Berhasil Dilakukan' : 'Pembatalan Verifikasi Status Form Pernyataan Berhasil Dilakukan');
        return redirect()->route('dashboard.smp.admin.administration.index')->with('success', $message);
    }

    public function paymentVerification(SmpRegistration $smp_registration, $code)
    {
        SmpRegistration::where('id', $smp_registration->id)->update(['payment_status' => $code]);
        $message = ($code == 1 ? 'Verifikasi Status Form Keuangan Berhasil Dilakukan' : 'Pembatalan Verifikasi Status Form Keuangan Berhasil Dilakukan');
        return redirect()->route('dashboard.smp.admin.administration.index')->with('success', $message);
    }
}
