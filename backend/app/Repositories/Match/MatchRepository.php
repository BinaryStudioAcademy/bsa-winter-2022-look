<?php

declare(strict_types=1);

namespace App\Repositories\Match;

use App\Models\Match;
use App\Repositories\BaseRepository;

final class MatchRepository extends BaseRepository implements MatchRepositoryInterface
{

    public function findAll(): array
    {
        return Match::all();
    }
}
