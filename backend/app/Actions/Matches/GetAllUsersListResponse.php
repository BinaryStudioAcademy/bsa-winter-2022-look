<?php

declare(strict_types=1);

namespace App\Actions\Matches;

class GetAllUsersListResponse
{
    public function __construct(
        private array $usersList
    ) {
    }

    public function getUsers()
    {
        return $this->usersList;
    }
}
