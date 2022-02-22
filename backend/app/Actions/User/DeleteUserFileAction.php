<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Exceptions\User\FileNotFoundException;
use App\Repositories\UserMedia\UserMediaRepository;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;

class DeleteUserFileAction
{
    public function __construct(private UserMediaRepository $userMediaRepository)
    {
    }

    public function execute(DeleteUserFileRequest $request)
    {
        try {
            $file = $this->userMediaRepository->getById($request->getId());
        } catch (\Exception $exception) {
            throw new FileNotFoundException();
        }

        if ($file->getUserId() !== Auth::id()) {
            throw new AuthorizationException();
        }

        $this->userMediaRepository->delete($file);
    }
}
