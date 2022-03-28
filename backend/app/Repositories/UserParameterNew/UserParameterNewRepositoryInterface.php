<?php

declare(strict_types=1);

namespace App\Repositories\UserParameterNew;

use App\Models\UserParameterNew;

interface UserParameterNewRepositoryInterface
{
    public function getByUserId(int $id): UserParameterNew;
    public function save(UserParameterNew $userParameter): bool;
    public function getUsersByParameters(
        int $userId,
        array $ratedUsers,
        string $gender,
        string $genderPreference,
        array $usersInRange,
        int $minAge,
        int $maxAge
    ): array;
    public function getUsersById(array $usersId): array;
}
