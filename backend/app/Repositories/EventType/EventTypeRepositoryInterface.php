<?php

declare(strict_types=1);

namespace App\Repositories\EventType;

use App\Models\EventType;
use Illuminate\Database\Eloquent\Collection;

interface EventTypeRepositoryInterface
{
    public function findAll(): Collection;
    public function getById(int $id): EventType;
}
