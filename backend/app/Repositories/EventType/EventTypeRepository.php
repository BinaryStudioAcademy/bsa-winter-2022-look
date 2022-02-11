<?php

declare(strict_types=1);

namespace App\Repositories\EventType;

use App\Models\EventType;
use App\Repositories\BaseRepository;

final class EventTypeRepository extends BaseRepository implements EventTypeRepositoryInterface
{

    public function findAll(): array
    {
        return Event::all()->toArray();
    }

    public function getById($id): EventType
    {
        return Event::findOrFail($id);
    }
}
