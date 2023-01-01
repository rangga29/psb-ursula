<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\TbtkRegistration;

class TbtkAdminAdministrationController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:tbtk-registration-list|tbtk-aggrement-verification|tbtk-payment-verification')->only('index');
        $this->middleware('permission:tbtk-aggrement-verification')->only('aggrementVerification');
        $this->middleware('permission:tbtk-payment-verification')->only('paymentVerification');
    }

    public function index()
    {
        $page_setting = [
            'unit' => 'PSB',
            'unit_slug' => 'psb',
            'grade' => 'TBTK',
            'grade_slug' => 'tbtk',
            'title' => 'PSB Kampus Santa Ursula Bandung | Dashboard'
        ];

        $administrations = TbtkRegistration::where('approval_status', 1)->orderBy('registration_code', 'asc')->get();
        $not_have_administrations = TbtkRegistration::where('approval_status', 1)->where('aggrement_status', 0)->where('payment_status', 0)->orderBy('registration_code', 'asc')->get();
        $verified_administrations = TbtkRegistration::where('approval_status', 1)->where('aggrement_status', 1)->where('payment_status', 1)->orderBy('registration_code', 'asc')->get();
        return view('backend.administrations.admin.index', compact('page_setting', 'administrations', 'not_have_administrations', 'verified_administrations'));
    }

    public function aggrementVerification(TbtkRegistration $tbtk_registration, $code)
    {
        TbtkRegistration::where('id', $tbtk_registration->id)->update(['aggrement_status' => $code]);
        $message = ($code == 1 ? 'Verifikasi Status Form Pernyataan Berhasil Dilakukan' : 'Pembatalan Verifikasi Status Form Pernyataan Berhasil Dilakukan');
        return redirect()->route('dashboard.tbtk.admin.administration.index')->with('success', $message);
    }

    public function paymentVerification(TbtkRegistration $tbtk_registration, $code)
    {
        TbtkRegistration::where('id', $tbtk_registration->id)->update(['payment_status' => $code]);
        $message = ($code == 1 ? 'Verifikasi Status Form Keuangan Berhasil Dilakukan' : 'Pembatalan Verifikasi Status Form Keuangan Berhasil Dilakukan');
        return redirect()->route('dashboard.tbtk.admin.administration.index')->with('success', $message);
    }
}
