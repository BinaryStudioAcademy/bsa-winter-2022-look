<?php

declare(strict_types=1);

namespace App\Actions\User;

class GetUserAdditionalInfoResponse
{
    const REPLACE_PATTERN = ['[', ']', '\\', '"'];

    public function __construct(
        private array $userParameters,
        private ?string $userEmail = null
    ) {
    }

    public function getAvatar(): string
    {
        return 'https://randomuser.me/api/portraits/women/80.jpg';
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
        if (array_key_exists('height', $this->userParameters)) {
            return $this->userParameters['height'];
        } else {
            return null;
        }
    }

    public function getWeight()
    {
        if (array_key_exists('weight', $this->userParameters)) {
            return $this->userParameters['weight'];
        } else {
            return null;
        }
    }

    public function getAge()
    {
        if (array_key_exists('age', $this->userParameters)) {
            return $this->userParameters['age'];
        } else {
            return null;
        }
    }

    public function getInterests()
    {
        if (array_key_exists('interrests', $this->userParameters)) {
            $result = str_replace(self::REPLACE_PATTERN, '', $this->userParameters['interests']);

            return explode(',', $result);
        } else {
            return null;
        }
    }

    public function getHobbies()
    {
        if (array_key_exists('hobbies', $this->userParameters)) {
            $result = str_replace(self::REPLACE_PATTERN, '', $this->userParameters['hobbies']);

            return explode(',', $result);
        } else {
            return null;
        }
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
