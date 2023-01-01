<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;
    public $from_mail;
    public $from_name;
    public $unit;
    public $full_name;

    public function __construct($mailData, $from_mail, $from_name, $unit, $full_name)
    {
        $this->mailData = $mailData;
        $this->from_mail = $from_mail;
        $this->from_name = $from_name;
        $this->unit = $unit;
        $this->full_name = $full_name;
    }

    public function build()
    {
        if ($this->unit == 'SMP') {
            return $this->from($this->from_mail, $this->from_name)
                ->subject('Pendaftaran PSB ' . $this->unit . ' Santa Ursula Bandung - ' . $this->full_name)
                ->view('mail.registrationMailSmp');
        } else {
            return $this->from($this->from_mail, $this->from_name)
                ->subject('Pendaftaran PSB ' . $this->unit . ' Santa Ursula Bandung - ' . $this->full_name)
                ->view('mail.registrationMail');
        }
    }
}
