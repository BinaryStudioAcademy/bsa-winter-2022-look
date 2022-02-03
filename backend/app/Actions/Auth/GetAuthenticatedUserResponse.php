<?php

namespace App\Actions\Auth;

use App\Models\User;

class GetAuthenticatedUserResponse
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
