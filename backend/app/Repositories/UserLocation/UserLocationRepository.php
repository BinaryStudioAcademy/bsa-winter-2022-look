<?php

declare(strict_types=1);

namespace App\Repositories\UserLocation;

use App\Models\UserLocation;

class UserLocationRepository implements UserLocationRepositoryInterface
{
    const INNER_RADIUS = 0;

    public function save(UserLocation $userLocation): bool
    {
        return $userLocation->save();
    }

    public function getUserLocationByUserId(int $id): UserLocation
    {
        return UserLocation::firstOrNew(['user_id' => $id]);
    }

    public function usersIdInRange(UserLocation $location, int $range): array
    {
        return UserLocation::geofence(
            $location->latitude,
            $location->longitude,
            self::INNER_RADIUS,
            $range
        )
            ->get()
            ->toArray();
    }
}
