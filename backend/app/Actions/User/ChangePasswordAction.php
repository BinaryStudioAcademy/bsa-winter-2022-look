<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Exceptions\User\UserNotFoundException;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordAction
{
    public function __construct(protected UserRepository $userRepository)
    {
    }

    public function execute(ChangePasswordRequest $request): ChangePasswordResponse
    {
        if (is_null($userId = Auth::id())) {
            throw new UserNotFoundException();
        }
        $user = $this->userRepository->getById($userId);
        $user->password = Hash::make($request->getPassword());
        $user->save();

        return new ChangePasswordResponse();
    }
}
