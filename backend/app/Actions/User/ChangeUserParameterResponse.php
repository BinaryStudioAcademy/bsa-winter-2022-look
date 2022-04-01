<?php

declare(strict_types=1);

namespace App\Actions\User;

class ChangeUserParameterResponse
{
    public function responseMessage(): string
    {
        return 'Changes saved';
    }
}
