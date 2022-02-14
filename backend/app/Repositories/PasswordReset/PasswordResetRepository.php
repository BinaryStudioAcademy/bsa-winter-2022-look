<?php

declare(strict_types=1);

namespace App\Repositories\PasswordReset;

use App\Models\PasswordResets;
use App\Repositories\BaseRepository;

final class PasswordResetRepository extends BaseRepository implements PasswordResetRepositoryInterface
{
    public function getByToken(string $token): ?PasswordResets
    {
        return PasswordResets::firstWhere('token', $token);
    }

    public function deleteByToken(string $token): void
    {
        PasswordResets::where('token', $token)->delete();
    }
}
