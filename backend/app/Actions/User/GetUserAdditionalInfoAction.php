<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Exceptions\User\UserNotFoundException;
use App\Repositories\User\UserRepository;
use App\Repositories\UserParameter\UserParameterRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class GetUserAdditionalInfoAction
{
    public function __construct(
        private UserParameterRepository $parameterRepository,
        private UserRepository $userRepository
    ) {
    }

    public function execute()
    {
        if (is_null($userId = Auth::id())) {
            throw new UserNotFoundException();
        }

        if (is_null($user = $this->userRepository->getById($userId))) {
            throw new UserNotFoundException();
        }

        if (is_null($userParameters = $this->parameterRepository->findAllByUserId($userId))) {
            throw new ModelNotFoundException();
        }

        $userParameters->name = $user->name;

        return new GetUserAdditionalInfoResponse($userParameters, $user->email);
    }
}
