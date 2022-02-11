<?php

declare(strict_types=1);

namespace App\Repositories\Event;

use App\Models\Event;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

final class EventRepository extends BaseRepository implements EventRepositoryInterface
{

    public function findAll(): Collection
    {
        return Event::all();
    }

    public function getById($id): Event
    {
        return Event::findOrFail($id);
    }
}
