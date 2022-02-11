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
}
