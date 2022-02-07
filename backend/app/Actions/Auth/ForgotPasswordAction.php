<?php

declare(strict_types=1);

namespace App\Actions\Auth;

use App\Exceptions\User\UserNotFoundException;
use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Hash;

final class ForgotPasswordAction
{
    public function execute($request): ForgotPasswordResponse
    {
        if ((new UserRepository())->getByEmail($request)) {

        } else {
            throw new UserNotFoundException();
        }


    }
}
