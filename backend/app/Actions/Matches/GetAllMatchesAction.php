<?php

declare(strict_types=1);

namespace App\Actions\Matches;

use App\Exceptions\User\UserNotFoundException;
use App\Repositories\MatchEntity\MatchEntityRepository;
use App\Repositories\UserParameterNew\UserParameterNewRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class GetAllMatchesAction
{
    public function __construct(
        private MatchEntityRepository $matchRepository,
        private UserParameterNewRepository $userParameterRepository
    ) {
    }

    public function execute()
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

        return new GetAllMatchesResponse($users);
    }
}
