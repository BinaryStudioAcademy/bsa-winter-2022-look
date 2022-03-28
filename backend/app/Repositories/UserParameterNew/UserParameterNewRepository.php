<?php

declare(strict_types=1);

namespace App\Repositories\UserParameterNew;

use App\Models\UserParameterNew;

class UserParameterNewRepository implements UserParameterNewRepositoryInterface
{
    const GENDER_PREFERENCE_REQUEST = [
        'Male' => ['Male'],
        'Female' => ['Female'],
        'Both' => ['Male', 'Female'],
    ];

    const GENDER_REQUEST = [
        'Male' => ['Female', 'Both'],
        'Female' => ['Male', 'Both'],
    ];

    public function getByUserId(int $id): UserParameterNew
    {
        return UserParameterNew::firstOrNew(['user_id' => $id]);
    }

    public function save(UserParameterNew $userParameter): bool
    {
        return $userParameter->save();
    }

    public function getUsersByParameters(
        int $userId,
        array $ratedUsers,
        string $gender,
        string $genderPreference,
        string $location,
        int $minAge,
        int $maxAge
    ): array {
        return UserParameterNew::select('user_parameters_new.*', 'users.name as name')
                ->join('users', 'users.id', '=', 'user_parameters_new.user_id')
                ->whereNotIn('user_id', $ratedUsers)
                ->whereIn('gender', self::GENDER_PREFERENCE_REQUEST[$genderPreference])
                ->whereIn('gender_preferences', self::GENDER_REQUEST[$gender])
                ->where('location', $location)
                ->where('user_id', '!=', $userId)
                ->havingBetween('age', [$minAge, $maxAge])
                ->limit(100)
                ->get()
                ->all();
    }

    public function getUsersById(array $usersId): array
    {
        return UserParameterNew::select('user_parameters_new.*', 'users.name as name')
                ->join('users', 'users.id', '=', 'user_parameters_new.user_id')
                ->whereIn('user_id', $usersId)->get()->all();
    }
}
