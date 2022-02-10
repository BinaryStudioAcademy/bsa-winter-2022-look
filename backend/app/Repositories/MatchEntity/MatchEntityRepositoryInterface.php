<?php

declare(strict_types=1);

namespace App\Repositories\MatchEntity;

use Illuminate\Database\Eloquent\Collection;

interface MatchEntityRepositoryInterface
{
    public function findAll(): Collection;
}
