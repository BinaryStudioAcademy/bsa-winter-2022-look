<?php

declare(strict_types=1);

namespace App\Repositories\Coincidence;

use App\Models\Coincidence;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

final class CoincidenceRepository extends BaseRepository implements CoincidenceRepositoryInterface
{

    public function findAll(): Collection
    {
        return Coincidence::all();
    }
}
