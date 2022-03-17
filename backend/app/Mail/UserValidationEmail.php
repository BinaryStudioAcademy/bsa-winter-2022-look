<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserValidationEmail extends Mailable
{
    use Queueable, SerializesModels;

    private string $token;

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function build()
    {
        return $this
            ->subject('Please confirm your email address')
            ->view('email.email_verification')
            ->with([
                'token' => $this->token,
            ]);
    }
}
