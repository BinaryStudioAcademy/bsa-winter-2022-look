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
        $response = [];

        foreach ($this->request as $parameterName => $parameterValue) {
            if ($parameterName === 'name') {
                continue;
            }

            $response[$parameterName] = $parameterValue;
        }

        return $response;
    }

    public function getInterests():array
    {
        return $this->request['interests'];
    }
}
