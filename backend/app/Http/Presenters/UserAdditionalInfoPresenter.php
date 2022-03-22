<?php

declare(strict_types=1);

namespace App\Http\Presenters;

use App\Actions\User\GetUserAdditionalInfoResponse;
use App\Contracts\PresenterInterface;

class UserAdditionalInfoPresenter implements PresenterInterface
{
    public function present(GetUserAdditionalInfoResponse $response): array
    {
        return [
            'gender' => $response->getGender(),
            'gender_preferences' => $response->getGenderPreferences(),
            'location' => $response->getLocation(),
            'height' => $response->getHeight(),
            'weight' => $response->getWeight(),
            'age' => $response->getAge(),
            'interests' => $response->getInterests(),
            'hobbies' => $response->getHobbies(),
            'about' => $response->getBio(),
            'email' => $response->getEmail(),
            'instagram' => $response->getInstagram(),
            'facebook' => $response->getFacebook(),
            'other_social' => $response->getOther(),
        ];
    }
}
