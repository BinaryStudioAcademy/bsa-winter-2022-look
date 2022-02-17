<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\User;

use App\Actions\User\ChangeEmailAction;
use App\Actions\User\ChangeEmailRequest;
use App\Actions\User\ChangePasswordAction;
use App\Actions\User\ChangePasswordRequest;
use App\Actions\User\ChangeUserParameterAction;
use App\Actions\User\ChangeUserParameterRequest;
use App\Actions\User\UploadUserImageAction;
use App\Actions\User\UploadUserImageRequest;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Presenters\UserChangeParameterArrayPresenter;
use App\Http\Presenters\UserImageUploadPresenter;
use App\Http\Requests\Api\User\ChangeEmailHttpRequest;
use App\Http\Requests\Api\User\ChangeUserParameterHttpRequest;
use App\Http\Requests\Api\User\ChangePasswordHttpRequest;
use App\Http\Requests\Api\User\UploadUserImageHttpRequest;
use Illuminate\Http\JsonResponse;

class UserController extends ApiController
{
    public function changeEmail(
        ChangeEmailHttpRequest $request,
        ChangeEmailAction $action
    ): JsonResponse
    {
        $response = $action->execute(
            new ChangeEmailRequest(
                $request->get('email')
            ));

        return $this->emptyResponse();
    }

    public function changePassword(
        ChangePasswordHttpRequest $request,
        ChangePasswordAction $action
    ): JsonResponse
    {
        $response = $action->execute(
            new ChangePasswordRequest(
                $request->get('password')
            ));

        return $this->emptyResponse();
    }

    public function changeInfo(
        ChangeUserParameterHttpRequest $request,
        ChangeUserParameterAction $action
    ): JsonResponse
    {
        $response = $action->execute
        (new ChangeUserParameterRequest(
            $request->all()
        ));

        return $this->successResponse(['message' => $response->responseMessage()]);
    }

    public function uploadImage(
        UploadUserImageHttpRequest $request,
        UploadUserImageAction $action,
        UserImageUploadPresenter $presenter
    )
    {
        $response = $action->execute(
            new UploadUserImageRequest(
                $request->file('image'),
                $request->get('media_type')
            ));

        return $this->successResponse($presenter->present($response->getImage()));
    }
}
