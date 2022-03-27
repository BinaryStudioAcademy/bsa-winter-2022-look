<?php

declare(strict_types=1);

namespace App\Repositories\UserParameter;

use App\Models\UserParameter;
use Illuminate\Database\Eloquent\Collection;

interface UserParameterRepositoryInterface
{
    public function findAll(): Collection;
    public function getUserParameter(int $userId, string $parameter): ?UserParameter;
    public function save(UserParameter $userParameter): UserParameter;
    public function findSuitableUsers(int $userId, string $genderPreference, string $location, int $minAge, int $maxAge);
}
