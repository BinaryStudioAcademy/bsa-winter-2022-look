<?php

declare(strict_types=1);

namespace App\Actions\Matches;

class GetAllMatchesResponse
{
    public function __construct(
        private array $usersParameters
    ) {
    }

    public function getUsers(): array
    {
        return $this->usersParameters;
    }
}
