<?php

declare(strict_types=1);

namespace App\Repositories\UserParameter;

use App\Models\UserParameter;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

final class UserParameterRepository extends BaseRepository implements UserParameterRepositoryInterface
{
    const GENDER_PREFERENCE_REQUEST = [
        'Male' => ['Male'],
        'Female' => ['Female'],
        'Both' => ['Male', 'Female'],
    ];

    public function findAll(): Collection
    {
        return UserParameter::all();
    }

    public function findAllByUserId(int $userId): array
    {
        return UserParameter::where('user_id', $userId)->get()->pluck('parameter_value', 'parameter_key')->all();
    }

    public function getUserParameter(int $userId, string $parameter): ?UserParameter
    {
        return UserParameter::firstOrCreate(
            [
                'user_id' => $userId,
                'parameter_key' => $parameter,
            ]
        );
    }

    public function save(UserParameter $userParameter): UserParameter
    {
        $userParameter->save();

        return $userParameter;
    }

    public function findSuitableUsers(
        int $userId,
        string $genderPreference,
        string $location,
        int $minAge,
        int $maxAge,
    ) {
        return UserParameter::where('parameter_key', 'gender');
    }
}
