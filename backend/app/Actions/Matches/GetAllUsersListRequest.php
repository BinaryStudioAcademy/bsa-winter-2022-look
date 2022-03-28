<?php

declare(strict_types=1);

namespace App\Actions\Matches;

class GetAllUsersListRequest
{
    const KIEV_API = '185.237.74.247';

    public function __construct(
        private array $request,
        private string $ip
    ) {
    }

    public function getRange(): int
    {
        return $this->request['range'];
    }

    public function getMaxAge(): int
    {
        return $this->request['max_age'];
    }
    public function getMinAge(): int
    {
        return $this->request['min_age'];
    }

    public function getUserIp(): string
    {
        if ($this->ip === '127.0.0.1') {
            return self::KIEV_API;
        } else {
            return $this->ip;
        }
    }
}
