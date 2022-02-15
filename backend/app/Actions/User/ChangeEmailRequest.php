<?php

declare(strict_types=1);

namespace App\Actions\User;

class ChangeEmailRequest
{
    public function __construct(protected string $email)
    {
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
