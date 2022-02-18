<?php

declare(strict_types=1);

namespace App\Actions\User;

use Illuminate\Http\UploadedFile;

class UploadUserFileRequest
{
    public function __construct(
        private UploadedFile $file,
        private string $type
    ) {}

    public function getFile(): UploadedFile
    {
        return $this->file;
    }

    public function getFormat(): string
    {
        return $this->file->getMimeType();
    }

    public function getType(): string
    {
        return $this->type;
    }

}
