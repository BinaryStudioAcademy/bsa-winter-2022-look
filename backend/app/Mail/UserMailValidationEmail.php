<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserMailValidationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        private string $username,
        private string $token
    ) {
    }

    public function build()
    {
        return $this
            ->subject('Please confirm your email address')
            ->view('email.email_verification')
            ->with([
                'username' => $this->username,
                'token' => $this->token,
            ]);
    }
}
