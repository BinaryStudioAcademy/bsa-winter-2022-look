<?php

declare(strict_types=1);

namespace App\Http\Presenters;

use App\Actions\User\GetUserAdditionalInfoResponse;
use App\Repositories\User\UserRepository;

class AllUsersAdditionalInfoPresenter
{
    public function __construct(
        private UserRepository $userRepository,
        private UserAdditionalInfoPresenter $presenter
    ) {
    }

    public function present(array $users, array $distanceToUsers, bool $statusRequest)
    {
        $usersData = [];
        foreach ($users as $key => $user) {
            if ($statusRequest && ($this->userRepository->isUserOnline($user) === false)) {
                continue;
            }
            $user->distance = intval($distanceToUsers[$user->user_id]);
            $usersData[] = $this->presenter->present(new GetUserAdditionalInfoResponse($user));
        }

        return $usersData;
    }
}
