<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\TbtkRegistration;

class TbtkAdminUniformBookController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:tbtk-registration-list|tbtk-uniform-verification|tbtk-book-verification')->only('index');
        $this->middleware('permission:tbtk-uniform-verification')->only('uniformVerification');
        $this->middleware('permission:tbtk-book-verification')->only('bookVerification');
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

        $uniform_book = TbtkRegistration::where('approval_status', 1)->orderBy('registration_code', 'asc')->get();
        $not_have_uniform_book = TbtkRegistration::where('approval_status', 1)->where('uniform_status', 0)->where('book_status', 0)->orderBy('registration_code', 'asc')->get();
        $verified_uniform_book = TbtkRegistration::where('approval_status', 1)->where('uniform_status', 1)->where('book_status', 1)->orderBy('registration_code', 'asc')->get();
        return view('backend.uniform-book.admin.index', compact('page_setting', 'uniform_book', 'not_have_uniform_book', 'verified_uniform_book'));
    }

    public function uniformVerification(TbtkRegistration $tbtk_registration, $code)
    {
        TbtkRegistration::where('id', $tbtk_registration->id)->update(['uniform_status' => $code]);
        $message = ($code == 1 ? 'Verifikasi Status Seragam Berhasil Dilakukan' : 'Pembatalan Verifikasi Status Seragam Berhasil Dilakukan');
        return redirect()->route('dashboard.tbtk.admin.uniform-book.index')->with('success', $message);
    }

    public function bookVerification(TbtkRegistration $tbtk_registration, $code)
    {
        TbtkRegistration::where('id', $tbtk_registration->id)->update(['book_status' => $code]);
        $message = ($code == 1 ? 'Verifikasi Status Buku Berhasil Dilakukan' : 'Pembatalan Verifikasi Status Buku Berhasil Dilakukan');
        return redirect()->route('dashboard.tbtk.admin.uniform-book.index')->with('success', $message);
    }
}
