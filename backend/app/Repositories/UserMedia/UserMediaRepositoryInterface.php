<?php

declare(strict_types=1);

namespace App\Repositories\UserMedia;

use App\Models\UserMedia;
use Illuminate\Database\Eloquent\Collection;

interface UserMediaRepositoryInterface
{
    public function findAll(): Collection;
    public function save(UserMedia $userMedia): ?UserMedia;
    public function getById(int $id): ?UserMedia;
    public function delete(UserMedia $userMedia): ?bool;
    public function getUrlByUserId(int $id);
}
