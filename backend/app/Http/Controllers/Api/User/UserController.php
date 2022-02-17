<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\User;

use App\Actions\User\ChangeEmailAction;
use App\Actions\User\ChangeEmailRequest;
use App\Actions\User\ChangePasswordAction;
use App\Actions\User\ChangePasswordRequest;
use App\Actions\User\ChangeUserParameterAction;
use App\Actions\User\ChangeUserParameterRequest;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Presenters\UserChangeParameterArrayPresenter;
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
        $response = $action->execute($request);

        return $this->successResponse(['message' => "Profile has been updated"], JsonResponse::HTTP_OK);
    }

    public function uploadImage(
        UploadUserImageHttpRequest $request,

    )
    {

    }
}
