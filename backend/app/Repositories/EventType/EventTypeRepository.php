<?php

declare(strict_types=1);

namespace App\Repositories\EventType;

use App\Models\EventType;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

final class EventTypeRepository extends BaseRepository implements EventTypeRepositoryInterface
{

    public function findAll(): Collection
    {
        return Event::all();
    }

    public function getById($id): EventType
    {
        return Event::findOrFail($id);
    }
}
