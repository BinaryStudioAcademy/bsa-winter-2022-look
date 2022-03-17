<?php

declare(strict_types=1);

namespace App\Actions\Auth;

class SendValidationEmailRequest
{
    public function __construct(
        private string $email
    ) {
    }

    public function getEmail()
    {
        return $this->email;
    }
}
