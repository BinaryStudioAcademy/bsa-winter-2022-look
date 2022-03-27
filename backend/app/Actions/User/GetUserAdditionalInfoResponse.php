<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Models\UserParameterNew;

class GetUserAdditionalInfoResponse
{
    const REPLACE_PATTERN = ['[', ']', '\\', '"'];

    public function __construct(
        private UserParameterNew $userParameters,
        private string $userEmail
    ) {
    }

    public function getGender()
    {
        return $this->userParameters->gender;
    }

    public function getGenderPreferences()
    {
        return $this->userParameters->gender_preferences;
    }

    public function getLocation()
    {
        return $this->userParameters->location;
    }

    public function getHeight()
    {
        return $this->userParameters->height;
    }

    public function getWeight()
    {
        return $this->userParameters->weight;
    }

    public function getAge()
    {
        return $this->userParameters->age;
    }

    public function getInterests()
    {
        if (is_null($this->userParameters->interests)) {
            return null;
        } else {
            $result = str_replace(self::REPLACE_PATTERN, '', $this->userParameters->interests);

            return explode(',', $result);
        }
    }

    public function getHobbies()
    {
        if (is_null($this->userParameters->hobbies)) {
            return null;
        } else {
            $result = str_replace(self::REPLACE_PATTERN, '', $this->userParameters->hobbies);

            return explode(',', $result);
        }
    }

    public function getBio()
    {
        return $this->userParameters->about;
    }

    public function getEmail()
    {
        return $this->userEmail;
    }

    public function getInstagram()
    {
        return $this->userParameters->instagram;
    }

    public function getFacebook()
    {
        return $this->userParameters->facebook;
    }

    public function getOther()
    {
        return $this->userParameters->other;
    }
}
