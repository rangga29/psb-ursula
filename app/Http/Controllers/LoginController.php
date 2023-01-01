<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard.index');
        }
        return view('backend.login');
    }

    public function authenticate(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($validateData)) {
            $user = Auth::user();
            User::where('username', $user->username)
                ->update(['last_login' => Carbon::now()->toDateTimeString()]);
            $request->session()->regenerate();
            return redirect()->intended('dashboard/')->with('success', 'Selamat Datang');
        }

        return redirect()->route('home.index')->with('error', 'Kode Pendaftaran Atau Username Atau Password Salah');
    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home.index')->with('success', 'Berhasil Logout');
    }
}
