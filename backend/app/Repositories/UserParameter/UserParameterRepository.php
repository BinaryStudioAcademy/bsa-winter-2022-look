<?php

declare(strict_types=1);

namespace App\Repositories\UserParameter;

use App\Models\UserParameter;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

final class UserParameterRepository extends BaseRepository implements UserParameterRepositoryInterface
{
    public function findAll(): Collection
    {
        return UserParameter::all();
    }

    public function getUserParameter(int $userid, string $parameter): ?UserParameter
    {
        return UserParameter::firstOrCreate(
            [
                'user_id' => $userid,
                'parameter_key' => $parameter
            ]);
    }

}
