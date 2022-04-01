<?php

declare(strict_types=1);

namespace App\Actions\Matches;

use App\Exceptions\User\UserNotFoundException;
use App\Repositories\MatchEntity\MatchEntityRepository;
use App\Repositories\User\UserRepository;
use App\Repositories\UserLocation\UserLocationRepository;
use App\Repositories\UserParameterNew\UserParameterNewRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class GetAllMatchesAction
{
    public function __construct(
        private MatchEntityRepository $matchRepository,
        private UserParameterNewRepository $userParameterRepository,
        private UserLocationRepository $locationRepository,
        private UserRepository $userRepository
    ) {
    }

    public function execute(GetAllMatchesRequest $request)
    {
        if (is_null($userId = Auth::id())) {
            throw new UserNotFoundException();
        }

        try {
            $likedByUser = $this->matchRepository->getLikedByUser($userId);
            $whoLikedUser = $this->matchRepository->getWhoLikedUser($userId);
        } catch (\Exception $e) {
            throw new ModelNotFoundException();
        }

        $matchedId = array_intersect($likedByUser, $whoLikedUser);

        try {
            $users = $this->userParameterRepository->getUsersById($matchedId);
        } catch (\Exception $e) {
            throw new ModelNotFoundException();
        }

        if (is_null($userLocation = $this->locationRepository->getUserLocation($userId))) {
            throw new ModelNotFoundException();
        }

        if (is_null($usersAmount = $this->userRepository->getUsersAmount())) {
            throw new ModelNotFoundException();
        }

        if (is_null($distToUsers = $this->locationRepository->getDistToUsersById($userLocation, $likedByUser))) {
            throw new ModelNotFoundException();
        }

        return new GetAllMatchesResponse($users, $distToUsers, $usersAmount, $request->getStatusRequest());
    }
}
