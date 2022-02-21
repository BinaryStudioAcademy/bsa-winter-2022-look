<?php

declare(strict_types=1);

namespace App\Repositories\UserMedia;

use App\Models\UserMedia;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

final class UserMediaRepository extends BaseRepository implements UserMediaRepositoryInterface
{
    public function findAll(): Collection
    {
        return UserMedia::all();
    }

    public function save(UserMedia $userMedia): UserMedia
    {
        $userMedia->save();

        return $userMedia;
    }

    public function getById(int $id): ?UserMedia
    {
        return UserMedia::findOrFail($id);
    }

    public function getFilename(UserMedia $userMedia): string
    {
        return $userMedia->filename;
    }

    public function delete(UserMedia $userMedia): ?bool
    {
        Storage::disk('s3')->delete($this->getFilename($userMedia));

        return $userMedia->delete();
    }
}
