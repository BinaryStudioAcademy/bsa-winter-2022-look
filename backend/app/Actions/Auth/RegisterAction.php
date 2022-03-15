<?php

declare(strict_types=1);

namespace App\Actions\Auth;

use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Hash;

final class RegisterAction
{
    private UserRepository $userRepository;

    public function __construct(
        UserRepository $userRepository,
    ) {
        $this->userRepository = $userRepository;
    }

    public function execute(RegisterRequest $request): RegisterResponse
    {
        $user = new User();
        $user->email = $request->getEmail();
        $user->password = Hash::make($request->getPassword());
        $user->name = $request->getName();

        /**
         * TODO Remove this after demo!
         * task for set user role https://trello.com/c/m4Am8xY2/13-create-roles-for-users
         */
        $user->role_id = 1;

        $user = $this->userRepository->save($user);

        return new RegisterResponse($user);
    }
}
