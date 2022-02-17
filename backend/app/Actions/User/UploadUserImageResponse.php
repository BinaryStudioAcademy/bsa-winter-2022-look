<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Models\UserMedia;

class UploadUserImageResponse
{
    public function __construct(private UserMedia $image)
    {
    }

    public function getImage(): UserMedia
    {
        return $this->image;
    }
}
