<?php

declare(strict_types=1);

namespace App\Repositories\Role;

use Illuminate\Database\Eloquent\Collection;

interface RoleRepositoryInterface
{
    public function all(): Collection;
}
