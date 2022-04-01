<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Exceptions\User\CantUploadUserFileException;
use App\Exceptions\User\UserNotFoundException;
use App\Models\UserMedia;
use App\Repositories\UserMedia\UserMediaRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadUserFileAction
{
    public function __construct(private UserMediaRepository $mediaRepository)
    {
    }

    public function execute(UploadUserFileRequest $request): UploadUserFileResponse
    {
        if ($request->getId() && is_null(Auth::id())) {
            $userId = $request->getId();
        } elseif (Auth::id()) {
            $userId = Auth::id();
        } else {
            throw new UserNotFoundException();
        }

        $response = [];

        foreach ($request->getFiles() as $file) {
            $media = new UserMedia();
            $media->user_id = $userId;
            $request->setFile($file);

            try {
                $filePath = Storage::disk(config('filesystems.storage_type'))->putFile(
                    (config('filesystems.user_files_dir') . $userId),
                    $request->getFile()
                );
            } catch (\Exception $exception) {
                throw new CantUploadUserFileException();
            }

            $media->format = $request->getFormat();
            $media->filename = Storage::disk(config('filesystems.storage_type'))->path($filePath);

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
