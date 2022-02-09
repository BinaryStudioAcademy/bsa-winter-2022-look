<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;
    public function __construct(public string $token)
    {
        //
    }

    public function build()
    {
        return $this
            ->subject('Restore password')
            ->view('email.forgot_password')
            ->with(['token' => $this->token]);
    }
}
