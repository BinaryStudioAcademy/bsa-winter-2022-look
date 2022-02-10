<?php

declare(strict_types=1);

namespace App\Repositories\UserInterest;

interface UserInterestRepositoryInterface
{
    public function findAll(): array;
}
