<?php

declare(strict_types=1);

namespace App\Repositories\UserSetting;

use App\Models\UserSetting;
use App\Repositories\BaseRepository;

final class UserSettingRepository extends BaseRepository implements UserSettingRepositoryInterface
{

    public function findAll(): array
    {
        return UserSetting::all();
    }
}
