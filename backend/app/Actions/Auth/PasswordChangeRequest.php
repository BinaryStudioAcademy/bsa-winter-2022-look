<?php

declare(strict_types=1);

namespace App\Actions\Auth;

class PasswordChangeRequest
{
    public function __construct(
        private string $token
    ) {
    }

    public function getToken()
    {
        return $this->token;
    }
}
