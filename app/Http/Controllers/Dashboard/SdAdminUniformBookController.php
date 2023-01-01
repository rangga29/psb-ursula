<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SdRegistration;

class SdAdminUniformBookController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:sd-registration-list|sd-uniform-verification|sd-book-verification')->only('index');
        $this->middleware('permission:sd-uniform-verification')->only('uniformVerification');
        $this->middleware('permission:sd-book-verification')->only('bookVerification');
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

        $uniform_book = SdRegistration::where('approval_status', 1)->orderBy('registration_code', 'asc')->get();
        $not_have_uniform_book = SdRegistration::where('approval_status', 1)->where('uniform_status', 0)->where('book_status', 0)->orderBy('registration_code', 'asc')->get();
        $verified_uniform_book = SdRegistration::where('approval_status', 1)->where('uniform_status', 1)->where('book_status', 1)->orderBy('registration_code', 'asc')->get();
        return view('backend.uniform-book.admin.index', compact('page_setting', 'uniform_book', 'not_have_uniform_book', 'verified_uniform_book'));
    }

    public function uniformVerification(SdRegistration $sd_registration, $code)
    {
        SdRegistration::where('id', $sd_registration->id)->update(['uniform_status' => $code]);
        $message = ($code == 1 ? 'Verifikasi Status Seragam Berhasil Dilakukan' : 'Pembatalan Verifikasi Status Seragam Berhasil Dilakukan');
        return redirect()->route('dashboard.sd.admin.uniform-book.index')->with('success', $message);
    }

    public function bookVerification(SdRegistration $sd_registration, $code)
    {
        SdRegistration::where('id', $sd_registration->id)->update(['book_status' => $code]);
        $message = ($code == 1 ? 'Verifikasi Status Buku Berhasil Dilakukan' : 'Pembatalan Verifikasi Status Buku Berhasil Dilakukan');
        return redirect()->route('dashboard.sd.admin.uniform-book.index')->with('success', $message);
    }
}
