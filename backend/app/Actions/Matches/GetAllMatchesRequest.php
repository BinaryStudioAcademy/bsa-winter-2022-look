<?php

declare(strict_types=1);

namespace App\Actions\Matches;

class GetAllMatchesRequest
{
    public function __construct(
        private array $request
    ) {
    }
}
