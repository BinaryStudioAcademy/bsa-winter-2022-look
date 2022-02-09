<?php

declare(strict_types=1);

namespace App\Repositories\Location;

use App\Models\Location;
use App\Repositories\BaseRepository;

final class LocationRepository extends BaseRepository implements LocationRepositoryInterface
{

    public function findAll(): array
    {
        return Location::all()->toArray();
    }

    public function getById($id): Location
    {
        return Location::findOrFail($id);
    }
}
