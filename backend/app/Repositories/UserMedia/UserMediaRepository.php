<?php

declare(strict_types=1);

namespace App\Repositories\UserMedia;

use App\Models\UserMedia;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

final class UserMediaRepository extends BaseRepository implements UserMediaRepositoryInterface
{
    public function findAll(): Collection
    {
        return UserMedia::all();
    }

    public function save(UserMedia $media): UserMedia
    {
        $media->save();

        return $media;
    }
}
