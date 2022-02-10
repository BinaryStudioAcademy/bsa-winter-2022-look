<?php

declare(strict_types=1);

namespace App\Repositories\Location;

use App\Models\Location;

interface LocationRepositoryInterface
{
    public function findAll(): array;
    public function getById(int $id): Location;
}
