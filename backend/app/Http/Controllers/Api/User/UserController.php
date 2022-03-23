<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\User;

use App\Actions\User\ChangeEmailAction;
use App\Actions\User\ChangeEmailRequest;
use App\Actions\User\ChangePasswordAction;
use App\Actions\User\ChangePasswordRequest;
use App\Actions\User\ChangeUserParameterAction;
use App\Actions\User\ChangeUserParameterRequest;
use App\Actions\User\DeleteUserFileAction;
use App\Actions\User\DeleteUserFileRequest;
use App\Actions\User\GetUserAdditionalInfoAction;
use App\Actions\User\UploadUserFileAction;
use App\Actions\User\UploadUserFileRequest;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Presenters\UserAdditionalInfoPresenter;
use App\Http\Presenters\UserFileUploadPresenter;
use App\Http\Requests\Api\User\ChangeEmailHttpRequest;
use App\Http\Requests\Api\User\ChangeUserParameterHttpRequest;
use App\Http\Requests\Api\User\ChangePasswordHttpRequest;
use App\Http\Requests\Api\User\DeleteUserFileHttpRequest;
use App\Http\Requests\Api\User\UploadUserFileHttpRequest;
use App\Models\UserMedia;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class UserController extends ApiController
{
    public function getUserAdditionalInfo(
        GetUserAdditionalInfoAction $action,
        UserAdditionalInfoPresenter $presenter
    ): JsonResponse {
        $response = $action->execute();

        return $this->successResponse($presenter->present($response));
    }

    public function changeEmail(
        ChangeEmailHttpRequest $request,
        ChangeEmailAction $action
    ): JsonResponse {
        $action->execute(
            new ChangeEmailRequest(
                $request->get('email')
            )
        );

        return $this->emptyResponse();
    }

    public function changePassword(
        ChangePasswordHttpRequest $request,
        ChangePasswordAction $action
    ): JsonResponse {
        $action->execute(
            new ChangePasswordRequest(
                $request->get('password')
            )
        );

        return $this->emptyResponse();
    }

    public function changeInfo(
        ChangeUserParameterHttpRequest $request,
        ChangeUserParameterAction $action
    ): JsonResponse {
        $response = $action->execute(new ChangeUserParameterRequest(
            $request->all()
        ));

        return $this->successResponse(['message' => $response->responseMessage()]);
    }

    public function uploadFile(
        UploadUserFileHttpRequest $request,
        UploadUserFileAction $action,
        UserFileUploadPresenter $presenter
    ) {
        $response = $action->execute(
            new UploadUserFileRequest(
                $request->file('file'),
                $request->get('media_type')
            )
        );

        return $this->successResponse($presenter->present($response->getFile()));
    }

    public function deleteFile(
        DeleteUserFileHttpRequest $request,
        DeleteUserFileAction $action
    ) {
        $action->execute(
            new DeleteUserFileRequest(
                $request->get('id')
            )
        );

        return $this->emptyResponse();
    }
}
