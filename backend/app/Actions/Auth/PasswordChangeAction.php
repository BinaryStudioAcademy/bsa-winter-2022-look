<?php

declare(strict_types=1);

namespace App\Actions\Auth;

use App\Exceptions\User\InvalidTokenException;
use App\Exceptions\User\UserNotFoundException;
use App\Http\Requests\Api\Auth\PasswordChangeRequest;
use App\Repositories\PasswordReset\PasswordResetRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Hash;

final class PasswordChangeAction
{
    public function execute(PasswordChangeRequest $request): PasswordChangeResponse
    {
        if (is_null((new PasswordResetRepository())->getByToken($request->get('token')))) {
            throw new InvalidTokenException();
        }
        $changePasswordData = (new PasswordResetRepository())->getByToken($request->get('token'));
        $user = (new UserRepository())->getByEmail($changePasswordData->email);

        if (is_null($user)) {
            throw new UserNotFoundException();
        }

        try {
            $user->password = Hash::make($request->get('password'));
            $user->save();
            $changePasswordData->delete();
        } catch (\Exception $exception) {
            throw new InvalidTokenException();
        }

        return new PasswordChangeResponse();
    }
}
