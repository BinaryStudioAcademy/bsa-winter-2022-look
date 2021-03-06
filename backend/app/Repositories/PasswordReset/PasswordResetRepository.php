<?php

declare(strict_types=1);

namespace App\Repositories\PasswordReset;

use App\Models\PasswordResets;
use App\Repositories\BaseRepository;

final class PasswordResetRepository extends BaseRepository implements PasswordResetRepositoryInterface
{
    public function getByToken(string $token): ?PasswordResets
    {
        return PasswordResets::where('token', $token)->firstOrFail();
    }

    public function deleteByToken(string $token): int
    {
        return PasswordResets::where('token', $token)->delete();
    }

    public function save(PasswordResets $passwordResets): PasswordResets
    {
        $passwordResets->save();

        return $passwordResets;
    }
}
