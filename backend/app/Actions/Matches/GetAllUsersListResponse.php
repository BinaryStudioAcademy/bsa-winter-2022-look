<?php

declare(strict_types=1);

namespace App\Actions\Matches;

class GetAllUsersListResponse
{
    public function __construct(
        private array $usersList,
        private array $distanceToUsers,
        private int $usersAmount,
        private bool $usersStatusRequest
    ) {
    }

    public function getUsers(): array
    {
        return $this->usersList;
    }

    public function distanceToUser($userId): int
    {
        return intval($this->distanceToUsers[$userId]);
    }

    public function usersAmount(): int
    {
        return $this->usersAmount;
    }

    public function statusRequest(): bool
    {
        return $this->usersStatusRequest;
    }
}
