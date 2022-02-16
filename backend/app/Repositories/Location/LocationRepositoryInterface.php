<?php

declare(strict_types=1);

namespace App\Repositories\Location;

use App\Models\Location;
use Illuminate\Database\Eloquent\Collection;

interface LocationRepositoryInterface
{
    public function findAll(): Collection;
    public function getById(int $id): Location;
}
