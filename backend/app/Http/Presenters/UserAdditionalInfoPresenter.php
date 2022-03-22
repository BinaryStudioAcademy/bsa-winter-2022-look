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
            'genderPreferences' => $response->getGenderPreferences(),
            'location' => $response->getLocation(),
            'height' => $response->getHeight(),
            'weight' => $response->getWeight(),
            'age' => $response->getAge(),
            'interestSelected' => $response->getInterests(),
            'hobbiesSelected' => $response->getHobbies(),
            'about' => $response->getBio(),
            'email' => $response->getEmail(),
            'instagram' => $response->getInstagram(),
            'facebook' => $response->getFacebook(),
            'other' => $response->getOther(),
        ];
    }
}
