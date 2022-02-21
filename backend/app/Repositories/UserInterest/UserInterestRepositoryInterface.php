<?php

declare(strict_types=1);

namespace App\Repositories\UserInterest;

use Illuminate\Database\Eloquent\Collection;

interface UserInterestRepositoryInterface
{
    public function findAll(): Collection;
}
