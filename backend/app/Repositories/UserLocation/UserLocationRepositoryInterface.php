<?php

declare(strict_types=1);

namespace App\Repositories\UserLocation;

use App\Models\UserLocation;

interface UserLocationRepositoryInterface
{
    public function save(UserLocation $location): bool;
    public function getUserLocationByUserId(int $id): UserLocation;
    public function usersIdInRange(UserLocation $location, int $range): array;
    public function getDistToUsersById(UserLocation $user, array $usersId): array;
    public function getUserLocation(int $userId): UserLocation;
}
