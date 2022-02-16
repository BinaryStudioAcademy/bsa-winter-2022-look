<?php

declare(strict_types=1);

namespace App\Repositories\UserSetting;

use App\Models\UserSetting;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

final class UserSettingRepository extends BaseRepository implements UserSettingRepositoryInterface
{
    public function findAll(): Collection
    {
        return UserSetting::all();
    }
}
