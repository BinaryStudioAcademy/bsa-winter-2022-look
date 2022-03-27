<?php

declare(strict_types=1);

namespace App\Actions\Matches;

class GetAllUsersListRequest
{
    public function __construct(
        private array $request
    ) {
    }

    public function getLocation(): string
    {
        return $this->request['location'];
    }

    public function getMaxAge(): int
    {
        return $this->request['max_age'];
    }
    public function getMinAge(): int
    {
        return $this->request['min_age'];
    }
}
