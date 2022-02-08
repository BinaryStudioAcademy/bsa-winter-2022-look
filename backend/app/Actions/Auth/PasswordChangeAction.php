<?php

declare(strict_types=1);

namespace App\Actions\Auth;

use App\Exceptions\User\InvalidTokenException;
use App\Http\Requests\Api\Auth\PasswordChangeRequest;
use App\Models\PasswordResets;
use App\Models\User;

final class PasswordChangeAction
{
    public function execute(PasswordChangeRequest $request): PasswordChangeResponse
    {
        if (!PasswordResets::where('token', $request->get('token'))) {
            throw new InvalidTokenException();
        }

        $resetData = PasswordResets::where('token', $request->get('token'));
        if($resetData->get()->first()->toArray()['email'] !== $request->get('email')) {
            throw new InvalidTokenException();
        }

        if(User::where('email', $request->get('email'))->update(array('password' => $request->get('password')))) {
            return new PasswordChangeResponse();
        } else {
            throw new InvalidTokenException();
        }
    }
}
