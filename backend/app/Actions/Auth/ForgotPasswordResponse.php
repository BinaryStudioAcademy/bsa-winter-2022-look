<?php

declare(strict_types=1);

namespace App\Actions\Auth;

class ForgotPasswordResponse
{
    public function response(): string
    {
        return 'Message to your email has been send';
    }
}
