<?php

declare(strict_types=1);

namespace App\Actions\User;

class GetUserAdditionalInfoResponse
{
    const REPLACE_PATTERN = ['[', ']', '\\', '"'];

    public function __construct(
        private array $userParameters,
        private string $userEmail
    ) {
    }

    public function getGender()
    {
        return $this->userParameters['gender'];
    }

    public function getGenderPreferences()
    {
        return $this->userParameters['genderPreferences'];
    }

    public function getLocation()
    {
        return $this->userParameters['location'];
    }

    public function getHeight()
    {
        return $this->userParameters['height'];
    }

    public function getWeight()
    {
        return $this->userParameters['weight'];
    }

    public function getAge()
    {
        return $this->userParameters['age'];
    }

    public function getInterests()
    {
        $result = str_replace(self::REPLACE_PATTERN, '', $this->userParameters['interests']);

        return explode(',', $result);
    }

    public function getHobbies()
    {
        $result = str_replace(self::REPLACE_PATTERN, '', $this->userParameters['hobbies']);

        return explode(',', $result);
    }

    public function getBio()
    {
        return $this->userParameters['about'];
    }

    public function getEmail()
    {
        return $this->userEmail;
    }

    public function getInstagram()
    {
        if (array_key_exists('instagram', $this->userParameters)) {
            return $this->userParameters['instagram'];
        } else {
            return null;
        }
    }

    public function getFacebook()
    {
        if (array_key_exists('facebook', $this->userParameters)) {
            return $this->userParameters['facebook'];
        } else {
            return null;
        }
    }

    public function getOther()
    {
        if (array_key_exists('other', $this->userParameters)) {
            return $this->userParameters['other'];
        } else {
            return null;
        }
    }
}
