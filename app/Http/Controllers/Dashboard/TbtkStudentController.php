<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DapodikAyahRequest;
use App\Http\Requests\DapodikIbuRequest;
use App\Http\Requests\DapodikPribadiRequest;
use App\Http\Requests\DapodikWaliRequest;
use App\Http\Requests\StoreDapodikKependudukanRequest;
use App\Models\DapodikAyah;
use App\Models\DapodikIbu;
use App\Models\DapodikKependudukan;
use App\Models\DapodikPribadi;
use App\Models\DapodikWali;
use App\Models\TbtkRegistration;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TbtkStudentController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:tbtk-student-pendaftaran|tbtk-student-siswa|tbtk-student-administrasi|tbtk-student-pembelajaran');
    }

    public function index()
    {
        $page_setting = [
            'unit' => 'TBTK',
            'unit_slug' => 'tbtk',
            'title' => 'PSB TBTK Santa Ursula Bandung | Dashboard Calon Siswa'
        ];
        $registration_data = TbtkRegistration::where('user_id', Auth::user()->id)->first();
        return view('backend.registrations.student.index', compact('page_setting', 'registration_data'));
    }

    public function dapodik()
    {
        $registration_data = TbtkRegistration::where('user_id', Auth::user()->id)->first();
        if ($registration_data->approval_status != 1) {
            return redirect()->route('dashboard.index')->with('warning', 'Anda Belum Bisa Mengakses Halaman Ini');
        }

        $page_setting = [
            'unit' => 'TBTK',
            'unit_slug' => 'tbtk',
            'title' => 'PSB TBTK Santa Ursula Bandung | Dashboard Calon Siswa'
        ];

        $dapodik_pribadi = DapodikPribadi::where('user_id', Auth::user()->id)->first();
        $dapodik_kependudukan = DapodikKependudukan::where('user_id', Auth::user()->id)->first();
        $dapodik_ayah = DapodikAyah::where('user_id', Auth::user()->id)->first();
        $dapodik_ibu = DapodikIbu::where('user_id', Auth::user()->id)->first();
        $dapodik_wali = DapodikWali::where('user_id', Auth::user()->id)->first();
        return view('backend.dapodik.student.index', compact('page_setting', 'registration_data', 'dapodik_pribadi', 'dapodik_kependudukan', 'dapodik_ayah', 'dapodik_ibu', 'dapodik_wali'));
    }

    public function dapodikPribadi()
    {
        $registration_data = TbtkRegistration::where('user_id', Auth::user()->id)->first();
        if ($registration_data->approval_status != 1) {
            return redirect()->route('dashboard.index')->with('warning', 'Anda Belum Bisa Mengakses Halaman Ini');
        }

        $dapodik_pribadi = DapodikPribadi::where('user_id', Auth::user()->id)->first();
        if ($dapodik_pribadi != null) {
            return redirect()->route('dashboard.tbtk.student.dapodik.index')->with('error', 'Data Siswa - Data Pribadi Sudah Diisi');
        }

        $page_setting = [
            'unit' => 'TBTK',
            'unit_slug' => 'tbtk',
            'title' => 'PSB TBTK Santa Ursula Bandung | Dashboard Calon Siswa'
        ];
        return view('backend.dapodik.student.dataPribadi', compact('page_setting', 'registration_data'));
    }

    public function dapodikPribadiStore(DapodikPribadiRequest $request)
    {
        $validateData = $request->validated();
        $validateData['nama_lengkap'] = Str::title($validateData['nama_lengkap']);
        $validateData['nama_panggilan'] = Str::title($validateData['nama_panggilan']);
        $validateData['kota_lahir'] = Str::title($validateData['kota_lahir']);
        $validateData['tanggal_lahir'] = Carbon::createFromFormat('d/m/Y', $validateData['tanggal_lahir'])->format('Y-m-d');
        $validateData['nama_negara'] = Str::title($validateData['nama_negara']);
        $validateData['paroki'] = Str::title($validateData['paroki']);
        $validateData['jenis_kebutuhan_khusus'] = Str::title($validateData['jenis_kebutuhan_khusus']);
        $validateData['asal_sekolah'] = Str::title($validateData['asal_sekolah']);
        $validateData['asal_sekolah_alamat'] = Str::title($validateData['asal_sekolah_alamat']);
        $validateData['asal_sekolah_kota'] = Str::title($validateData['asal_sekolah_kota']);
        DapodikPribadi::create($validateData);

        $dapodik_pribadi = DapodikPribadi::where('user_id', Auth::user()->id)->first();
        $dapodik_kependudukan = DapodikKependudukan::where('user_id', Auth::user()->id)->first();
        $dapodik_ayah = DapodikAyah::where('user_id', Auth::user()->id)->first();
        $dapodik_ibu = DapodikIbu::where('user_id', Auth::user()->id)->first();
        $dapodik_wali = DapodikWali::where('user_id', Auth::user()->id)->first();
        if ($dapodik_pribadi != null && $dapodik_kependudukan != null && ($dapodik_ayah != null || $dapodik_ibu != null || $dapodik_wali != null)) {
            TbtkRegistration::where('user_id', Auth::user()->id)->update(['dapodik_status' => 1]);
        }

        return redirect()->route('dashboard.tbtk.student.dapodik.index')->with('success', 'Data Siswa - Data Pribadi Berhasil Ditambah');
    }

    public function dapodikKependudukan()
    {
        $registration_data = TbtkRegistration::where('user_id', Auth::user()->id)->first();
        if ($registration_data->approval_status != 1) {
            return redirect()->route('dashboard.index')->with('warning', 'Anda Belum Bisa Mengakses Halaman Ini');
        }

        $dapodik_kependudukan = DapodikKependudukan::where('user_id', Auth::user()->id)->first();
        if ($dapodik_kependudukan != null) {
            return redirect()->route('dashboard.tbtk.student.dapodik.index')->with('error', 'Data Siswa - Data Kependudukan Sudah Diisi');
        }

        $page_setting = [
            'unit' => 'TBTK',
            'unit_slug' => 'tbtk',
            'title' => 'PSB TBTK Santa Ursula Bandung | Dashboard Calon Siswa'
        ];
        return view('backend.dapodik.student.dataKependudukan', compact('page_setting', 'dapodik_kependudukan'));
    }

    public function dapodikKependudukanStore(StoreDapodikKependudukanRequest $request)
    {
        $validateData = $request->validated();
        $validateData['kk_alamat'] = Str::title($validateData['kk_alamat']);
        $validateData['kk_kelurahan'] = Str::title($validateData['kk_kelurahan']);
        $validateData['kk_kecamatan'] = Str::title($validateData['kk_kecamatan']);
        $validateData['kk_kota'] = Str::title($validateData['kk_kota']);
        $validateData['tt_alamat'] = Str::title($validateData['tt_alamat']);
        $validateData['tt_kelurahan'] = Str::title($validateData['tt_kelurahan']);
        $validateData['tt_kecamatan'] = Str::title($validateData['tt_kecamatan']);
        $validateData['tt_kota'] = Str::title($validateData['tt_kota']);

        $registration_data = TbtkRegistration::where('user_id', Auth::user()->id)->first();

        $name = $registration_data->registration_code . '_' . Str::random(20) . '.' . $request->file('pas_foto')->extension();
        $request->file('pas_foto')->move('upload/pas_foto/tbtk', $name);
        $validateData['pas_foto'] = $name;

        DapodikKependudukan::create($validateData);

        $dapodik_pribadi = DapodikPribadi::where('user_id', Auth::user()->id)->first();
        $dapodik_kependudukan = DapodikKependudukan::where('user_id', Auth::user()->id)->first();
        $dapodik_ayah = DapodikAyah::where('user_id', Auth::user()->id)->first();
        $dapodik_ibu = DapodikIbu::where('user_id', Auth::user()->id)->first();
        $dapodik_wali = DapodikWali::where('user_id', Auth::user()->id)->first();
        if ($dapodik_pribadi != null && $dapodik_kependudukan != null && ($dapodik_ayah != null || $dapodik_ibu != null || $dapodik_wali != null)) {
            TbtkRegistration::where('user_id', Auth::user()->id)->update(['dapodik_status' => 1]);
        }

        return redirect()->route('dashboard.tbtk.student.dapodik.index')->with('success', 'Data Siswa - Data Kependudukan Berhasil Ditambah');
    }

    public function dapodikAyah()
    {
        $registration_data = TbtkRegistration::where('user_id', Auth::user()->id)->first();
        if ($registration_data->approval_status != 1) {
            return redirect()->route('dashboard.index')->with('warning', 'Anda Belum Bisa Mengakses Halaman Ini');
        }

        $dapodik_ayah = DapodikAyah::where('user_id', Auth::user()->id)->first();
        if ($dapodik_ayah != null) {
            return redirect()->route('dashboard.tbtk.student.dapodik.index')->with('error', 'Data Siswa - Data Ayah Sudah Diisi');
        }

        $page_setting = [
            'unit' => 'TBTK',
            'unit_slug' => 'tbtk',
            'title' => 'PSB TBTK Santa Ursula Bandung | Dashboard Calon Siswa'
        ];
        return view('backend.dapodik.student.dataAyah', compact('page_setting', 'dapodik_ayah'));
    }

    public function dapodikAyahStore(DapodikAyahRequest $request)
    {
        $validateData = $request->validated();
        $validateData['ayah_nama_lengkap'] = Str::title($validateData['ayah_nama_lengkap']);
        $validateData['ayah_kota_lahir'] = Str::title($validateData['ayah_kota_lahir']);
        $validateData['ayah_tanggal_lahir'] = Carbon::createFromFormat('d/m/Y', $validateData['ayah_tanggal_lahir'])->format('Y-m-d');
        $validateData['ayah_jabatan'] = Str::title($validateData['ayah_jabatan']);
        $validateData['ayah_nama_perusahaan'] = Str::title($validateData['ayah_nama_perusahaan']);
        $validateData['ayah_alamat_perusahaan'] = Str::title($validateData['ayah_alamat_perusahaan']);
        $validateData['ayah_jenis_kebutuhan_khusus'] = Str::title($validateData['ayah_jenis_kebutuhan_khusus']);
        $validateData['ayah_nama_lengkap'] = Str::title($validateData['ayah_nama_lengkap']);
        DapodikAyah::create($validateData);

        $dapodik_pribadi = DapodikPribadi::where('user_id', Auth::user()->id)->first();
        $dapodik_kependudukan = DapodikKependudukan::where('user_id', Auth::user()->id)->first();
        $dapodik_ayah = DapodikAyah::where('user_id', Auth::user()->id)->first();
        $dapodik_ibu = DapodikIbu::where('user_id', Auth::user()->id)->first();
        $dapodik_wali = DapodikWali::where('user_id', Auth::user()->id)->first();
        if ($dapodik_pribadi != null && $dapodik_kependudukan != null && ($dapodik_ayah != null || $dapodik_ibu != null || $dapodik_wali != null)) {
            TbtkRegistration::where('user_id', Auth::user()->id)->update(['dapodik_status' => 1]);
        }

        return redirect()->route('dashboard.tbtk.student.dapodik.index')->with('success', 'Data Siswa - Data Ayah Berhasil Ditambah');
    }

    public function dapodikIbu()
    {
        $registration_data = TbtkRegistration::where('user_id', Auth::user()->id)->first();
        if ($registration_data->approval_status != 1) {
            return redirect()->route('dashboard.index')->with('warning', 'Anda Belum Bisa Mengakses Halaman Ini');
        }

        $dapodik_ibu = DapodikIbu::where('user_id', Auth::user()->id)->first();
        if ($dapodik_ibu != null) {
            return redirect()->route('dashboard.tbtk.student.dapodik.index')->with('error', 'Data Siswa - Data Ibu Sudah Diisi');
        }

        $page_setting = [
            'unit' => 'TBTK',
            'unit_slug' => 'tbtk',
            'title' => 'PSB TBTK Santa Ursula Bandung | Dashboard Calon Siswa'
        ];
        return view('backend.dapodik.student.dataIbu', compact('page_setting', 'dapodik_ibu'));
    }

    public function dapodikIbuStore(DapodikIbuRequest $request)
    {
        $validateData = $request->validated();
        $validateData['ibu_nama_lengkap'] = Str::title($validateData['ibu_nama_lengkap']);
        $validateData['ibu_kota_lahir'] = Str::title($validateData['ibu_kota_lahir']);
        $validateData['ibu_tanggal_lahir'] = Carbon::createFromFormat('d/m/Y', $validateData['ibu_tanggal_lahir'])->format('Y-m-d');
        $validateData['ibu_jabatan'] = Str::title($validateData['ibu_jabatan']);
        $validateData['ibu_nama_perusahaan'] = Str::title($validateData['ibu_nama_perusahaan']);
        $validateData['ibu_alamat_perusahaan'] = Str::title($validateData['ibu_alamat_perusahaan']);
        $validateData['ibu_jenis_kebutuhan_khusus'] = Str::title($validateData['ibu_jenis_kebutuhan_khusus']);
        $validateData['ibu_nama_lengkap'] = Str::title($validateData['ibu_nama_lengkap']);
        DapodikIbu::create($validateData);

        $dapodik_pribadi = DapodikPribadi::where('user_id', Auth::user()->id)->first();
        $dapodik_kependudukan = DapodikKependudukan::where('user_id', Auth::user()->id)->first();
        $dapodik_ayah = DapodikAyah::where('user_id', Auth::user()->id)->first();
        $dapodik_ibu = DapodikIbu::where('user_id', Auth::user()->id)->first();
        $dapodik_wali = DapodikWali::where('user_id', Auth::user()->id)->first();
        if ($dapodik_pribadi != null && $dapodik_kependudukan != null && ($dapodik_ayah != null || $dapodik_ibu != null || $dapodik_wali != null)) {
            TbtkRegistration::where('user_id', Auth::user()->id)->update(['dapodik_status' => 1]);
        }

        return redirect()->route('dashboard.tbtk.student.dapodik.index')->with('success', 'Data Siswa - Data Ibu Berhasil Ditambah');
    }

    public function dapodikWali()
    {
        $registration_data = TbtkRegistration::where('user_id', Auth::user()->id)->first();
        if ($registration_data->approval_status != 1) {
            return redirect()->route('dashboard.index')->with('warning', 'Anda Belum Bisa Mengakses Halaman Ini');
        }

        $dapodik_wali = DapodikWali::where('user_id', Auth::user()->id)->first();
        if ($dapodik_wali != null) {
            return redirect()->route('dashboard.tbtk.student.dapodik.index')->with('error', 'Data Siswa - Data Wali Sudah Diisi');
        }

        $page_setting = [
            'unit' => 'TBTK',
            'unit_slug' => 'tbtk',
            'title' => 'PSB TBTK Santa Ursula Bandung | Dashboard Calon Siswa'
        ];
        return view('backend.dapodik.student.dataWali', compact('page_setting', 'dapodik_wali'));
    }

    public function dapodikWaliStore(DapodikWaliRequest $request)
    {
        $validateData = $request->validated();
        $validateData['wali_nama_lengkap'] = Str::title($validateData['wali_nama_lengkap']);
        $validateData['wali_kota_lahir'] = Str::title($validateData['wali_kota_lahir']);
        $validateData['wali_tanggal_lahir'] = Carbon::createFromFormat('d/m/Y', $validateData['wali_tanggal_lahir'])->format('Y-m-d');
        $validateData['wali_jabatan'] = Str::title($validateData['wali_jabatan']);
        $validateData['wali_nama_perusahaan'] = Str::title($validateData['wali_nama_perusahaan']);
        $validateData['wali_alamat_perusahaan'] = Str::title($validateData['wali_alamat_perusahaan']);
        $validateData['wali_jenis_kebutuhan_khusus'] = Str::title($validateData['wali_jenis_kebutuhan_khusus']);
        $validateData['wali_nama_lengkap'] = Str::title($validateData['wali_nama_lengkap']);
        DapodikWali::create($validateData);

        $dapodik_pribadi = DapodikPribadi::where('user_id', Auth::user()->id)->first();
        $dapodik_kependudukan = DapodikKependudukan::where('user_id', Auth::user()->id)->first();
        $dapodik_ayah = DapodikAyah::where('user_id', Auth::user()->id)->first();
        $dapodik_ibu = DapodikIbu::where('user_id', Auth::user()->id)->first();
        $dapodik_wali = DapodikWali::where('user_id', Auth::user()->id)->first();
        if ($dapodik_pribadi != null && $dapodik_kependudukan != null && ($dapodik_ayah != null || $dapodik_ibu != null || $dapodik_wali != null)) {
            TbtkRegistration::where('user_id', Auth::user()->id)->update(['dapodik_status' => 1]);
        }

        return redirect()->route('dashboard.tbtk.student.dapodik.index')->with('success', 'Data Siswa - Data Wali Berhasil Ditambah');
    }

    public function administration()
    {
        $registration_data = TbtkRegistration::where('user_id', Auth::user()->id)->first();
        if ($registration_data->approval_status != 1) {
            return redirect()->route('dashboard.index')->with('warning', 'Anda Belum Bisa Mengakses Halaman Ini');
        }

        $page_setting = [
            'unit' => 'TBTK',
            'unit_slug' => 'tbtk',
            'title' => 'PSB TBTK Santa Ursula Bandung | Dashboard Calon Siswa'
        ];
        return view('backend.administrations.student.index', compact('page_setting', 'registration_data'));
    }
}
