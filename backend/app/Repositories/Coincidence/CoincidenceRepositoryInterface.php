<?php

declare(strict_types=1);

namespace App\Repositories\Coincidence;

use Illuminate\Database\Eloquent\Collection;

interface CoincidenceRepositoryInterface
{
    public function findAll(): Collection;
}
