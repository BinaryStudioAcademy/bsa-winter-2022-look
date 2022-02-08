<?php

declare(strict_types=1);

namespace App\Repositories\Event;

use App\Models\Event;

interface EventRepositoryInterface
{
    public function findAll(): array;
    public function getById(int $id): ?Event;
}
