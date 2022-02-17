<?php

declare(strict_types=1);

namespace App\Actions\User;

class ChangeUserParameterRequest
{
    const AVAILABLE_USER_PARAMETERS = ['looking', 'gender', 'age', 'weight', 'height', 'bio'];

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
            if (!in_array($parameterName, self::AVAILABLE_USER_PARAMETERS)) {
                continue;
            }

            $response[$parameterName] = $parameterValue;
        }

        return $response;
    }
}
