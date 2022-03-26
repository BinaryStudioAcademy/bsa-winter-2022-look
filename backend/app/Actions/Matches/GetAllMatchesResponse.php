<?php

declare(strict_types=1);

namespace App\Actions\Matches;

use App\Actions\User\GetUserAdditionalInfoResponse;

class GetAllMatchesResponse
{
    public function __construct(
        private array $usersParameters
    ) {
    }

    public function getAllUsers(): array
    {
        $result = [];
        foreach ($this->usersParameters as $userParameter) {
            $result[] = new GetUserAdditionalInfoResponse($userParameter);
        }

        return $result;
    }
}
