<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Exceptions\User\CantUploadUserFileException;
use App\Exceptions\User\UserNotFoundException;
use App\Models\UserMedia;
use App\Repositories\UserMedia\UserMediaRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class UploadUserFileAction
{
    public function __construct(private UserMediaRepository $mediaRepository)
    {
    }

    public function execute(UploadUserFileRequest $request): UploadUserFileResponse
    {
        if (is_null($userId = Auth::id())) {
            throw new UserNotFoundException();
        }

        $response = [];

        foreach ($request->getFiles() as $file) {
            $media = new UserMedia();
            $media->user_id = $userId;
            $request->setFile($file);

            try {
                $filePath = Storage::disk('s3')->putFileAs(
                    Config::get('filesystems.user_files_dir'),
                    $request->getFile(),
                    $request->getFile()->hashName(),
                );
            } catch (\Exception $exception) {
                throw new CantUploadUserFileException();
            }

            $media->format = $request->getFormat();
            $media->filename = Storage::disk('s3')->path($filePath);

            try {
                $media = $this->mediaRepository->save($media);
            } catch (\Exception $exception) {
                throw new ModelNotFoundException();
            }
            $response[] = $media;
        }

        return new UploadUserFileResponse($response);
    }
}
