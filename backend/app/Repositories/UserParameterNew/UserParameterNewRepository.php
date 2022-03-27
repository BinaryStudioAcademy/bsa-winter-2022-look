<?php

declare(strict_types=1);

namespace App\Repositories\UserParameterNew;

use App\Models\UserParameterNew;

class UserParameterNewRepository implements UserParameterNewRepositoryInterface
{
    public function getByUserId(int $id): UserParameterNew
    {
        return UserParameterNew::firstOrNew(['user_id' => $id]);
    }

    public function save(UserParameterNew $userParameter): bool
    {
        return $userParameter->save();
    }
}
