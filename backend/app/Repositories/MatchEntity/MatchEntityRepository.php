<?php

declare(strict_types=1);

namespace App\Repositories\MatchEntity;

use App\Models\MatchEntity;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

final class MatchEntityRepository extends BaseRepository implements MatchEntityRepositoryInterface
{
    public function findAll(): Collection
    {
        return MatchEntity::all();
    }
}
