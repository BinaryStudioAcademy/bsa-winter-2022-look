<?php

declare(strict_types=1);

namespace App\Actions\Matches;

class GetAllUsersListResponse
{
    public function __construct(
        private array $usersList,
        private array $distanceToUsers
    ) {
    }

    public function getUsers()
    {
        return $this->usersList;
    }

    public function distanceToUser($userId): int
    {
        return intval($this->distanceToUsers[$userId]);
    }
}
