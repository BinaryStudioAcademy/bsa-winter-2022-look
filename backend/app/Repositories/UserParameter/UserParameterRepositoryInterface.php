<?php

declare(strict_types=1);

namespace App\Repositories\UserParameter;

use Illuminate\Database\Eloquent\Collection;

interface UserParameterRepositoryInterface
{
    public function findAll(): Collection;
}
