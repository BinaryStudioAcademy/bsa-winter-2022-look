<?php

declare(strict_types=1);

namespace App\Repositories\Match;

interface MatchRepositoryInterface
{
    public function findAll(): array;
}
