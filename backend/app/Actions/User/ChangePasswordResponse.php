<?php

declare(strict_types=1);

namespace App\Actions\User;

class ChangePasswordResponse
{
    public function __construct()
    {
    }

    public function responseMessage(): string
    {
        return 'Password has been changed';
    }
}
