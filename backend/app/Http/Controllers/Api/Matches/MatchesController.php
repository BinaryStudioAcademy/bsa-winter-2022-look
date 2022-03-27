<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Matches;

use App\Actions\Matches\GetAllMatchesAction;
use App\Actions\Matches\GetAllUsersListAction;
use App\Actions\Matches\GetAllUsersListRequest;
use App\Actions\Matches\SetLikeStatusAction;
use App\Actions\Matches\SetLikeStatusRequest;
use App\Http\Controllers\Api\ApiController;
use App\Http\Presenters\UserAdditionalInfoPresenter;
use App\Http\Requests\Api\Matches\GetAllUsersListHttpRequest;
use App\Http\Requests\Api\Matches\SetLikeStatusHttpRequest;
use Illuminate\Http\JsonResponse;

class MatchesController extends ApiController
{
    public function setLikeStatus(
        SetLikeStatusAction $action,
        SetLikeStatusHttpRequest $request
    ): JsonResponse {
        $action->execute(
            new SetLikeStatusRequest(
                $request->all()
            )
        );

        return $this->emptyResponse();
    }

    public function getAllMatches(
        GetAllMatchesAction $action,
        UserAdditionalInfoPresenter $presenter
    ) {
        $result = $action->execute();

        $responseData = [];
        foreach ($result->getAllUsers() as $user) {
            $responseData[] = $presenter->present($user);
        }

        return $this->successResponse(['users' => $responseData]);
    }

    public function getUsersList(
        GetAllUsersListAction $action,
        GetAllUsersListHttpRequest $request
    ) {
        $action
            ->execute(
                new GetAllUsersListRequest(
                    $request->all()
                )
            );
    }
}
