<?php

declare(strict_types=1);

namespace App\Http\Presenters;

use App\Actions\User\GetUserAdditionalInfoResponse;
use App\Contracts\PresenterInterface;
use App\Models\UserMedia;
use App\Repositories\UserMedia\UserMediaRepository;

class UserAdditionalInfoPresenter implements PresenterInterface
{
    public function __construct(
        private UserMediaRepository $mediaRepository
    ) {
    }

    public function present(GetUserAdditionalInfoResponse $response): array
    {
        return [
            'id' => $response->getId(),
            'name' => $response->getName(),
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
            'avatar' => $response->getAvatarUrl($this->mediaRepository, $response->getId()),
            'distance' => $response->getDistance(),
            'online' => $response->onlineCheck(),
        ];
    }
}
