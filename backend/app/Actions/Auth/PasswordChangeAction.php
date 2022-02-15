<?php

declare(strict_types=1);

namespace App\Actions\Auth;

use App\Exceptions\User\CantUpdateUserDataException;
use App\Exceptions\User\InvalidTokenException;
use App\Exceptions\User\UserNotFoundException;
use App\Http\Requests\Api\Auth\PasswordChangeRequest;
use App\Repositories\PasswordReset\PasswordResetRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Hash;

final class PasswordChangeAction
{
    public function __construct(
        protected PasswordResetRepository $passwordResetRepository,
        protected UserRepository $userRepository
    ) {}

    public function execute(PasswordChangeRequest $request): PasswordChangeResponse
    {
        if (is_null($changePasswordData = $this->passwordResetRepository->getByToken($request->get('token')))) {
            throw new InvalidTokenException();
        }

        if (is_null($user = $this->userRepository->getByEmail($changePasswordData->email))) {
            throw new UserNotFoundException();
        }

        $user->password = Hash::make($request->get('password'));

        if (is_null($user->save())) {
            throw new CantUpdateUserDataException();
        }

        if (is_null($changePasswordData->delete())) {
            throw new InvalidTokenException();
        }

        return new PasswordChangeResponse();
    }
}
