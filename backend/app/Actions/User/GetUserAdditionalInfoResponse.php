<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Models\UserParameterNew;
use Illuminate\Support\Facades\Cache;

class GetUserAdditionalInfoResponse
{
    public function __construct(
        private UserParameterNew $userParameters,
        private string|null $userEmail = null
    ) {
    }
    // TODO change to the true avatar when ready
    public function getAvatarUrl(): string
    {
        return 'https://randomuser.me/api/portraits/women/56.jpg';
    }

    public function getId()
    {
        return $this->userParameters->user_id;
    }

    public function getName()
    {
        return $this->userParameters->name;
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
        return $this->userParameters->interests;
    }

    public function getHobbies()
    {
        return $this->userParameters->hobbies;
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

    public function getDistance()
    {
        return $this->userParameters->distance;
    }

    public function onlineCheck()
    {
        return Cache::has('user-is-online-' . $this->userParameters->user_id);
    }
}
