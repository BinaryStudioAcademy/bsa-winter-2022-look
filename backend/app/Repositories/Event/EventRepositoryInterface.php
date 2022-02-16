<?php

declare(strict_types=1);

namespace App\Repositories\Event;

use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;

interface EventRepositoryInterface
{
    public function findAll(): Collection;
    public function getById(int $id): Event;
}
