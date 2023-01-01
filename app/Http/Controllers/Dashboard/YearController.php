<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreYearRequest;
use App\Http\Requests\UpdateYearRequest;
use App\Models\SdRegistration;
use App\Models\SmpRegistration;
use App\Models\TbtkRegistration;
use App\Models\Year;

class YearController extends Controller
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
        $years = Year::all();
        return view('backend.general.year.index', compact('page_setting', 'years'));
    }

    public function create()
    {
        $page_setting = [
            'unit' => 'PSB',
            'unit_slug' => 'psb',
            'title' => 'PSB Kampus Santa Ursula Bandung | Dashboard'
        ];
        return view('backend.general.year.create', compact('page_setting'));
    }

    public function store(StoreYearRequest $request)
    {
        $validateData = $request->validated();
        Year::create($validateData);
        return redirect()->route('dashboard.general.year.index')->with('success', 'Data Tahun Berhasil Ditambah');
    }

    public function edit(Year $year)
    {
        $page_setting = [
            'unit' => 'PSB',
            'unit_slug' => 'psb',
            'title' => 'PSB Kampus Santa Ursula Bandung | Dashboard'
        ];
        return view('backend.general.year.edit', compact('page_setting', 'year'));
    }

    public function update(UpdateYearRequest $request, Year $year)
    {
        $validateData = $request->validated();
        Year::where('id', $year->id)->update($validateData);
        return redirect()->route('dashboard.general.year.index')->with('success', 'Data Tahun Berhasil Diubah');
    }

    public function destroy(Year $year)
    {
        $tbtk_registration = TbtkRegistration::where('register_year', $year->id)->first();
        $sd_registration = SdRegistration::where('register_year', $year->id)->first();
        $smp_registration = SmpRegistration::where('register_year', $year->id)->first();
        if ($tbtk_registration != null || $sd_registration != null || $smp_registration != null) {
            return redirect()->route('dashboard.general.year.index')->with('error', 'Tidak Bisa Dihapus Karena Data Masih Digunakan');
        }

        if ($year->isMainYear == 1) {
            return redirect()->route('dashboard.general.year.index')->with('error', 'Tidak Bisa Dihapus Karena Tahun Utama PSB');
        }

        Year::where('id', $year->id)->delete();
        return redirect()->route('dashboard.general.year.index')->with('success', 'Data Tahun Berhasil Dihapus');
    }

    public function changeMainYear(Year $year)
    {
        $years = Year::all();
        foreach ($years as $year_data) {
            if ($year_data->id == $year->id) {
                Year::where('id', $year_data->id)->update(['isMainYear' => 1]);
            } else {
                Year::where('id', $year_data->id)->update(['isMainYear' => 0]);
            }
        }
        return redirect()->route('dashboard.general.year.index')->with('success', 'Tahun Utama PSB Berhasil Diubah');
    }
}
