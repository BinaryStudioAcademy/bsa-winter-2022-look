<?php

declare(strict_types=1);

namespace App\Actions\Auth;


class PasswordChangeResponse
{
    public function response(): string
    {
        return 'Password has been changed';
    }
}
