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

    public function save(MatchEntity $matchEntity): bool
    {
        return $matchEntity->save();
    }

    public function getLikedByUser(int $id): array
    {
        return MatchEntity::where(['first_user_id' => $id, 'status' => 'like'])->get()->pluck('second_user_id')->all();
    }

    public function getWhoLikedUser(int $id): array
    {
        return MatchEntity::where(['second_user_id' => $id, 'status' => 'like'])->get()->pluck('first_user_id')->all();
    }

    public function usersRatedByUser(int $userId): array
    {
        return MatchEntity::where('first_user_id', $userId)->get()->pluck('second_user_id')->all();
    }
}
