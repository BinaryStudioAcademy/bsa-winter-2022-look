<?php

declare(strict_types=1);

namespace App\Actions\Matches;

use App\Exceptions\User\UserNotFoundException;
use App\Repositories\UserParameter\UserParameterRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class GetAllUsersListAction
{
    public function __construct(
        private UserParameterRepository $parameterRepository
    ) {
    }

    public function execute(GetAllUsersListRequest $request)
    {
        if (is_null($userId = Auth::id())) {
            throw new UserNotFoundException();
        }

        if (is_null($userParameter = $this->parameterRepository->findAllByUserId($userId))) {
            throw new ModelNotFoundException();
        }

        $usersListId = $this->parameterRepository
            ->findAllByUserPreferences(
                $userId,
                $userParameter['genderPreferences'],
                $request->getMinAge(),
                $request->getMaxAge(),
                $userParameter['location']
            );
    }
}
