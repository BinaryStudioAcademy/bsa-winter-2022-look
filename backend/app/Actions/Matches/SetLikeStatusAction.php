<?php

declare(strict_types=1);

namespace App\Actions\Matches;

use App\Exceptions\User\UserNotFoundException;
use App\Models\MatchEntity;
use App\Repositories\MatchEntity\MatchEntityRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class SetLikeStatusAction
{
    public function __construct(
        private MatchEntityRepository $matchesRepository
    ) {
    }

    public function execute(
        SetLikeStatusRequest $request
    ) {
        if (is_null($user_id = Auth::id()) || is_null($likeTargetId = $request->getLikeTargetId())) {
            throw new UserNotFoundException();
        }

        $matchEntity = new MatchEntity();
        $matchEntity->first_user_id = $user_id;
        $matchEntity->second_user_id = $likeTargetId;
        $matchEntity->status = $request->getStatus();

        if (is_null($this->matchesRepository->save($matchEntity))) {
            throw new ModelNotFoundException();
        }
    }
}
