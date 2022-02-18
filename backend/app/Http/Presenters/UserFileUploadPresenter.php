<?php

declare(strict_types=1);

namespace App\Http\Presenters;

use App\Contracts\PresenterInterface;
use App\Models\UserMedia;

class UserFileUploadPresenter implements PresenterInterface
{
    public function __construct(private UserMedia $userMedia)
    {
    }

    public function present(UserMedia $media)
    {
        return [
            'id' => $media->getId(),
            'user_id' => $media->getUserId(),
            'media_type' => $media->getType(),
            'format' => $media->getFormat(),
            'filename' => $media->getFileName()
        ];
    }
}
