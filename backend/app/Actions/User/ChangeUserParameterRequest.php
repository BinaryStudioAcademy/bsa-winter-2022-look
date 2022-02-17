<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Models\UserParameter;

class ChangeUserParameterRequest
{
    public function __construct(
        private string $looking,
        private string $gender,
        private int $age,
        private int $weight,
        private int $height,
        private string $bio
    ) {}

    public function getLooking(): string
    {
        return $this->looking;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getBio(): string
    {
        return $this->bio;
    }

}
