<?php

declare(strict_types=1);

namespace App\Actions\Matches;

use App\Exceptions\User\UserNotFoundException;
use App\Repositories\MatchEntity\MatchEntityRepository;
use App\Repositories\UserLocation\UserLocationRepository;
use App\Repositories\UserParameterNew\UserParameterNewRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;

class GetAllUsersListAction
{
    public function __construct(
        private UserParameterNewRepository $parameterRepository,
        private MatchEntityRepository $matchRepository,
        private UserLocationRepository $locationRepository
    ) {
    }

    public function execute(GetAllUsersListRequest $request)
    {
        if (is_null($userId = Auth::id())) {
            throw new UserNotFoundException();
        }

        $currentLocation = Location::get($request->getUserIp());

        if (is_null($userLocation = $this->locationRepository->getUserLocationByUserId($userId))) {
            throw new ModelNotFoundException();
        }

        $userLocation->latitude = $currentLocation->latitude;
        $userLocation->longitude = $currentLocation->longitude;

        if (is_null($this->locationRepository->save($userLocation))) {
            throw new ModelNotFoundException();
        }

        if (is_null($userParameter = $this->parameterRepository->getByUserId($userId))) {
            throw new ModelNotFoundException();
        }

        if (is_null($ratedUsers = $this->matchRepository->usersRatedByUser($userId))) {
            throw new ModelNotFoundException();
        }

        if (is_null($usersInRange = $this->locationRepository->usersIdInRange($userLocation, $request->getRange()))) {
            throw new ModelNotFoundException();
        }

        if (is_null(
            $usersList = $this->parameterRepository
                ->getUsersByParameters(
                    $userId,
                    $ratedUsers,
                    $userParameter->gender,
                    $userParameter->gender_preferences,
                    $usersInRange,
                    $request->getMinAge(),
                    $request->getMaxAge()
                )
        )) {
            throw new ModelNotFoundException();
        }

        return new GetAllUsersListResponse($usersList);
    }
}
