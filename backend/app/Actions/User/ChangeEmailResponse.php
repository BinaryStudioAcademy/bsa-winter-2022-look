<?php

declare(strict_types=1);

namespace App\Actions\User;


use App\Models\User;

class ChangeEmailResponse
{
    public function __construct(private User $user)
    {
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
