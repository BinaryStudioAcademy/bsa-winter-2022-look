<?php

declare(strict_types=1);

namespace App\Actions\User;

class ChangeUserParameterRequest
{
    public function __construct(private array $request)
    {
    }

    public function getName():string
    {
        return $this->request['name'];
    }

    public function getAllParameters(): array
    {
        return $this->request;
    }
}
