<?php

declare(strict_types=1);

namespace App\Repositories\UserParameter;

use App\Models\UserParameter;
use App\Repositories\BaseRepository;

final class UserParameterRepository extends BaseRepository implements UserParameterRepositoryInterface
{

    public function findAll(): array
    {
        return UserParameter::all()->toArray();
    }
}
