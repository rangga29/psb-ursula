<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SdRegistrationExport implements FromView, ShouldAutoSize, WithStyles, WithStrictNullComparison
{
    protected $registration_data;
    protected $registration_code;
    protected $virtual_code;
    protected $registration_path;
    protected $full_name;
    protected $nick_name;
    protected $birth_town;
    protected $birth_date;
    protected $origin_school;
    protected $gender;
    protected $register_year;
    protected $register_grade;
    protected $parent_name;
    protected $parent_phone;
    protected $parent_email;
    protected $registration_date;
    protected $registration_status;
    protected $selection_status;
    protected $approval_status;
    protected $dapodik_status;
    protected $aggrement_status;
    protected $payment_status;
    protected $uniform_status;
    protected $book_status;

    function __construct($registration_data, $registration_code, $virtual_code, $registration_path, $full_name, $nick_name, $birth_town, $birth_date, $origin_school, $gender, $register_year, $register_grade, $parent_name, $parent_phone, $parent_email, $registration_date, $registration_status, $selection_status, $approval_status, $dapodik_status, $aggrement_status, $payment_status, $uniform_status, $book_status)
    {
        $this->registration_data = $registration_data;
        $this->registration_code = $registration_code;
        $this->virtual_code = $virtual_code;
        $this->registration_path = $registration_path;
        $this->full_name = $full_name;
        $this->nick_name = $nick_name;
        $this->birth_town = $birth_town;
        $this->birth_date = $birth_date;
        $this->origin_school = $origin_school;
        $this->gender = $gender;
        $this->register_year = $register_year;
        $this->register_grade = $register_grade;
        $this->parent_name = $parent_name;
        $this->parent_phone = $parent_phone;
        $this->parent_email = $parent_email;
        $this->registration_date = $registration_date;
        $this->registration_status = $registration_status;
        $this->selection_status = $selection_status;
        $this->approval_status = $approval_status;
        $this->dapodik_status = $dapodik_status;
        $this->aggrement_status = $aggrement_status;
        $this->payment_status = $payment_status;
        $this->uniform_status = $uniform_status;
        $this->book_status = $book_status;
    }

    public function view(): View
    {
        return view('backend.registrations.admin.reports.sdExcel', [
            'registration_data' => $this->registration_data,
            'registration_code' => $this->registration_code,
            'virtual_code' => $this->virtual_code,
            'registration_path' => $this->registration_path,
            'full_name' => $this->full_name,
            'nick_name' => $this->nick_name,
            'birth_town' => $this->birth_town,
            'birth_date' => $this->birth_date,
            'origin_school' => $this->origin_school,
            'gender' => $this->gender,
            'register_year' => $this->register_year,
            'register_grade' => $this->register_grade,
            'parent_name' => $this->parent_name,
            'parent_phone' => $this->parent_phone,
            'parent_email' => $this->parent_email,
            'registration_date' => $this->registration_date,
            'registration_status' => $this->registration_status,
            'selection_status' => $this->selection_status,
            'approval_status' => $this->approval_status,
            'dapodik_status' => $this->dapodik_status,
            'aggrement_status' => $this->aggrement_status,
            'payment_status' => $this->payment_status,
            'uniform_status' => $this->uniform_status,
            'book_status' => $this->book_status
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle(1)->getFont()->setBold(true);
    }
}
