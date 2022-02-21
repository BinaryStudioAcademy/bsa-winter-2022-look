<?php

declare(strict_types=1);

namespace App\Repositories\UserInterest;

use App\Models\UserInterest;
use Illuminate\Database\Eloquent\Collection;

interface UserInterestRepositoryInterface
{
    public function findAll(): Collection;
    public function getUserInterests(int $userId): ?UserInterest;
    public function save(UserInterest $userInterest): UserInterest;
}
