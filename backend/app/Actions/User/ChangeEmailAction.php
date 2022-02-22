<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Exceptions\User\UserNotFoundException;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Auth;

class ChangeEmailAction
{
    public function __construct(protected UserRepository $userRepository)
    {
    }

    public function execute(ChangeEmailRequest $request): ChangeEmailResponse
    {
        if (is_null($userId = Auth::id())) {
            throw new UserNotFoundException();
        }
        $user = $this->userRepository->getById($userId);
        $user->email = $request->getEmail();
        $user->save();

        return new ChangeEmailResponse();
    }
}
