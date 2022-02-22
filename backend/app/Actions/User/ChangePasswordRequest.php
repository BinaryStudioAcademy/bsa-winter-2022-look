<?php

declare(strict_types=1);

namespace App\Actions\User;

class ChangePasswordRequest
{
    public function __construct(protected string $password)
    {
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
