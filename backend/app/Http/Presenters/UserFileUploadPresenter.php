<?php

declare(strict_types=1);

namespace App\Http\Presenters;

use App\Contracts\PresenterInterface;
use Illuminate\Support\Facades\Storage;

class UserFileUploadPresenter implements PresenterInterface
{
    public function present(array $files):array
    {
        $response = [];

        foreach ($files as $file) {
            $response[] = [
                'url' => Storage::disk(config('filesystems.storage_type'))->temporaryUrl($file->getFilename(), '+2 minutes'),
            ];
        }

        return $response;
    }
}
