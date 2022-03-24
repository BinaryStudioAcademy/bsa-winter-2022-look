<?php

declare(strict_types=1);

namespace App\Actions\Auth;

use App\Exceptions\User\CantUpdateUserDataException;
use App\Exceptions\User\InvalidTokenException;
use App\Exceptions\User\UserNotFoundException;
use App\Repositories\PasswordReset\PasswordResetRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Hash;

final class PasswordChangeAction
{
    public function __construct(
        private PasswordResetRepository $passwordResetRepository,
        private UserRepository $userRepository
    ) {
    }

    public function execute(PasswordChangeRequest $request): PasswordChangeResponse
    {
        if (is_null($changePasswordData = $this->passwordResetRepository->getByToken($request->getToken()))) {
            throw new InvalidTokenException();
        }

        if (is_null($user = $this->userRepository->getByEmail($changePasswordData->email))) {
            throw new UserNotFoundException();
        }

        $user->password = Hash::make($request->getPassword());

        if (is_null($this->userRepository->save($user))) {
            throw new CantUpdateUserDataException();
        }

        if (is_null($this->passwordResetRepository->deleteByToken($request->getToken()))) {
            throw new InvalidTokenException();
        }

        return new PasswordChangeResponse();
    }
}
