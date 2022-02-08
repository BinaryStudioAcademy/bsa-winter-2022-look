<?php

declare(strict_types=1);

namespace App\Repositories\UserParameter;

interface UserParameterRepositoryInterface
{
    public function findAll(): array;
}
