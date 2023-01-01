<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\TbtkRegistrationExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationUserRequest;
use App\Http\Requests\UpdateTbtkRegistrationRequest;
use App\Mail\DiterimaMail;
use App\Mail\DitolakMail;
use App\Mail\RegistrationMail;
use App\Models\TbtkRegistration;
use App\Models\User;
use App\Models\Year;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class TbtkAdminRegistrationController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:tbtk-registration-list|tbtk-registration-edit|tbtk-registration-delete|tbtk-registration-verification|tbtk-selection-verification|tbtk-approval-verification|tbtk-registration-report')
            ->only('index', 'show');
        $this->middleware('permission:tbtk-registration-edit')->only('edit', 'update');
        $this->middleware('permission:tbtk-registration-delete')->only('destroy', 'deletedData', 'restore');
        $this->middleware('permission:tbtk-registration-report')->only('singlePdfReport', 'reports', 'allExcelReport', 'allPdfReport', 'separateExcelReport', 'separatePdfReport');
        $this->middleware('permission:tbtk-registration-verification')->only('registrationVerification');
        $this->middleware('permission:tbtk-selection-verification')->only('selectionVerification');
        $this->middleware('permission:tbtk-approval-verification')->only('approvalVerification');
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

        $registrations = TbtkRegistration::orderBy('registration_code', 'asc')->get();
        $not_verified_registrations = TbtkRegistration::where('registration_status', 1)->orderBy('registration_code', 'asc')->get();
        $verified_registrations = TbtkRegistration::where('registration_status', 2)->orderBy('registration_code', 'asc')->get();
        $diterima_registrations = TbtkRegistration::where('approval_status', 1)->orderBy('registration_code', 'asc')->get();
        $tidak_diterima_registrations = TbtkRegistration::where('approval_status', 2)->orderBy('registration_code', 'asc')->get();
        return view('backend.registrations.admin.index', compact('page_setting', 'registrations', 'not_verified_registrations', 'verified_registrations', 'diterima_registrations', 'tidak_diterima_registrations'));
    }

    public function show(TbtkRegistration $tbtk_registration)
    {
        $page_setting = [
            'unit' => 'PSB',
            'unit_slug' => 'psb',
            'grade' => 'TBTK',
            'grade_slug' => 'tbtk',
            'title' => 'PSB Kampus Santa Ursula Bandung | Dashboard'
        ];
        $registration_data = $tbtk_registration;

        return view('backend.registrations.admin.show', compact('page_setting', 'registration_data'));
    }

    public function edit(TbtkRegistration $tbtk_registration)
    {
        $page_setting = [
            'unit' => 'PSB',
            'unit_slug' => 'psb',
            'grade' => 'TBTK',
            'grade_slug' => 'tbtk',
            'title' => 'PSB Kampus Santa Ursula Bandung | Dashboard',
            'years' => Year::all()
        ];
        return view('backend.registrations.admin.editTbtk', compact('page_setting', 'tbtk_registration'));
    }

    public function update(UpdateTbtkRegistrationRequest $request, RegistrationUserRequest $userRequest, TbtkRegistration $tbtk_registration)
    {
        $validateData = $request->validated();
        $validateData['full_name'] = Str::title($validateData['full_name']);
        $validateData['nick_name'] = Str::title($validateData['nick_name']);
        $validateData['birth_town'] = Str::title($validateData['birth_town']);
        $validateData['birth_date'] = Carbon::createFromFormat('d/m/Y', $validateData['birth_date'])->format('Y-m-d');
        $validateData['origin_school'] = Str::title($validateData['origin_school']);
        $validateData['parent_name'] = Str::title($validateData['parent_name']);

        if ($request->file('payment_proof')) {
            if ($request->oldPaymentProof && File::exists('upload/payment_proof/tbtk/' . $request->oldPaymentProof)) {
                File::delete('upload/payment_proof/tbtk/' . $request->oldPaymentProof);
            }
            $name = $tbtk_registration->registration_code . '_' . Str::random(20) . '.' . $request->file('payment_proof')->extension();
            $request->file('payment_proof')->move('upload/payment_proof/tbtk', $name);
            $validateData['payment_proof'] = $name;
        }

        if ($request->oldBirthDate != $validateData['birth_date']) {
            $validateUserData = $userRequest->validated();
            $validateUserData['token'] = $tbtk_registration->unique_code;
            $validateUserData['name'] = $validateData['full_name'];
            $validateUserData['username'] = $tbtk_registration->registration_code;
            $validateUserData['password'] = Hash::make(Carbon::createFromFormat('Y-m-d', $validateData['birth_date'])->format('dmY'));
            User::where('username', $validateUserData['username'])->update($validateUserData);
            TbtkRegistration::where('id', $tbtk_registration->id)->update($validateData);
            $tbtk_registration_data = TbtkRegistration::where('id', $tbtk_registration->id)->first();

            $unit = 'TBTK';
            $mailData = [
                'title' => 'Perubahan Data Pendaftaran PSB TBTK Santa Ursula Bandung',
                'unit' => $unit,
                'unit_slug' => 'tbtk',
                'registration_code' => $tbtk_registration_data->registration_code,
                'virtual_code' => $tbtk_registration_data->virtual_code,
                'full_name' => $tbtk_registration_data->full_name,
                'nick_name' => $tbtk_registration_data->nick_name,
                'birthday' => $tbtk_registration_data->birth_town . ', ' . Carbon::createFromFormat('Y-m-d', $tbtk_registration_data->birth_date)->isoFormat('DD MMMM Y'),
                'origin_school' => $tbtk_registration_data->origin_school,
                'gender' => $tbtk_registration_data->gender,
                'register_year' => $tbtk_registration_data->registration_year->name,
                'register_grade' => $tbtk_registration_data->register_grade,
                'parent_name' => $tbtk_registration_data->parent_name,
                'parent_phone' => $tbtk_registration_data->parent_phone,
                'parent_email' => $tbtk_registration_data->parent_email,
                'password' => Carbon::createFromFormat('Y-m-d', $tbtk_registration_data->birth_date)->format('dmY')
            ];
            Mail::mailer('tbtk')->to($tbtk_registration_data->parent_email)->send(new RegistrationMail($mailData, 'tk@santaursula-bdg.sch.id', 'TBTK Santa Ursula Bandung', $unit, $tbtk_registration_data->full_name));
            return redirect()->route('dashboard.tbtk.admin.registration.show', $tbtk_registration->unique_code)->with('success', 'Data Pendaftaran Berhasil Diubah. Email Sudah Terkirim');
        } else {
            TbtkRegistration::where('id', $tbtk_registration->id)->update($validateData);
            return redirect()->route('dashboard.tbtk.admin.registration.show', $tbtk_registration->unique_code)->with('success', 'Data Pendaftaran Berhasil Diubah');
        }
    }

    public function destroy(TbtkRegistration $tbtk_registration)
    {
        TbtkRegistration::find($tbtk_registration->id)->delete();
        User::find($tbtk_registration->user_id)->delete();
        return redirect()->route('dashboard.tbtk.admin.registration.index')->with('success', 'Data Pendaftaran Berhasil Dihapus');
    }

    public function deletedData()
    {
        $page_setting = [
            'unit' => 'PSB',
            'unit_slug' => 'psb',
            'grade' => 'TBTK',
            'grade_slug' => 'tbtk',
            'title' => 'PSB Kampus Santa Ursula Bandung | Dashboard'
        ];
        $delete_registrations = TbtkRegistration::onlyTrashed()->orderBy('deleted_at', 'desc')->get();
        return view('backend.registrations.admin.deleted', compact('page_setting', 'delete_registrations'));
    }

    public function restore($code)
    {
        TbtkRegistration::onlyTrashed()->where('unique_code', $code)->restore();
        $data_registration = TbtkRegistration::where('unique_code', $code)->first();
        User::onlyTrashed()->where('id', $data_registration->user_id)->restore();
        return redirect()->route('dashboard.tbtk.admin.registration.index')->with('success', 'Data Pendaftaran Berhasil Dikembalikan');
    }

    public function singlePdfReport(TbtkRegistration $tbtk_registration)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadview('backend.registrations.admin.singlePdf', [
            'title' => 'Data Pendaftaran',
            'unit' => 'TBTK',
            'unit_slug' => 'tbtk',
            'todayDate' => Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now())->isoFormat('DD MMMM Y'),
            'registration_data' => $tbtk_registration,
        ])->setPaper('a4');
        return $pdf->stream('[' . Carbon::now()->format('Ymd') . '] PSB TBTK - Data Pendaftaran - ' . $tbtk_registration->full_name . '.pdf');
    }

    public function reports()
    {
        $page_setting = [
            'unit' => 'PSB',
            'unit_slug' => 'psb',
            'grade' => 'TBTK',
            'grade_slug' => 'tbtk',
            'title' => 'PSB Kampus Santa Ursula Bandung | Dashboard'
        ];
        $years = Year::all();
        return view('backend.registrations.admin.reports.tbtkReports', compact('page_setting', 'years'));
    }

    public function allExcelReport(Request $request)
    {
        if ($request->all_column == '1') {
            $registration_code = '1';
            $virtual_code = '1';
            $full_name = '1';
            $nick_name = '1';
            $birth_town = '1';
            $birth_date = '1';
            $origin_school = '1';
            $gender = '1';
            $register_year = '1';
            $register_grade = '1';
            $parent_name = '1';
            $parent_phone = '1';
            $parent_email = '1';
            $registration_date = '1';
            $registration_status = '1';
            $selection_status = '1';
            $approval_status = '1';
            $dapodik_status = '1';
            $aggrement_status = '1';
            $payment_status = '1';
            $uniform_status = '1';
            $book_status = '1';
        } else {
            $request->registration_code ? $registration_code = '1' : $registration_code = '0';
            $request->virtual_code ? $virtual_code = '1' : $virtual_code = '0';
            $request->full_name ? $full_name = '1' : $full_name = '0';
            $request->nick_name ? $nick_name = '1' : $nick_name = '0';
            $request->birth_town ? $birth_town = '1' : $birth_town = '0';
            $request->birth_date ? $birth_date = '1' : $birth_date = '0';
            $request->origin_school ? $origin_school = '1' : $origin_school = '0';
            $request->gender ? $gender = '1' : $gender = '0';
            $request->register_year ? $register_year = '1' : $register_year = '0';
            $request->register_grade ? $register_grade = '1' : $register_grade = '0';
            $request->parent_name ? $parent_name = '1' : $parent_name = '0';
            $request->parent_phone ? $parent_phone = '1' : $parent_phone = '0';
            $request->parent_email ? $parent_email = '1' : $parent_email = '0';
            $request->registration_date ? $registration_date = '1' : $registration_date = '0';
            $request->registration_status ? $registration_status = '1' : $registration_status = '0';
            $request->selection_status ? $selection_status = '1' : $selection_status = '0';
            $request->approval_status ? $approval_status = '1' : $approval_status = '0';
            $request->dapodik_status ? $dapodik_status = '1' : $dapodik_status = '0';
            $request->aggrement_status ? $aggrement_status = '1' : $aggrement_status = '0';
            $request->payment_status ? $payment_status = '1' : $payment_status = '0';
            $request->uniform_status ? $uniform_status = '1' : $uniform_status = '0';
            $request->book_status ? $book_status = '1' : $book_status = '0';
        }

        $request_year = $request->all_excel_year;
        $request_grade = $request->all_excel_grade;
        $request_filter = $request->all_excel_filter;

        if ($request_filter == 'filter-all') {
            $filter = 'Semua Data';
            if ($request_year == 0) {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::orderBy('registration_code', 'asc')->get();
                    $name = $filter;
                } else {
                    $registration_data = TbtkRegistration::where('register_grade', $request_grade)->orderBy('registration_code', 'asc')->get();
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'Kelas ' . $grade_name . ' - ' . $filter;
                }
            } else {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('register_year', $request_year)->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $name =  'TA ' . $year_name . ' - ' . $filter;
                } else {
                    $registration_data = TbtkRegistration::where('register_year', $request_year)->where('register_grade', $request_grade)->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'TA ' . $year_name . ' - Kelas ' . $grade_name . ' - ' . $filter;
                }
            }
        } elseif ($request_filter == 'filter-not-verified') {
            $filter = 'Belum Terverifikasi';
            if ($request_year == 0) {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('registration_status', 1)->orderBy('registration_code', 'asc')->get();
                    $name = $filter;
                } else {
                    $registration_data = TbtkRegistration::where('registration_status', 1)->where('register_grade', $request_grade)->orderBy('registration_code', 'asc')->get();
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'Kelas ' . $grade_name . ' - ' . $filter;
                }
            } else {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('registration_status', 1)->where('register_year', $request_year)->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $name =  'TA ' . $year_name . ' - ' . $filter;
                } else {
                    $registration_data = TbtkRegistration::where('registration_status', 1)->where('register_year', $request_year)->where('register_grade', $request_grade)->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'TA ' . $year_name . ' - Kelas ' . $grade_name . ' - ' . $filter;
                }
            }
        } elseif ($request_filter == 'filter-verified') {
            $filter = 'Terverifikasi';
            if ($request_year == 0) {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('registration_status', 2)->orderBy('registration_code', 'asc')->get();
                    $name = $filter;
                } else {
                    $registration_data = TbtkRegistration::where('registration_status', 2)->where('register_grade', $request_grade)->orderBy('registration_code', 'asc')->get();
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'Kelas ' . $grade_name . ' - ' . $filter;
                }
            } else {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('registration_status', 2)->where('register_year', $request_year)->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $name =  'TA ' . $year_name . ' - ' . $filter;
                } else {
                    $registration_data = TbtkRegistration::where('registration_status', 2)->where('register_year', $request_year)->where('register_grade', $request_grade)->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'TA ' . $year_name . ' - Kelas ' . $grade_name . ' - ' . $filter;
                }
            }
        } elseif ($request_filter == 'filter-diterima') {
            $filter = 'Diterima';
            if ($request_year == 0) {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('approval_status', 1)->orderBy('registration_code', 'asc')->get();
                    $name = $filter;
                } else {
                    $registration_data = TbtkRegistration::where('approval_status', 1)->where('register_grade', $request_grade)->orderBy('registration_code', 'asc')->get();
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'Kelas ' . $grade_name . ' - ' . $filter;
                }
            } else {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('approval_status', 1)->where('register_year', $request_year)->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $name =  'TA ' . $year_name . ' - ' . $filter;
                } else {
                    $registration_data = TbtkRegistration::where('approval_status', 1)->where('register_year', $request_year)->where('register_grade', $request_grade)->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'TA ' . $year_name . ' - Kelas ' . $grade_name . ' - ' . $filter;
                }
            }
        } elseif ($request_filter == 'filter-tidak-diterima') {
            $filter = 'Tidak Diterima';
            if ($request_year == 0) {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('approval_status', 2)->orderBy('registration_code', 'asc')->get();
                    $name = $filter;
                } else {
                    $registration_data = TbtkRegistration::where('approval_status', 2)->where('register_grade', $request_grade)->orderBy('registration_code', 'asc')->get();
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'Kelas ' . $grade_name . ' - ' . $filter;
                }
            } else {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('approval_status', 2)->where('register_year', $request_year)->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $name =  'TA ' . $year_name . ' - ' . $filter;
                } else {
                    $registration_data = TbtkRegistration::where('approval_status', 2)->where('register_year', $request_year)->where('register_grade', $request_grade)->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'TA ' . $year_name . ' - Kelas ' . $grade_name . ' - ' . $filter;
                }
            }
        } else {
            return redirect()->route('dashboard.tbtk.admin.registration.reports')->with('error', 'Data Yang Diminta Tidak Ditemukan');
        }

        if ($registration_data->isEmpty()) {
            return redirect()->route('dashboard.tbtk.admin.registration.reports')->with('error', 'Data Yang Diminta Tidak Ditemukan');
        }

        $todayDate = Carbon::now()->format('Ymd');
        $firstDate = Carbon::createFromFormat('Y-m-d H:i:s', $registration_data->first()->created_at)->isoFormat('DD MMMM Y');
        $lastDate = Carbon::createFromFormat('Y-m-d H:i:s', $registration_data->last()->created_at)->isoFormat('DD MMMM Y');

        if ($firstDate == $lastDate) {
            $file_name = '[' . $todayDate . '] PSB TBTK - Laporan Data Pendaftaran [' . $name . '] (' . $firstDate . ').xlsx';
        } else {
            $file_name = '[' . $todayDate . '] PSB TBTK - Laporan Data Pendaftaran [' . $name . '] (' . $firstDate . ' - ' . $lastDate . ').xlsx';
        }

        return Excel::download(new TbtkRegistrationExport($registration_data, $registration_code, $virtual_code, $full_name, $nick_name, $birth_town, $birth_date, $origin_school, $gender, $register_year, $register_grade, $parent_name, $parent_phone, $parent_email, $registration_date, $registration_status, $selection_status, $approval_status, $dapodik_status, $aggrement_status, $payment_status, $uniform_status, $book_status), $file_name);
    }

    public function allPdfReport(Request $request)
    {
        $request->registration_code ? $registration_code = '1' : $registration_code = '0';
        $request->virtual_code ? $virtual_code = '1' : $virtual_code = '0';
        $request->full_name ? $full_name = '1' : $full_name = '0';
        $request->nick_name ? $nick_name = '1' : $nick_name = '0';
        $request->birth_town ? $birth_town = '1' : $birth_town = '0';
        $request->birth_date ? $birth_date = '1' : $birth_date = '0';
        $request->origin_school ? $origin_school = '1' : $origin_school = '0';
        $request->gender ? $gender = '1' : $gender = '0';
        $request->register_year ? $register_year = '1' : $register_year = '0';
        $request->register_grade ? $register_grade = '1' : $register_grade = '0';
        $request->parent_name ? $parent_name = '1' : $parent_name = '0';
        $request->parent_phone ? $parent_phone = '1' : $parent_phone = '0';
        $request->parent_email ? $parent_email = '1' : $parent_email = '0';
        $request->registration_date ? $registration_date = '1' : $registration_date = '0';
        $request->registration_status ? $registration_status = '1' : $registration_status = '0';
        $request->selection_status ? $selection_status = '1' : $selection_status = '0';
        $request->approval_status ? $approval_status = '1' : $approval_status = '0';
        $request->dapodik_status ? $dapodik_status = '1' : $dapodik_status = '0';
        $request->aggrement_status ? $aggrement_status = '1' : $aggrement_status = '0';
        $request->payment_status ? $payment_status = '1' : $payment_status = '0';
        $request->uniform_status ? $uniform_status = '1' : $uniform_status = '0';
        $request->book_status ? $book_status = '1' : $book_status = '0';

        $request_year = $request->all_pdf_year;
        $request_grade = $request->all_pdf_grade;
        $request_filter = $request->all_pdf_filter;

        if ($request_filter == 'filter-all') {
            $filter = 'Semua Data';
            if ($request_year == 0) {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::orderBy('registration_code', 'asc')->get();
                    $name = $filter;
                } else {
                    $registration_data = TbtkRegistration::where('register_grade', $request_grade)->orderBy('registration_code', 'asc')->get();
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'Kelas ' . $grade_name . ' - ' . $filter;
                }
            } else {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('register_year', $request_year)->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $name =  'TA ' . $year_name . ' - ' . $filter;
                } else {
                    $registration_data = TbtkRegistration::where('register_year', $request_year)->where('register_grade', $request_grade)->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'TA ' . $year_name . ' - Kelas ' . $grade_name . ' - ' . $filter;
                }
            }
        } elseif ($request_filter == 'filter-not-verified') {
            $filter = 'Belum Terverifikasi';
            if ($request_year == 0) {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('registration_status', 1)->orderBy('registration_code', 'asc')->get();
                    $name = $filter;
                } else {
                    $registration_data = TbtkRegistration::where('registration_status', 1)->where('register_grade', $request_grade)->orderBy('registration_code', 'asc')->get();
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'Kelas ' . $grade_name . ' - ' . $filter;
                }
            } else {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('registration_status', 1)->where('register_year', $request_year)->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $name =  'TA ' . $year_name . ' - ' . $filter;
                } else {
                    $registration_data = TbtkRegistration::where('registration_status', 1)->where('register_year', $request_year)->where('register_grade', $request_grade)->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'TA ' . $year_name . ' - Kelas ' . $grade_name . ' - ' . $filter;
                }
            }
        } elseif ($request_filter == 'filter-verified') {
            $filter = 'Terverifikasi';
            if ($request_year == 0) {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('registration_status', 2)->orderBy('registration_code', 'asc')->get();
                    $name = $filter;
                } else {
                    $registration_data = TbtkRegistration::where('registration_status', 2)->where('register_grade', $request_grade)->orderBy('registration_code', 'asc')->get();
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'Kelas ' . $grade_name . ' - ' . $filter;
                }
            } else {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('registration_status', 2)->where('register_year', $request_year)->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $name =  'TA ' . $year_name . ' - ' . $filter;
                } else {
                    $registration_data = TbtkRegistration::where('registration_status', 2)->where('register_year', $request_year)->where('register_grade', $request_grade)->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'TA ' . $year_name . ' - Kelas ' . $grade_name . ' - ' . $filter;
                }
            }
        } elseif ($request_filter == 'filter-diterima') {
            $filter = 'Diterima';
            if ($request_year == 0) {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('approval_status', 1)->orderBy('registration_code', 'asc')->get();
                    $name = $filter;
                } else {
                    $registration_data = TbtkRegistration::where('approval_status', 1)->where('register_grade', $request_grade)->orderBy('registration_code', 'asc')->get();
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'Kelas ' . $grade_name . ' - ' . $filter;
                }
            } else {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('approval_status', 1)->where('register_year', $request_year)->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $name =  'TA ' . $year_name . ' - ' . $filter;
                } else {
                    $registration_data = TbtkRegistration::where('approval_status', 1)->where('register_year', $request_year)->where('register_grade', $request_grade)->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'TA ' . $year_name . ' - Kelas ' . $grade_name . ' - ' . $filter;
                }
            }
        } elseif ($request_filter == 'filter-tidak-diterima') {
            $filter = 'Tidak Diterima';
            if ($request_year == 0) {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('approval_status', 2)->orderBy('registration_code', 'asc')->get();
                    $name = $filter;
                } else {
                    $registration_data = TbtkRegistration::where('approval_status', 2)->where('register_grade', $request_grade)->orderBy('registration_code', 'asc')->get();
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'Kelas ' . $grade_name . ' - ' . $filter;
                }
            } else {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('approval_status', 2)->where('register_year', $request_year)->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $name =  'TA ' . $year_name . ' - ' . $filter;
                } else {
                    $registration_data = TbtkRegistration::where('approval_status', 2)->where('register_year', $request_year)->where('register_grade', $request_grade)->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'TA ' . $year_name . ' - Kelas ' . $grade_name . ' - ' . $filter;
                }
            }
        } else {
            return redirect()->route('dashboard.tbtk.admin.registration.reports')->with('error', 'Data Yang Diminta Tidak Ditemukan');
        }

        if ($registration_data->isEmpty()) {
            return redirect()->route('dashboard.tbtk.admin.registration.reports')->with('error', 'Data Yang Diminta Tidak Ditemukan');
        }

        $todayDate = Carbon::now()->format('Ymd');
        $todayDateConvert = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now())->isoFormat('DD MMMM Y');
        $firstDate = Carbon::createFromFormat('Y-m-d H:i:s', $registration_data->first()->created_at)->isoFormat('DD MMMM Y');
        $lastDate = Carbon::createFromFormat('Y-m-d H:i:s', $registration_data->last()->created_at)->isoFormat('DD MMMM Y');

        if ($firstDate == $lastDate) {
            $file_name = '[' . $todayDate . '] PSB TBTK - Laporan Data Pendaftaran [' . $name . '] (' . $firstDate . ').pdf';
        } else {
            $file_name = '[' . $todayDate . '] PSB TBTK - Laporan Data Pendaftaran [' . $name . '] (' . $firstDate . ' - ' . $lastDate . ').pdf';
        }

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadview('backend.registrations.admin.reports.tbtkPdf', [
            'title' => 'Laporan Data Pendaftaran',
            'year_name' => ($request_year != 0 ? $year_name : ''),
            'grade_name' => ($request_grade != 0 ? $grade_name : ''),
            'filter' => $filter,
            'registration_data' => $registration_data,
            'todayDate' => $todayDateConvert,
            'firstDate' => $firstDate,
            'lastDate' => $lastDate,
            'registration_code' => $registration_code,
            'virtual_code' => $virtual_code,
            'full_name' => $full_name,
            'nick_name' => $nick_name,
            'birth_town' => $birth_town,
            'birth_date' => $birth_date,
            'origin_school' => $origin_school,
            'gender' => $gender,
            'register_year' => $register_year,
            'register_grade' => $register_grade,
            'parent_name' => $parent_name,
            'parent_phone' => $parent_phone,
            'parent_email' => $parent_email,
            'registration_date' => $registration_date,
            'registration_status' => $registration_status,
            'selection_status' => $selection_status,
            'approval_status' => $approval_status,
            'dapodik_status' => $dapodik_status,
            'aggrement_status' => $aggrement_status,
            'payment_status' => $payment_status,
            'uniform_status' => $uniform_status,
            'book_status' => $book_status
        ])->setPaper('a4', 'landscape');
        return $pdf->stream($file_name);
    }

    public function separateExcelReport(Request $request)
    {
        if ($request->all_column == '1') {
            $registration_code = '1';
            $virtual_code = '1';
            $full_name = '1';
            $nick_name = '1';
            $birth_town = '1';
            $birth_date = '1';
            $origin_school = '1';
            $gender = '1';
            $register_year = '1';
            $register_grade = '1';
            $parent_name = '1';
            $parent_phone = '1';
            $parent_email = '1';
            $registration_date = '1';
            $registration_status = '1';
            $selection_status = '1';
            $approval_status = '1';
            $dapodik_status = '1';
            $aggrement_status = '1';
            $payment_status = '1';
            $uniform_status = '1';
            $book_status = '1';
        } else {
            $request->registration_code ? $registration_code = '1' : $registration_code = '0';
            $request->virtual_code ? $virtual_code = '1' : $virtual_code = '0';
            $request->full_name ? $full_name = '1' : $full_name = '0';
            $request->nick_name ? $nick_name = '1' : $nick_name = '0';
            $request->birth_town ? $birth_town = '1' : $birth_town = '0';
            $request->birth_date ? $birth_date = '1' : $birth_date = '0';
            $request->origin_school ? $origin_school = '1' : $origin_school = '0';
            $request->gender ? $gender = '1' : $gender = '0';
            $request->register_year ? $register_year = '1' : $register_year = '0';
            $request->register_grade ? $register_grade = '1' : $register_grade = '0';
            $request->parent_name ? $parent_name = '1' : $parent_name = '0';
            $request->parent_phone ? $parent_phone = '1' : $parent_phone = '0';
            $request->parent_email ? $parent_email = '1' : $parent_email = '0';
            $request->registration_date ? $registration_date = '1' : $registration_date = '0';
            $request->registration_status ? $registration_status = '1' : $registration_status = '0';
            $request->selection_status ? $selection_status = '1' : $selection_status = '0';
            $request->approval_status ? $approval_status = '1' : $approval_status = '0';
            $request->dapodik_status ? $dapodik_status = '1' : $dapodik_status = '0';
            $request->aggrement_status ? $aggrement_status = '1' : $aggrement_status = '0';
            $request->payment_status ? $payment_status = '1' : $payment_status = '0';
            $request->uniform_status ? $uniform_status = '1' : $uniform_status = '0';
            $request->book_status ? $book_status = '1' : $book_status = '0';
        }

        $request_year = $request->separate_excel_year;
        $request_grade = $request->separate_excel_grade;
        $request_filter = $request->separate_excel_filter;
        $first_date = Carbon::createFromFormat('d/m/Y', $request->first_date)->format('Y-m-d');
        $last_date = Carbon::createFromFormat('d/m/Y', $request->last_date)->format('Y-m-d');

        if ($request_filter == 'filter-all') {
            $filter = 'Semua Data';
            if ($request_year == 0) {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $name = $filter;
                } else {
                    $registration_data = TbtkRegistration::where('register_grade', $request_grade)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'Kelas ' . $grade_name . ' - ' . $filter;
                }
            } else {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('register_year', $request_year)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $name =  'TA ' . $year_name . ' - ' . $filter;
                } else {
                    $registration_data = TbtkRegistration::where('register_year', $request_year)->where('register_grade', $request_grade)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'TA ' . $year_name . ' - Kelas ' . $grade_name . ' - ' . $filter;
                }
            }
        } elseif ($request_filter == 'filter-not-verified') {
            $filter = 'Belum Terverifikasi';
            if ($request_year == 0) {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('registration_status', 1)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $name = $filter;
                } else {
                    $registration_data = TbtkRegistration::where('registration_status', 1)->where('register_grade', $request_grade)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'Kelas ' . $grade_name . ' - ' . $filter;
                }
            } else {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('registration_status', 1)->where('register_year', $request_year)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $name =  'TA ' . $year_name . ' - ' . $filter;
                } else {
                    $registration_data = TbtkRegistration::where('registration_status', 1)->where('register_year', $request_year)->where('register_grade', $request_grade)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'TA ' . $year_name . ' - Kelas ' . $grade_name . ' - ' . $filter;
                }
            }
        } elseif ($request_filter == 'filter-verified') {
            $filter = 'Terverifikasi';
            if ($request_year == 0) {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('registration_status', 2)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $name = $filter;
                } else {
                    $registration_data = TbtkRegistration::where('registration_status', 2)->where('register_grade', $request_grade)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'Kelas ' . $grade_name . ' - ' . $filter;
                }
            } else {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('registration_status', 2)->where('register_year', $request_year)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $name =  'TA ' . $year_name . ' - ' . $filter;
                } else {
                    $registration_data = TbtkRegistration::where('registration_status', 2)->where('register_year', $request_year)->where('register_grade', $request_grade)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'TA ' . $year_name . ' - Kelas ' . $grade_name . ' - ' . $filter;
                }
            }
        } elseif ($request_filter == 'filter-diterima') {
            $filter = 'Diterima';
            if ($request_year == 0) {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('approval_status', 1)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $name = $filter;
                } else {
                    $registration_data = TbtkRegistration::where('approval_status', 1)->where('register_grade', $request_grade)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'Kelas ' . $grade_name . ' - ' . $filter;
                }
            } else {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('approval_status', 1)->where('register_year', $request_year)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $name =  'TA ' . $year_name . ' - ' . $filter;
                } else {
                    $registration_data = TbtkRegistration::where('approval_status', 1)->where('register_year', $request_year)->where('register_grade', $request_grade)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'TA ' . $year_name . ' - Kelas ' . $grade_name . ' - ' . $filter;
                }
            }
        } elseif ($request_filter == 'filter-tidak-diterima') {
            $filter = 'Tidak Diterima';
            if ($request_year == 0) {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('approval_status', 2)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $name = $filter;
                } else {
                    $registration_data = TbtkRegistration::where('approval_status', 2)->where('register_grade', $request_grade)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'Kelas ' . $grade_name . ' - ' . $filter;
                }
            } else {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('approval_status', 2)->where('register_year', $request_year)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $name =  'TA ' . $year_name . ' - ' . $filter;
                } else {
                    $registration_data = TbtkRegistration::where('approval_status', 2)->where('register_year', $request_year)->where('register_grade', $request_grade)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'TA ' . $year_name . ' - Kelas ' . $grade_name . ' - ' . $filter;
                }
            }
        } else {
            return redirect()->route('dashboard.tbtk.admin.registration.reports')->with('error', 'Data Yang Diminta Tidak Ditemukan');
        }

        if ($registration_data->isEmpty()) {
            return redirect()->route('dashboard.tbtk.admin.registration.reports')->with('error', 'Data Yang Diminta Tidak Ditemukan');
        }

        $todayDate = Carbon::now()->format('Ymd');
        $firstDate = Carbon::createFromFormat('d/m/Y', $request->first_date)->isoFormat('DD MMMM Y');
        $lastDate = Carbon::createFromFormat('d/m/Y', $request->last_date)->isoFormat('DD MMMM Y');

        if ($firstDate == $lastDate) {
            $file_name = '[' . $todayDate . '] PSB TBTK - Laporan Data Pendaftaran [' . $name . '] (' . $firstDate . ').xlsx';
        } else {
            $file_name = '[' . $todayDate . '] PSB TBTK - Laporan Data Pendaftaran [' . $name . '] (' . $firstDate . ' - ' . $lastDate . ').xlsx';
        }

        return Excel::download(new TbtkRegistrationExport($registration_data, $registration_code, $virtual_code, $full_name, $nick_name, $birth_town, $birth_date, $origin_school, $gender, $register_year, $register_grade, $parent_name, $parent_phone, $parent_email, $registration_date, $registration_status, $selection_status, $approval_status, $dapodik_status, $aggrement_status, $payment_status, $uniform_status, $book_status), $file_name);
    }

    public function separatePdfReport(Request $request)
    {
        $request->registration_code ? $registration_code = '1' : $registration_code = '0';
        $request->virtual_code ? $virtual_code = '1' : $virtual_code = '0';
        $request->full_name ? $full_name = '1' : $full_name = '0';
        $request->nick_name ? $nick_name = '1' : $nick_name = '0';
        $request->birth_town ? $birth_town = '1' : $birth_town = '0';
        $request->birth_date ? $birth_date = '1' : $birth_date = '0';
        $request->origin_school ? $origin_school = '1' : $origin_school = '0';
        $request->gender ? $gender = '1' : $gender = '0';
        $request->register_year ? $register_year = '1' : $register_year = '0';
        $request->register_grade ? $register_grade = '1' : $register_grade = '0';
        $request->parent_name ? $parent_name = '1' : $parent_name = '0';
        $request->parent_phone ? $parent_phone = '1' : $parent_phone = '0';
        $request->parent_email ? $parent_email = '1' : $parent_email = '0';
        $request->registration_date ? $registration_date = '1' : $registration_date = '0';
        $request->registration_status ? $registration_status = '1' : $registration_status = '0';
        $request->selection_status ? $selection_status = '1' : $selection_status = '0';
        $request->approval_status ? $approval_status = '1' : $approval_status = '0';
        $request->dapodik_status ? $dapodik_status = '1' : $dapodik_status = '0';
        $request->aggrement_status ? $aggrement_status = '1' : $aggrement_status = '0';
        $request->payment_status ? $payment_status = '1' : $payment_status = '0';
        $request->uniform_status ? $uniform_status = '1' : $uniform_status = '0';
        $request->book_status ? $book_status = '1' : $book_status = '0';

        $request_year = $request->separate_pdf_year;
        $request_grade = $request->separate_pdf_grade;
        $request_filter = $request->separate_pdf_filter;
        $first_date = Carbon::createFromFormat('d/m/Y', $request->first_date)->format('Y-m-d');
        $last_date = Carbon::createFromFormat('d/m/Y', $request->last_date)->format('Y-m-d');

        if ($request_filter == 'filter-all') {
            $filter = 'Semua Data';
            if ($request_year == 0) {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $name = $filter;
                } else {
                    $registration_data = TbtkRegistration::where('register_grade', $request_grade)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'Kelas ' . $grade_name . ' - ' . $filter;
                }
            } else {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('register_year', $request_year)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $name =  'TA ' . $year_name . ' - ' . $filter;
                } else {
                    $registration_data = TbtkRegistration::where('register_year', $request_year)->where('register_grade', $request_grade)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'TA ' . $year_name . ' - Kelas ' . $grade_name . ' - ' . $filter;
                }
            }
        } elseif ($request_filter == 'filter-not-verified') {
            $filter = 'Belum Terverifikasi';
            if ($request_year == 0) {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('registration_status', 1)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $name = $filter;
                } else {
                    $registration_data = TbtkRegistration::where('registration_status', 1)->where('register_grade', $request_grade)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'Kelas ' . $grade_name . ' - ' . $filter;
                }
            } else {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('registration_status', 1)->where('register_year', $request_year)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $name =  'TA ' . $year_name . ' - ' . $filter;
                } else {
                    $registration_data = TbtkRegistration::where('registration_status', 1)->where('register_year', $request_year)->where('register_grade', $request_grade)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'TA ' . $year_name . ' - Kelas ' . $grade_name . ' - ' . $filter;
                }
            }
        } elseif ($request_filter == 'filter-verified') {
            $filter = 'Terverifikasi';
            if ($request_year == 0) {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('registration_status', 2)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $name = $filter;
                } else {
                    $registration_data = TbtkRegistration::where('registration_status', 2)->where('register_grade', $request_grade)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'Kelas ' . $grade_name . ' - ' . $filter;
                }
            } else {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('registration_status', 2)->where('register_year', $request_year)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $name =  'TA ' . $year_name . ' - ' . $filter;
                } else {
                    $registration_data = TbtkRegistration::where('registration_status', 2)->where('register_year', $request_year)->where('register_grade', $request_grade)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'TA ' . $year_name . ' - Kelas ' . $grade_name . ' - ' . $filter;
                }
            }
        } elseif ($request_filter == 'filter-diterima') {
            $filter = 'Diterima';
            if ($request_year == 0) {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('approval_status', 1)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $name = $filter;
                } else {
                    $registration_data = TbtkRegistration::where('approval_status', 1)->where('register_grade', $request_grade)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'Kelas ' . $grade_name . ' - ' . $filter;
                }
            } else {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('approval_status', 1)->where('register_year', $request_year)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $name =  'TA ' . $year_name . ' - ' . $filter;
                } else {
                    $registration_data = TbtkRegistration::where('approval_status', 1)->where('register_year', $request_year)->where('register_grade', $request_grade)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'TA ' . $year_name . ' - Kelas ' . $grade_name . ' - ' . $filter;
                }
            }
        } elseif ($request_filter == 'filter-tidak-diterima') {
            $filter = 'Tidak Diterima';
            if ($request_year == 0) {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('approval_status', 2)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $name = $filter;
                } else {
                    $registration_data = TbtkRegistration::where('approval_status', 2)->where('register_grade', $request_grade)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'Kelas ' . $grade_name . ' - ' . $filter;
                }
            } else {
                if ($request_grade == 0) {
                    $registration_data = TbtkRegistration::where('approval_status', 2)->where('register_year', $request_year)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $name =  'TA ' . $year_name . ' - ' . $filter;
                } else {
                    $registration_data = TbtkRegistration::where('approval_status', 2)->where('register_year', $request_year)->where('register_grade', $request_grade)->whereBetween('created_at', [$first_date . ' 00:00:00', $last_date . ' 23:59:59'])->orderBy('registration_code', 'asc')->get();
                    $year_name = Year::where('id', $request_year)->first()->code;
                    $grade_name = ($request_grade == '1' ? 'TB' : ($request_grade == '2' ? 'TK A' : 'TK B'));
                    $name = 'TA ' . $year_name . ' - Kelas ' . $grade_name . ' - ' . $filter;
                }
            }
        } else {
            return redirect()->route('dashboard.tbtk.admin.registration.reports')->with('error', 'Data Yang Diminta Tidak Ditemukan');
        }

        $todayDate = Carbon::now()->format('Ymd');
        $todayDateConvert = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now())->isoFormat('DD MMMM Y');
        $firstDate = Carbon::createFromFormat('d/m/Y', $request->first_date)->isoFormat('DD MMMM Y');
        $lastDate = Carbon::createFromFormat('d/m/Y', $request->last_date)->isoFormat('DD MMMM Y');

        if ($firstDate == $lastDate) {
            $file_name = '[' . $todayDate . '] PSB TBTK - Laporan Data Pendaftaran [' . $name . '] (' . $firstDate . ').pdf';
        } else {
            $file_name = '[' . $todayDate . '] PSB TBTK - Laporan Data Pendaftaran [' . $name . '] (' . $firstDate . ' - ' . $lastDate . ').pdf';
        }

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadview('backend.registrations.admin.reports.tbtkPdf', [
            'title' => 'Laporan Data Pendaftaran',
            'year_name' => ($request_year != 0 ? $year_name : ''),
            'grade_name' => ($request_grade != 0 ? $grade_name : ''),
            'filter' => $filter,
            'registration_data' => $registration_data,
            'todayDate' => $todayDateConvert,
            'firstDate' => $firstDate,
            'lastDate' => $lastDate,
            'registration_code' => $registration_code,
            'virtual_code' => $virtual_code,
            'full_name' => $full_name,
            'nick_name' => $nick_name,
            'birth_town' => $birth_town,
            'birth_date' => $birth_date,
            'origin_school' => $origin_school,
            'gender' => $gender,
            'register_year' => $register_year,
            'register_grade' => $register_grade,
            'parent_name' => $parent_name,
            'parent_phone' => $parent_phone,
            'parent_email' => $parent_email,
            'registration_date' => $registration_date,
            'registration_status' => $registration_status,
            'selection_status' => $selection_status,
            'approval_status' => $approval_status,
            'dapodik_status' => $dapodik_status,
            'aggrement_status' => $aggrement_status,
            'payment_status' => $payment_status,
            'uniform_status' => $uniform_status,
            'book_status' => $book_status
        ])->setPaper('a4', 'landscape');
        return $pdf->stream($file_name);
    }

    public function registrationVerification(TbtkRegistration $tbtk_registration, $code)
    {
        TbtkRegistration::where('id', $tbtk_registration->id)->update(['registration_status' => $code]);
        $message = ($code == 2 ? 'Verifikasi Status Pendaftaran Berhasil Dilakukan' : 'Pembatalan Verifikasi Status Pendaftaran Berhasil Dilakukan');
        return redirect()->route('dashboard.tbtk.admin.registration.index')->with('success', $message);
    }

    public function selectionVerification(TbtkRegistration $tbtk_registration, $code)
    {
        TbtkRegistration::where('id', $tbtk_registration->id)->update(['selection_status' => $code]);
        $message = ($code == 1 ? 'Verifikasi Status Observasi Berhasil Dilakukan' : 'Pembatalan Verifikasi Status Observasi Berhasil Dilakukan');
        return redirect()->route('dashboard.tbtk.admin.registration.index')->with('success', $message);
    }

    public function approvalVerification(TbtkRegistration $tbtk_registration, $code)
    {
        TbtkRegistration::where('id', $tbtk_registration->id)->update(['approval_status' => $code]);
        $registration_data = TbtkRegistration::where('id', $tbtk_registration->id)->first();
        if ($registration_data->approval_status == 1) {
            $mailData = [
                'title' => 'Pengumuman Hasil PSB TBTK Santa Ursula Bandung',
                'unit' => 'TBTK',
                'unit_slug' => 'tbtk',
                'register_grade' => $registration_data->register_grade,
                'registration_code' => $registration_data->registration_code,
                'full_name' => $registration_data->full_name,
                'register_year' => $registration_data->registration_year->name,
                'register_grade' => $registration_data->register_grade
            ];
            Mail::mailer('tbtk')->to($registration_data->parent_email)->send(new DiterimaMail($mailData, 'tk@santaursula-bdg.sch.id', 'TBTK Santa Ursula Bandung', 'TBTK', $registration_data->full_name));
            return redirect()->route('dashboard.tbtk.admin.registration.index')->with('success', 'Status Penerimaan Berhasil Diubah. Email Sudah Terkirim');
        } elseif ($registration_data->approval_status == 2) {
            $mailData = [
                'title' => 'Pengumuman Hasil PSB TBTK Santa Ursula Bandung',
                'unit' => 'TBTK',
                'unit_slug' => 'tbtk',
                'register_grade' => $registration_data->register_grade,
                'registration_code' => $registration_data->registration_code,
                'full_name' => $registration_data->full_name,
                'register_year' => $registration_data->registration_year->name,
                'register_grade' => $registration_data->register_grade
            ];
            Mail::mailer('tbtk')->to($registration_data->parent_email)->send(new DitolakMail($mailData, 'tk@santaursula-bdg.sch.id', 'TBTK Santa Ursula Bandung', 'TBTK', $registration_data->full_name));
            return redirect()->route('dashboard.tbtk.admin.registration.index')->with('success', 'Status Penerimaan Berhasil Diubah. Email Sudah Terkirim');
        } else {
            return redirect()->route('dashboard.tbtk.admin.registration.index')->with('success', 'Pembatalan Status Penerimaan Berhasil Dilakukan');
        }
    }
}
