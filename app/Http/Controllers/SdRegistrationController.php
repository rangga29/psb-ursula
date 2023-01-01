<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationUserRequest;
use App\Http\Requests\StoreSdRegistrationRequest;
use App\Mail\RegistrationMail;
use App\Models\General;
use App\Models\SdRegistration;
use App\Models\User;
use App\Models\Year;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SdRegistrationController extends Controller
{
    public function internal()
    {
        $general_setting = General::where('id', 1)->first();
        if ($general_setting->sd_internal_registration_open != 1) {
            return redirect()->route('home.index')->with('error', 'PSB SD Jalur Internal Belum Dibuka');
        }

        $page_setting = [
            'unit' => 'SD',
            'unit_slug' => 'sd',
            'title' => 'PSB SD Santa Ursula Bandung | Formulir Pendaftaran',
            'path' => 'Internal'
        ];
        return view('registration.sd.regulation', compact('page_setting'));
    }

    public function internalForm()
    {
        $general_setting = General::where('id', 1)->first();
        if ($general_setting->sd_internal_registration_open != 1) {
            return redirect()->route('home.index')->with('error', 'PSB TBTK Belum Dibuka');
        }

        $page_setting = [
            'unit' => 'SD',
            'unit_slug' => 'sd',
            'title' => 'PSB SD Santa Ursula Bandung | Formulir Pendaftaran',
            'path' => 'Internal',
            'years' => Year::all(),
        ];
        return view('registration.sd.internalForm', compact('page_setting'));
    }

    public function internalStore(StoreSdRegistrationRequest $request, RegistrationUserRequest $userRequest)
    {
        $validateData = $request->validated();

        $register_year = Year::where('id', $validateData['register_year'])->first();
        $registration_group = SdRegistration::withTrashed()->where('register_year', $register_year->id)->where('register_grade', $validateData['register_grade'])->orderBy('registration_code', 'asc')->get();
        if ($registration_group->isEmpty()) {
            $validateData['registration_code'] = $register_year->code . '20' . $validateData['register_grade'] . '001';
        } else {
            $register_number = Str::substr($registration_group->last()->registration_code, 7, 3) + 1;
            if ($register_number <= 9) {
                $validateData['registration_code'] = $register_year->code . '20' . $validateData['register_grade'] . '00' . $register_number;
            } elseif ($register_number <= 99) {
                $validateData['registration_code'] = $register_year->code . '20' . $validateData['register_grade'] . '0' . $register_number;
            } else {
                $validateData['registration_code'] = $register_year->code . '20' . $validateData['register_grade'] . $register_number;
            }
        }

        $validateData['unique_code'] = Str::random(20);
        $validateData['virtual_code'] = '894780' . $validateData['registration_code'];
        $validateData['registration_path'] = 'Internal';
        $validateData['full_name'] = Str::title($validateData['full_name']);
        $validateData['nick_name'] = Str::title($validateData['nick_name']);
        $validateData['birth_town'] = Str::title($validateData['birth_town']);
        $validateData['birth_date'] = Carbon::createFromFormat('d/m/Y', $validateData['birth_date'])->format('Y-m-d');
        $validateData['origin_school'] = Str::title($validateData['origin_school']);
        $validateData['parent_name'] = Str::title($validateData['parent_name']);

        $name = $validateData['registration_code'] . '_' . Str::random(20) . '.' . $request->file('payment_proof')->extension();
        $request->file('payment_proof')->move('upload/payment_proof/sd', $name);
        $validateData['payment_proof'] = $name;

        $validateUserData = $userRequest->validated();
        $validateUserData['token'] = $validateData['unique_code'];
        $validateUserData['name'] = $validateData['full_name'];
        $validateUserData['username'] = $validateData['registration_code'];
        $validateUserData['password'] = Hash::make(Carbon::createFromFormat('Y-m-d', $validateData['birth_date'])->format('dmY'));

        $userRegistration = User::create($validateUserData);
        $userRegistration->assignRole('Siswa SD');

        $user = User::where('username', $validateUserData['username'])->first();
        $validateData['user_id'] = $user->id;
        $validateData['registration_status'] = 1;

        SdRegistration::create($validateData);

        $unit = 'SD';
        $mailData = [
            'title' => 'Pendaftaran PSB SD Santa Ursula Bandung',
            'unit' => $unit,
            'unit_slug' => 'sd',
            'registration_code' => $validateData['registration_code'],
            'virtual_code' => $validateData['virtual_code'],
            'full_name' => $validateData['full_name'],
            'nick_name' => $validateData['nick_name'],
            'birthday' => $validateData['birth_town'] . ', ' . Carbon::createFromFormat('Y-m-d', $validateData['birth_date'])->isoFormat('DD MMMM Y'),
            'origin_school' => $validateData['origin_school'],
            'gender' => $validateData['gender'],
            'register_year' => $register_year->name,
            'register_grade' => $validateData['register_grade'],
            'parent_name' => $validateData['parent_name'],
            'parent_phone' => $validateData['parent_phone'],
            'parent_email' => $validateData['parent_email'],
            'password' => Carbon::createFromFormat('Y-m-d', $validateData['birth_date'])->format('dmY')
        ];
        Mail::mailer('sd')->to($validateData['parent_email'])->send(new RegistrationMail($mailData, 'sd@santaursula-bdg.sch.id', 'SD Santa Ursula Bandung', $unit, $validateData['full_name']));
        return redirect()->route('sd.registration.finish');
    }

    public function external()
    {
        $general_setting = General::where('id', 1)->first();
        if ($general_setting->sd_external_registration_open != 1) {
            return redirect()->route('home.index')->with('error', 'PSB SD Jalur External Belum Dibuka');
        }

        $page_setting = [
            'unit' => 'SD',
            'unit_slug' => 'sd',
            'title' => 'PSB SD Santa Ursula Bandung | Formulir Pendaftaran',
            'path' => 'External'
        ];
        return view('registration.sd.regulation', compact('page_setting'));
    }

    public function externalForm()
    {
        $general_setting = General::where('id', 1)->first();
        if ($general_setting->sd_external_registration_open != 1) {
            return redirect()->route('home.index')->with('error', 'PSB TBTK Belum Dibuka');
        }

        $page_setting = [
            'unit' => 'SD',
            'unit_slug' => 'sd',
            'title' => 'PSB SD Santa Ursula Bandung | Formulir Pendaftaran',
            'path' => 'External',
            'years' => Year::all(),
        ];
        return view('registration.sd.externalForm', compact('page_setting'));
    }

    public function externalStore(StoreSdRegistrationRequest $request, RegistrationUserRequest $userRequest)
    {
        $validateData = $request->validated();

        $register_year = Year::where('id', $validateData['register_year'])->first();
        $registration_group = SdRegistration::withTrashed()->where('register_year', $register_year->id)->where('register_grade', $validateData['register_grade'])->orderBy('registration_code', 'asc')->get();
        if ($registration_group->isEmpty()) {
            $validateData['registration_code'] = $register_year->code . '20' . $validateData['register_grade'] . '001';
        } else {
            $register_number = Str::substr($registration_group->last()->registration_code, 7, 3) + 1;
            if ($register_number <= 9) {
                $validateData['registration_code'] = $register_year->code . '20' . $validateData['register_grade'] . '00' . $register_number;
            } elseif ($register_number <= 99) {
                $validateData['registration_code'] = $register_year->code . '20' . $validateData['register_grade'] . '0' . $register_number;
            } else {
                $validateData['registration_code'] = $register_year->code . '20' . $validateData['register_grade'] . $register_number;
            }
        }

        $validateData['unique_code'] = Str::random(20);
        $validateData['virtual_code'] = '894780' . $validateData['registration_code'];
        $validateData['registration_path'] = 'External';
        $validateData['full_name'] = Str::title($validateData['full_name']);
        $validateData['nick_name'] = Str::title($validateData['nick_name']);
        $validateData['birth_town'] = Str::title($validateData['birth_town']);
        $validateData['birth_date'] = Carbon::createFromFormat('d/m/Y', $validateData['birth_date'])->format('Y-m-d');
        $validateData['origin_school'] = Str::title($validateData['origin_school']);
        $validateData['parent_name'] = Str::title($validateData['parent_name']);

        $name = $validateData['registration_code'] . '_' . Str::random(20) . '.' . $request->file('payment_proof')->extension();
        $request->file('payment_proof')->move('upload/payment_proof/sd', $name);
        $validateData['payment_proof'] = $name;

        $validateUserData = $userRequest->validated();
        $validateUserData['token'] = $validateData['unique_code'];
        $validateUserData['name'] = $validateData['full_name'];
        $validateUserData['username'] = $validateData['registration_code'];
        $validateUserData['password'] = Hash::make(Carbon::createFromFormat('Y-m-d', $validateData['birth_date'])->format('dmY'));

        $userRegistration = User::create($validateUserData);
        $userRegistration->assignRole('Siswa SD');

        $user = User::where('username', $validateUserData['username'])->first();
        $validateData['user_id'] = $user->id;
        $validateData['registration_status'] = 1;

        SdRegistration::create($validateData);

        $unit = 'SD';
        $mailData = [
            'title' => 'Pendaftaran PSB SD Santa Ursula Bandung',
            'unit' => $unit,
            'unit_slug' => 'sd',
            'registration_code' => $validateData['registration_code'],
            'virtual_code' => $validateData['virtual_code'],
            'full_name' => $validateData['full_name'],
            'nick_name' => $validateData['nick_name'],
            'birthday' => $validateData['birth_town'] . ', ' . Carbon::createFromFormat('Y-m-d', $validateData['birth_date'])->isoFormat('DD MMMM Y'),
            'origin_school' => $validateData['origin_school'],
            'gender' => $validateData['gender'],
            'register_year' => $register_year->name,
            'register_grade' => $validateData['register_grade'],
            'parent_name' => $validateData['parent_name'],
            'parent_phone' => $validateData['parent_phone'],
            'parent_email' => $validateData['parent_email'],
            'password' => Carbon::createFromFormat('Y-m-d', $validateData['birth_date'])->format('dmY')
        ];
        Mail::mailer('sd')->to($validateData['parent_email'])->send(new RegistrationMail($mailData, 'sd@santaursula-bdg.sch.id', 'SD Santa Ursula Bandung', $unit, $validateData['full_name']));
        return redirect()->route('sd.registration.finish');
    }

    public function finish()
    {
        $general_setting = General::where('id', 1)->first();
        if ($general_setting->sd_internal_registration_open != 1 && $general_setting->sd_external_registration_open != 1) {
            return redirect()->route('home.index')->with('error', 'PSB SD Belum Dibuka');
        }

        $page_setting = [
            'unit' => 'SD',
            'unit_slug' => 'sd',
            'title' => 'PSB SD Santa Ursula Bandung | Formulir Pendaftaran'
        ];
        return view('registration.sd.finish', compact('page_setting'));
    }
}
