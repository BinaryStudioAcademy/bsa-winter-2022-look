<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Models\UserMedia;

class UploadUserFileResponse
{
    public function __construct(private UserMedia $image)
    {
    }

    public function getFile(): UserMedia
    {
        return $this->image;
    }
}
