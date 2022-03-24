<?php

declare(strict_types=1);

namespace App\Actions\Auth;

class PasswordChangeRequest
{
    public function __construct(
        private array $request
    ) {
    }

    public function getToken()
    {
        return $this->request['token'];
    }

    public function getPassword()
    {
        return $this->request['password'];
    }
}
