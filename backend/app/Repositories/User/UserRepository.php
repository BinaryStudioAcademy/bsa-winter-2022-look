<?php

declare(strict_types=1);

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;

final class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getById(int $id): User
    {
        return User::findOrFail($id);
    }

    public function getByEmail(string $email): ?User
    {
        return User::firstWhere('email', $email);
    }

    public function getByVerifiedEmail(string $email): ?User
    {
        return User::where('email', $email)->whereNotNull('email_verified_at')->first();
    }

    public function save(User $user): User
    {
        $user->save();

        return $user;
    }

    public function deleteById(int $id): void
    {
        User::destroy($id);
    }

    public function markUserEmail(User $user): void
    {
        $user->markEmailAsVerified();
    }

    public function getEmailById(int $id): string
    {
        return User::findOrFail($id)->email;
    }

    public function getUsersAmount(): int
    {
        return User::count();
    }
}
