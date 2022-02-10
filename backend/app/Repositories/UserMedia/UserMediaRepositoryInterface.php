<?php

declare(strict_types=1);

namespace App\Repositories\UserMedia;

interface UserMediaRepositoryInterface
{
    public function findAll(): array;
}
