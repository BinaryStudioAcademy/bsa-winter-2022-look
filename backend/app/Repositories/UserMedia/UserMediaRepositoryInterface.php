<?php

declare(strict_types=1);

namespace App\Repositories\UserMedia;

use Illuminate\Database\Eloquent\Collection;

interface UserMediaRepositoryInterface
{
    public function findAll(): Collection;
}
