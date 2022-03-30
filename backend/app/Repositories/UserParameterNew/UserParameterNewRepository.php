<?php

declare(strict_types=1);

namespace App\Repositories\UserParameterNew;

use App\Models\UserParameterNew;
use Illuminate\Support\Facades\Cache;

class UserParameterNewRepository implements UserParameterNewRepositoryInterface
{
    const GENDER_PREFERENCE_REQUEST = [
        'Male' => ['Male'],
        'Female' => ['Female'],
        'Both' => ['Male', 'Female'],
    ];

    const GENDER_REQUEST = [
        'Male' => ['Male', 'Both'],
        'Female' => ['Female', 'Both'],
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
        array $usersInRange,
        int $minAge,
        int $maxAge
    ): array {
        return UserParameterNew::select('user_parameters_new.*', 'users.name as name', 'users.last_seen as last_seen')
            ->join('users', 'users.id', '=', 'user_parameters_new.user_id')
            ->whereNotIn('user_id', $ratedUsers)
            ->whereIn('user_id', $usersInRange)
            ->whereIn('gender', self::GENDER_PREFERENCE_REQUEST[$genderPreference])
            ->whereIn('gender_preferences', self::GENDER_REQUEST[$gender])
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

    public function isUserOnline(UserParameterNew $user): bool
    {
        return Cache::has('user-is-online-' . $user->user_id);
    }
}
