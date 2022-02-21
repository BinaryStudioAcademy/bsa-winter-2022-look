<?php

declare(strict_types=1);

namespace App\Repositories\PasswordReset;

use App\Models\PasswordResets;

interface PasswordResetRepositoryInterface
{
    public function getByToken(string $token): ?PasswordResets;
    public function deleteByToken(string $token): void;
}
