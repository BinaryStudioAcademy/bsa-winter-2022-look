<?php

declare(strict_types=1);

namespace App\Repositories\MatchEntity;

use App\Models\MatchEntity;
use Illuminate\Database\Eloquent\Collection;

interface MatchEntityRepositoryInterface
{
    public function findAll(): Collection;
    public function save(MatchEntity $matchEntity): bool;
    public function getLikedByUser(int $id): array;
    public function getWhoLikedUser(int $id): array;
}
