<?php

declare(strict_types=1);

namespace App\Actions\User;

class ChangeEmailResponse
{
    public function __construct()
    {
    }

    public function responseMessage(): string
    {
        return 'Email has been changed';
    }
}
