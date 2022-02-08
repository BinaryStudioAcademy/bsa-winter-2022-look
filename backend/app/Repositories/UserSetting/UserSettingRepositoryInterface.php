<?php

declare(strict_types=1);

namespace App\Repositories\UserSetting;

interface UserSettingRepositoryInterface
{
    public function findAll(): array;
}
