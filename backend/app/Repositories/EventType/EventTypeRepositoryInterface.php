<?php

declare(strict_types=1);

namespace App\Repositories\EventType;

use App\Models\EventType;

interface EventTypeRepositoryInterface
{
    public function findAll(): array;
    public function getById(int $id): EventType;
}
