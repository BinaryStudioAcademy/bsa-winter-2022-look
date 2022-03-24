<?php

declare(strict_types=1);

namespace App\Actions\User;

use Illuminate\Http\UploadedFile;

class UploadUserFileRequest
{
    private UploadedFile $file;

    public function __construct(
        private array $files,
    ) {
    }

    public function getFiles()
    {
        return $this->files['files'];
    }

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file)
    {
        $this->file = $file;
    }

    public function getFormat(): string
    {
        return $this->file->getMimeType();
    }
}
