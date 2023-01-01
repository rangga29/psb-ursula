<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\General;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $general_setting = General::where('id', 1)->first();
        return view('index', compact('general_setting'));
    }

    public function sendMail(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'target' => 'required',
            'subject' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ]);

        if ($validateData['target'] == 'tbtk') {
            $mailData = [
                'title' => 'Website PSB - Pertanyaan',
                'name' => $validateData['name'],
                'email' => $validateData['email'],
                'subject' => $validateData['subject'],
                'phone' => $validateData['phone'],
                'message' => $validateData['message']
            ];
            Mail::mailer('tbtk')->to('tk@santaursula-bdg.sch.id')->send(new ContactMail($mailData, $validateData['email'], $validateData['name'], $validateData['name']));
        } elseif ($validateData['target'] == 'sd') {
            $mailData = [
                'title' => 'Website PSB - Pertanyaan',
                'name' => $validateData['name'],
                'email' => $validateData['email'],
                'subject' => $validateData['subject'],
                'phone' => $validateData['phone'],
                'message' => $validateData['message']
            ];
            Mail::mailer('sd')->to('sd@santaursula-bdg.sch.id')->send(new ContactMail($mailData, $validateData['email'], $validateData['name'], $validateData['name']));
        } elseif ($validateData['target'] == 'smp') {
            $mailData = [
                'title' => 'Website PSB - Pertanyaan',
                'name' => $validateData['name'],
                'email' => $validateData['email'],
                'subject' => $validateData['subject'],
                'phone' => $validateData['phone'],
                'message' => $validateData['message']
            ];
            Mail::mailer('smp')->to('smp@santaursula-bdg.sch.id')->send(new ContactMail($mailData, $validateData['email'], $validateData['name'], $validateData['name']));
        } else {
            redirect()->route('home.index')->with('error', 'Pesan Gagal Terkirim');
        }
        return redirect()->route('home.index')->with('success', 'Pesan Berhasil Terkirim');
    }
}
