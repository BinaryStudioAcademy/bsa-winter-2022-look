<?php

declare(strict_types=1);

namespace App\Actions\Matches;

use App\Exceptions\User\UserNotFoundException;
use App\Repositories\MatchEntity\MatchEntityRepository;
use App\Repositories\UserParameter\UserParameterRepository;
use Illuminate\Support\Facades\Auth;

class GetAllMatchesAction
{
    public function __construct(
        private MatchEntityRepository $matchRepository,
        private UserParameterRepository $userRepository
    ) {
    }

    public function execute()
    {
        if (is_null($userId = Auth::id())) {
            throw new UserNotFoundException();
        }

        $likedByUser = $this->matchRepository->getLikedByUser($userId);
        $whoLikedUser = $this->matchRepository->getWhoLikedUser($userId);
        $findMatchedId = array_intersect($likedByUser, $whoLikedUser);

        $result = [];
        foreach ($findMatchedId as $id) {
            $result[] = $this->userRepository->findAllByUserId($id);
        }

        return new GetAllMatchesResponse($result);
    }
}
