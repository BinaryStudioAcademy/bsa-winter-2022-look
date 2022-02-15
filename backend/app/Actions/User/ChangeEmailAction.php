<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Exceptions\User\UserNotFoundException;
use App\Http\Requests\Api\User\ChangeEmailRequest;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Auth;

class ChangeEmailAction
{
    public function __construct(protected UserRepository $userRepository)
    {
    }

    public function action(ChangeEmailRequest $request): ChangeEmailResponse
    {
        if (is_null($user = Auth::user())) {
            throw new UserNotFoundException();
        }
        $user->password = $request->get('email');
        $user->save();

        return new ChangeEmailResponse($user);
    }
}
