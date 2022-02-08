<?php

declare(strict_types=1);

namespace App\Repositories\Role;

use App\Models\Role;
use App\Repositories\BaseRepository;

final class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{

    public function all(): array
    {
        return Role::all();
    }
}
