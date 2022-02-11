<?php

declare(strict_types=1);

namespace App\Repositories\Location;

use App\Models\Location;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

final class LocationRepository extends BaseRepository implements LocationRepositoryInterface
{

    public function findAll(): Collection
    {
        return Location::all();
    }

    public function getById($id): Location
    {
        return Location::findOrFail($id);
    }
}
