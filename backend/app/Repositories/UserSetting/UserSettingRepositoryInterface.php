<?php

declare(strict_types=1);

namespace App\Repositories\UserSetting;

use Illuminate\Database\Eloquent\Collection;

interface UserSettingRepositoryInterface
{
    public function findAll(): Collection;
}
