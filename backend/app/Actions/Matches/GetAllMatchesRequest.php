<?php

declare(strict_types=1);

namespace App\Actions\Matches;

class GetAllMatchesRequest
{
    public function __construct(
        private bool $statusRequest
    ) {
    }

    public function getStatusRequest(): bool
    {
        return $this->statusRequest;
    }
}
