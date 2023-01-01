<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormPdfRequest;
use App\Http\Requests\PageSettingRequest;
use App\Http\Requests\PsbSettingRequest;
use App\Models\FormPdf;
use App\Models\General;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GeneralController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:general-setting');
    }

    public function index()
    {
        $page_setting = [
            'unit' => 'PSB',
            'unit_slug' => 'psb',
            'title' => 'PSB Kampus Santa Ursula Bandung | Dashboard'
        ];

        $general_setting = General::where('id', 1)->first();
        return view('backend.general.index', compact('page_setting', 'general_setting'));
    }

    public function pageSettingStore(PageSettingRequest $request)
    {
        $validateData = $request->validated();

        if ($request->file('header_logo_white')) {
            if ($request->oldHeaderLogoWhite && $request->oldHeaderLogoWhite != 'headerLogoWhite.png') {
                File::delete('upload/' . $request->oldHeaderLogoWhite);
            }
            $name = Str::random(20) . '.' . $request->file('header_logo_white')->extension();
            $request->file('header_logo_white')->move('upload', $name);
            $validateData['header_logo_white'] = $name;
        }

        if ($request->file('header_logo_black')) {
            if ($request->oldHeaderLogoBlack && $request->oldHeaderLogoBlack != 'headerLogoBlack.png') {
                File::delete('upload/' . $request->oldHeaderLogoBlack);
            }
            $name = Str::random(20) . '.' . $request->file('header_logo_black')->extension();
            $request->file('header_logo_black')->move('upload', $name);
            $validateData['header_logo_black'] = $name;
        }

        if ($request->file('footer_logo')) {
            if ($request->oldFooterLogo && $request->oldFooterLogo != 'footerLogo.png') {
                File::delete('upload/' . $request->oldFooterLogo);
            }
            $name = Str::random(20) . '.' . $request->file('footer_logo')->extension();
            $request->file('footer_logo')->move('upload', $name);
            $validateData['footer_logo'] = $name;
        }

        General::where('id', 1)->update($validateData);
        return redirect()->route('dashboard.general.index')->with('success', 'Page Setting Berhasil Diubah');
    }

    public function psbSettingStore(PsbSettingRequest $request)
    {
        $validateData = $request->validated();
        General::where('id', 1)->update($validateData);
        return redirect()->route('dashboard.general.index')->with('success', 'PSB Setting Berhasil Diubah');
    }
}
