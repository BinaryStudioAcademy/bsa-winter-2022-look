<?php

declare(strict_types=1);

namespace App\Http\Presenters;

use App\Contracts\PresenterInterface;
use App\Models\UserMedia;

class UserFileUploadPresenter implements PresenterInterface
{
    public function present(array $files)
    {
        $response = [];
        foreach ($files as $file) {
            $response[] = [
                'id' => $file->getId(),
                'user_id' => $file->getUserId(),
                'format' => $file->getFormat(),
                'filename' => $file->getFileName(),
            ];
        }

        return $response;
    }
}
