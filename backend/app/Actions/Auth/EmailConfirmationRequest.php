<?php

declare(strict_types=1);

namespace App\Actions\Auth;

class EmailConfirmationRequest
{
    public function __construct(private string $token)
    {
    }

    public function getToken(): string
    {
        return $this->token;
    }
}
