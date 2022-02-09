<?php

declare(strict_types=1);

namespace App\Repositories\UserMedia;

use App\Models\UserMedia;
use App\Repositories\BaseRepository;

final class UserMediaRepository extends BaseRepository implements UserMediaRepositoryInterface
{

    public function findAll(): array
    {
        return UserMedia::all()->toArray();
    }
}
