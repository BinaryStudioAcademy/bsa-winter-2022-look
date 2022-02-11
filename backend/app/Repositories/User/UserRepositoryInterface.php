<?php

declare(strict_types=1);

namespace App\Repositories\User;

use App\Models\User;

interface UserRepositoryInterface
{
    public function getById(int $id): User;
    public function getByEmail(string $email): ?User;
    public function save(User $user): User;
    public function deleteById(int $id): void;
}
