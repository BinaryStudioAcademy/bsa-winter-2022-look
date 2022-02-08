<?php

declare(strict_types=1);

namespace App\Repositories\UserInterest;

use App\Models\UserInterest;
use App\Repositories\BaseRepository;

final class UserInterestRepository extends BaseRepository implements UserInterestRepositoryInterface
{

    public function findAll(): array
    {
        return UserInterest::all();
    }
}
