<?php

declare(strict_types=1);

namespace App\Actions\User;


use App\Exceptions\User\UserNotFoundException;
use App\Models\UserMedia;
use App\Repositories\UserMedia\UserMediaRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class UploadUserImageAction
{
    public function __construct(private UserMediaRepository $mediaRepository)
    {
    }

    public function execute(UploadUserImageRequest $request): UploadUserImageResponse
    {
        if (is_null($userId = Auth::id())){
            throw new UserNotFoundException();
        }

        $filePath = Storage::putFileAs(
            Config::get('filesystems.user_images_dir'),
            $request->getImage(),
            $request->getImage()->hashName(),
            'public'
        );

        $media = new UserMedia();

        $media->user_id = $userId;
        $media->format = $request->getFormat();
        $media->media_type = $request->getType();
        $media->filename = Storage::url($filePath);

        try {
            $media = $this->mediaRepository->save($media);
        } catch (\Exception $exception) {
            throw new ModelNotFoundException();
        }

        return new UploadUserImageResponse($media);
    }
}
