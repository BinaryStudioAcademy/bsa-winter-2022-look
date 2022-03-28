<?php

declare(strict_types=1);

namespace App\Actions\Matches;

use App\Exceptions\User\UserNotFoundException;
use App\Repositories\MatchEntity\MatchEntityRepository;
use App\Repositories\UserParameterNew\UserParameterNewRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class GetAllUsersListAction
{
    public function __construct(
        private UserParameterNewRepository $parameterRepository,
        private MatchEntityRepository $matchRepository
    ) {
    }

    public function execute(GetAllUsersListRequest $request)
    {
        if (is_null($userId = Auth::id())) {
            throw new UserNotFoundException();
        }

        if (is_null($userParameter = $this->parameterRepository->getByUserId($userId))) {
            throw new ModelNotFoundException();
        }

        if (is_null($ratedUsers = $this->matchRepository->usersRatedByUser($userId))) {
            throw new ModelNotFoundException();
        }

        if (is_null(
            $usersList = $this->parameterRepository
                ->getUsersByParameters(
                    $userId,
                    $ratedUsers,
                    $userParameter->gender,
                    $userParameter->gender_preferences,
                    $userParameter->location,
                    $request->getMinAge(),
                    $request->getMaxAge()
                )
        )) {
            throw new ModelNotFoundException();
        }

        return new GetAllUsersListResponse($usersList);
    }
}
