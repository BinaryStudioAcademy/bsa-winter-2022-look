<?php

namespace App\Http\Controllers\Api\Auth;

use App\Actions\Auth\EmailConfirmationAction;
use App\Actions\Auth\EmailConfirmationRequest;
use App\Actions\Auth\GetAuthenticatedUserAction;
use App\Actions\Auth\LoginAction;
use App\Actions\Auth\LoginRequest;
use App\Actions\Auth\LogoutAction;
use App\Actions\Auth\SendValidationEmailAction;
use App\Actions\Auth\SendValidationEmailRequest;
use App\Actions\User\ChangeUserParameterAction;
use App\Actions\User\ChangeUserParameterRequest;
use App\Http\Controllers\Api\ApiController;
use App\Http\Presenters\AuthenticationResponseArrayPresenter;
use App\Http\Requests\Api\Auth\EmailConfirmationHttpRequest;
use App\Http\Requests\Api\Auth\LoginHttpRequest;
use App\Http\Requests\Api\Auth\RegisterAdditionalInfoHttpRequest;
use App\Http\Requests\Api\Auth\SendValidationEmailHttpRequest;
use Illuminate\Http\JsonResponse;
use App\Actions\Auth\RegisterAction;
use App\Actions\Auth\RegisterRequest;
use App\Http\Presenters\UserArrayPresenter;
use App\Http\Requests\Auth\RegisterHttpRequest;

final class AuthController extends ApiController
{
    private RegisterAction $registerAction;
    private $presenter;

    public function __construct(
        RegisterAction $registerAction,
        UserArrayPresenter $registerResponseArrayPresenter,
    ) {
        $this->registerAction = $registerAction;
        $this->presenter = $registerResponseArrayPresenter;
    }

    public function register(RegisterHttpRequest $request)
    {
        $response = $this->registerAction->execute(
            new RegisterRequest(
                $request->get('email'),
                $request->get('password'),
                $request->get('name'),
            )
        )->getUser();

        return $this->successResponse($this->presenter->present($response), JsonResponse::HTTP_CREATED);
    }

    public function registerAdditionalInfo(
        RegisterAdditionalInfoHttpRequest $request,
        ChangeUserParameterAction $action
    ): JsonResponse {
        $action->execute(
            new ChangeUserParameterRequest(
                $request->all()
            )
        );

        return $this->emptyResponse();
    }

    public function login(
        LoginHttpRequest $httpRequest,
        LoginAction $action,
        AuthenticationResponseArrayPresenter $authenticationResponseArrayPresenter
    ): JsonResponse {
        $request = new LoginRequest(
            $httpRequest->email,
            $httpRequest->password
        );

        $response = $action->execute($request);

        return $this->successResponse($authenticationResponseArrayPresenter->present($response));
    }

    public function logout(LogoutAction $action): JsonResponse
    {
        $action->execute();

        return $this->emptyResponse();
    }

    public function me(GetAuthenticatedUserAction $action, UserArrayPresenter $userArrayPresenter): JsonResponse
    {
        $response = $action->execute();

        return $this->successResponse($userArrayPresenter->present($response->getUser()));
    }

    public function emailConfirmation(
        EmailConfirmationAction $emailConfirmationAction,
        EmailConfirmationHttpRequest $request
    ): JsonResponse {
        $emailConfirmationAction->execute(
            new EmailConfirmationRequest(
                $request->get('token')
            )
        );

        return $this->emptyResponse();
    }

    public function sendValidationEmail(
        SendValidationEmailAction $action,
        SendValidationEmailHttpRequest $request
    ): JsonResponse {
        $action->execute(
            new SendValidationEmailRequest(
                $request->get('email')
            )
        );

        return $this->emptyResponse();
    }
}
