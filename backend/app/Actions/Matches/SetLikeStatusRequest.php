<?php

declare(strict_types=1);

namespace App\Actions\Matches;

class SetLikeStatusRequest
{
    public function __construct(
        private array $request
    ) {
    }

    public function getLikeTargetId()
    {
        return $this->request['id'];
    }

    public function getStatus()
    {
        return $this->request['status'];
    }
}
