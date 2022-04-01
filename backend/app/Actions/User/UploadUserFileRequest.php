<?php

declare(strict_types=1);

namespace App\Actions\User;

use Illuminate\Http\UploadedFile;

class UploadUserFileRequest
{
    private UploadedFile $file;

    public function __construct(
        private array $files,
        private int|null $id = null
    ) {
    }

    public function getFiles(): array
    {
        return $this->files['files'];
    }

    public function getFile(): UploadedFile
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

    public function getId()
    {
        return $this->id;
    }
}
