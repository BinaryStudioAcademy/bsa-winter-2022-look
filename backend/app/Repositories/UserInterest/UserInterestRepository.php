<?php

declare(strict_types=1);

namespace App\Repositories\UserInterest;

use App\Models\UserInterest;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

final class UserInterestRepository extends BaseRepository implements UserInterestRepositoryInterface
{
    public function findAll(): Collection
    {
        return UserInterest::all();
    }

    public function getUserInterests(int $userId): ?UserInterest
    {
        return UserInterest::firstOrCreate(
            [
                'user_id' => $userId,
            ]
        );
    }

    public function save(UserInterest $userInterest): UserInterest
    {
        $userInterest->save();

        return $userInterest;
    }
}
