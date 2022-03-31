<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Matches;

use App\Actions\Matches\GetAllLikedAction;
use App\Actions\Matches\GetAllLikedRequest;
use App\Actions\Matches\GetAllMatchesAction;
use App\Actions\Matches\GetAllMatchesRequest;
use App\Actions\Matches\GetAllUsersListAction;
use App\Actions\Matches\GetAllUsersListRequest;
use App\Actions\Matches\SetLikeStatusAction;
use App\Actions\Matches\SetLikeStatusRequest;
use App\Actions\User\GetUserAdditionalInfoResponse;
use App\Http\Controllers\Api\ApiController;
use App\Http\Presenters\AllUsersAdditionalInfoPresenter;
use App\Http\Presenters\UserAdditionalInfoPresenter;
use App\Http\Requests\Api\Matches\GetAllLikedHttpRequest;
use App\Http\Requests\Api\Matches\GetAllMatchesHttpRequest;
use App\Http\Requests\Api\Matches\GetAllUsersListHttpRequest;
use App\Http\Requests\Api\Matches\SetLikeStatusHttpRequest;
use App\Repositories\UserParameterNew\UserParameterNewRepository;
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
        AllUsersAdditionalInfoPresenter $presenter,
        GetAllMatchesHttpRequest $request,
    ): JsonResponse {
        $result = $action->execute(
            new GetAllMatchesRequest(
                $request->get('status')
            )
        );

        $usersData = $presenter
            ->present(
                $result->getUsers(),
                $result->distanceToUsers(),
                $result->statusRequest()
            );

        return $this->successResponse(['users' => $usersData, 'usersTotal' => $result->usersAmount()]);
    }

    public function getUsersList(
        GetAllUsersListAction $action,
        GetAllUsersListHttpRequest $request,
        UserAdditionalInfoPresenter $presenter,
        UserParameterNewRepository $userRepository
    ): JsonResponse {
        $result = $action
            ->execute(
                new GetAllUsersListRequest(
                    $request->all(),
                    $request->ip()
                )
            );

        $usersData = [];
        foreach ($result->getUsers() as $key => $user) {
            if ($result->statusRequest() && ($userRepository->isUserOnline($user) === false)) {
                continue;
            }
            $user->distance = $result->distanceToUser($user->user_id);
            $usersData[] = $presenter->present(new GetUserAdditionalInfoResponse($user));
        }

        return $this->successResponse(['users' => $usersData, 'usersTotal' => $result->usersAmount()]);
    }

    public function getAllLiked(
        GetAllLikedHttpRequest $request,
        GetAllLikedAction $action,
        AllUsersAdditionalInfoPresenter $presenter,
    ): JsonResponse {
        $result = $action
            ->execute(
                new GetAllLikedRequest(
                    $request->get('status')
                )
            );

        $usersData = $presenter
            ->present(
                $result->getUsers(),
                $result->distanceToUsers(),
                $result->statusRequest()
            );

        return $this->successResponse(['users' => $usersData, 'usersTotal' => $result->usersAmount()]);
    }
}
