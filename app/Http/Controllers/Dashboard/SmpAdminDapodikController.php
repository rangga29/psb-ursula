<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DapodikAyahRequest;
use App\Http\Requests\DapodikIbuRequest;
use App\Http\Requests\DapodikPribadiRequest;
use App\Http\Requests\DapodikWaliRequest;
use App\Http\Requests\UpdateDapodikKependudukanRequest;
use App\Models\DapodikAyah;
use App\Models\DapodikIbu;
use App\Models\DapodikKependudukan;
use App\Models\DapodikPribadi;
use App\Models\DapodikWali;
use App\Models\SmpRegistration;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SmpAdminDapodikController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:smp-dapodik-list|smp-dapodik-edit|smp-dapodik-verification|smp-dapodik-report')->only('index', 'show');
        $this->middleware('permission:smp-dapodik-edit')->only('editDataPribadi', 'updateDataPribadi', 'editDataKependudukan', 'updateDataKependudukan', 'editDataAyah', 'updateDataAyah', 'editDataIbu', 'updateDataIbu', 'editDatawali', 'updateDatawali');
        $this->middleware('permission:smp-dapodik-report')->only('singlePdfReport');
        $this->middleware('permission:smp-dapodik-verification')->only('dapodikVerification');
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

        $all_dapodik = SmpRegistration::where('approval_status', 1)->orderBy('registration_code', 'asc')->get();
        $not_have_dapodik = SmpRegistration::where('approval_status', 1)->where('dapodik_status', 0)->orderBy('registration_code', 'asc')->get();
        $not_verified_dapodik = SmpRegistration::where('approval_status', 1)->where('dapodik_status', 1)->orderBy('registration_code', 'asc')->get();
        $verified_dapodik = SmpRegistration::where('approval_status', 1)->where('dapodik_status', 2)->orderBy('registration_code', 'asc')->get();

        return view('backend.dapodik.admin.index', compact('page_setting', 'all_dapodik', 'not_have_dapodik', 'not_verified_dapodik', 'verified_dapodik'));
    }

    public function show(SmpRegistration $smp_registration)
    {
        $page_setting = [
            'unit' => 'PSB',
            'unit_slug' => 'psb',
            'grade' => 'SMP',
            'grade_slug' => 'smp',
            'title' => 'PSB Kampus Santa Ursula Bandung | Dashboard'
        ];

        $registration_data = $smp_registration;
        $dapodik_pribadi = DapodikPribadi::where('user_id', $registration_data->user_id)->first();
        $dapodik_kependudukan = DapodikKependudukan::where('user_id', $registration_data->user_id)->first();
        $dapodik_ayah = DapodikAyah::where('user_id', $registration_data->user_id)->first();
        $dapodik_ibu = DapodikIbu::where('user_id', $registration_data->user_id)->first();
        $dapodik_wali = DapodikWali::where('user_id', $registration_data->user_id)->first();

        return view('backend.dapodik.admin.show', compact('page_setting', 'registration_data', 'dapodik_pribadi', 'dapodik_kependudukan', 'dapodik_ayah', 'dapodik_ibu', 'dapodik_wali'));
    }

    public function editDataPribadi(SmpRegistration $smp_registration)
    {
        $page_setting = [
            'unit' => 'PSB',
            'unit_slug' => 'psb',
            'grade' => 'SMP',
            'grade_slug' => 'smp',
            'title' => 'PSB Kampus Santa Ursula Bandung | Dashboard'
        ];

        $registration_data = $smp_registration;
        $dapodik_pribadi = DapodikPribadi::where('user_id', $registration_data->user_id)->first();
        if ($dapodik_pribadi == null) {
            return redirect()->route('dashboard.smp.admin.dapodik.show')->with('error', 'Data Siswa - Data Pribadi Tidak Ditemukan');
        }

        return view('backend.dapodik.admin.editDataPribadi', compact('page_setting', 'registration_data', 'dapodik_pribadi'));
    }

    public function updateDataPribadi(DapodikPribadiRequest $request, SmpRegistration $smp_registration)
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
        DapodikPribadi::where('user_id', $smp_registration->user_id)->update($validateData);
        return redirect()->route('dashboard.smp.admin.dapodik.show', $smp_registration->unique_code)->with('success', 'Data Siswa - Data Pribadi Berhasil Diubah');
    }

    public function editDataKependudukan(SmpRegistration $smp_registration)
    {
        $page_setting = [
            'unit' => 'PSB',
            'unit_slug' => 'psb',
            'grade' => 'SMP',
            'grade_slug' => 'smp',
            'title' => 'PSB Kampus Santa Ursula Bandung | Dashboard'
        ];

        $registration_data = $smp_registration;
        $dapodik_kependudukan = DapodikKependudukan::where('user_id', $registration_data->user_id)->first();
        if ($dapodik_kependudukan == null) {
            return redirect()->route('dashboard.smp.admin.dapodik.show')->with('error', 'Data Siswa - Data Kependudukan Tidak Ditemukan');
        }

        return view('backend.dapodik.admin.editDataKependudukan', compact('page_setting', 'registration_data', 'dapodik_kependudukan'));
    }

    public function updateDataKependudukan(UpdateDapodikKependudukanRequest $request, SmpRegistration $smp_registration)
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

        if ($request->file('pas_foto')) {
            if ($request->oldPasFoto && File::exists('upload/pas_foto/smp/' . $request->oldPasFoto)) {
                File::delete('upload/pas_foto/smp/' . $request->oldPasFoto);
            }
            $name = $smp_registration->registration_code . '_' . Str::random(20) . '.' . $request->file('pas_foto')->extension();
            $request->file('pas_foto')->move('upload/pas_foto/smp', $name);
            $validateData['pas_foto'] = $name;
        }

        DapodikKependudukan::where('user_id', $smp_registration->user_id)->update($validateData);
        return redirect()->route('dashboard.smp.admin.dapodik.show', $smp_registration->unique_code)->with('success', 'Data Siswa - Data Kependudukan Berhasil Diubah');
    }

    public function editDataAyah(SmpRegistration $smp_registration)
    {
        $page_setting = [
            'unit' => 'PSB',
            'unit_slug' => 'psb',
            'grade' => 'SMP',
            'grade_slug' => 'smp',
            'title' => 'PSB Kampus Santa Ursula Bandung | Dashboard'
        ];

        $registration_data = $smp_registration;
        $dapodik_ayah = DapodikAyah::where('user_id', $registration_data->user_id)->first();
        if ($dapodik_ayah == null) {
            return redirect()->route('dashboard.smp.admin.dapodik.show')->with('error', 'Data Siswa - Data Ayah Tidak Ditemukan');
        }

        return view('backend.dapodik.admin.editDataAyah', compact('page_setting', 'registration_data', 'dapodik_ayah'));
    }

    public function updateDataAyah(DapodikAyahRequest $request, SmpRegistration $smp_registration)
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
        DapodikAyah::where('user_id', $smp_registration->user_id)->update($validateData);
        return redirect()->route('dashboard.smp.admin.dapodik.show', $smp_registration->unique_code)->with('success', 'Data Siswa - Data Ayah Berhasil Diubah');
    }

    public function editDataIbu(SmpRegistration $smp_registration)
    {
        $page_setting = [
            'unit' => 'PSB',
            'unit_slug' => 'psb',
            'grade' => 'SMP',
            'grade_slug' => 'smp',
            'title' => 'PSB Kampus Santa Ursula Bandung | Dashboard'
        ];

        $registration_data = $smp_registration;
        $dapodik_ibu = DapodikIbu::where('user_id', $registration_data->user_id)->first();
        if ($dapodik_ibu == null) {
            return redirect()->route('dashboard.smp.admin.dapodik.show')->with('error', 'Data Siswa - Data Ibu Tidak Ditemukan');
        }

        return view('backend.dapodik.admin.editDataIbu', compact('page_setting', 'registration_data', 'dapodik_ibu'));
    }

    public function updateDataIbu(DapodikIbuRequest $request, SmpRegistration $smp_registration)
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
        DapodikIbu::where('user_id', $smp_registration->user_id)->update($validateData);
        return redirect()->route('dashboard.smp.admin.dapodik.show', $smp_registration->unique_code)->with('success', 'Data Siswa - Data Ibu Berhasil Diubah');
    }

    public function editDataWali(SmpRegistration $smp_registration)
    {
        $page_setting = [
            'unit' => 'PSB',
            'unit_slug' => 'psb',
            'grade' => 'SMP',
            'grade_slug' => 'smp',
            'title' => 'PSB Kampus Santa Ursula Bandung | Dashboard'
        ];

        $registration_data = $smp_registration;
        $dapodik_wali = DapodikWali::where('user_id', $registration_data->user_id)->first();
        if ($dapodik_wali == null) {
            return redirect()->route('dashboard.smp.admin.dapodik.show')->with('error', 'Data Siswa - Data Wali Tidak Ditemukan');
        }

        return view('backend.dapodik.admin.editDataWali', compact('page_setting', 'registration_data', 'dapodik_wali'));
    }

    public function updateDataWali(DapodikWaliRequest $request, SmpRegistration $smp_registration)
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
        DapodikWali::where('user_id', $smp_registration->user_id)->update($validateData);
        return redirect()->route('dashboard.smp.admin.dapodik.show', $smp_registration->unique_code)->with('success', 'Data Siswa - Data Wali Berhasil Diubah');
    }

    public function singlePdfReport(SmpRegistration $smp_registration)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadview('backend.dapodik.admin.singlePdf', [
            'title' => 'Data Siswa',
            'unit' => 'SMP',
            'unit_slug' => 'smp',
            'todayDate' => Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now())->isoFormat('DD MMMM Y'),
            'registration_data' => $smp_registration,
            'dapodik_pribadi' => DapodikPribadi::where('user_id', $smp_registration->user_id)->first(),
            'dapodik_kependudukan' => DapodikKependudukan::where('user_id', $smp_registration->user_id)->first(),
            'dapodik_ayah' => DapodikAyah::where('user_id', $smp_registration->user_id)->first(),
            'dapodik_ibu' => DapodikIbu::where('user_id', $smp_registration->user_id)->first(),
            'dapodik_wali' => DapodikWali::where('user_id', $smp_registration->user_id)->first(),
        ])->setPaper('a4');
        return $pdf->stream('[' . Carbon::now()->format('Ymd') . '] PSB SMP - Data Siswa - ' . $smp_registration->full_name . '.pdf');
    }

    public function dapodikVerification(SmpRegistration $smp_registration, $code)
    {
        SmpRegistration::where('id', $smp_registration->id)->update(['dapodik_status' => $code]);
        $message = ($code == 2 ? 'Verifikasi Status Data Siswa Berhasil Dilakukan' : 'Pembatalan Verifikasi Status Data Siswa Berhasil Dilakukan');
        return redirect()->route('dashboard.smp.admin.dapodik.index')->with('success', $message);
    }
}
