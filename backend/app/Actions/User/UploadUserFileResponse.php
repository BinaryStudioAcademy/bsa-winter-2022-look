<?php

declare(strict_types=1);

namespace App\Actions\User;

class UploadUserFileResponse
{
    public function __construct(private array $files)
    {
    }

    public function getFiles()
    {
        return $this->files;
    }
}
