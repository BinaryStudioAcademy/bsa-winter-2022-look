<?php

declare(strict_types=1);

namespace App\Actions\User;

class GetUserAdditionalInfoResponse
{
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
        return $this->userParameters['gender_preferences'];
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
        return $this->userParameters['interests'];
    }

    public function getHobbies()
    {
        return $this->userParameters['hobbies'];
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
            return '';
        }
    }

    public function getFacebook()
    {
        if (array_key_exists('facebook', $this->userParameters)) {
            return $this->userParameters['facebook'];
        } else {
            return '';
        }
    }

    public function getOther()
    {
        if (array_key_exists('other_social', $this->userParameters)) {
            return $this->userParameters['other_social'];
        } else {
            return '';
        }
    }
}
