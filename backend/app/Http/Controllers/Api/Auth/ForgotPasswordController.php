<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Auth;

use App\Actions\Auth\ForgotPasswordAction;
use App\Actions\Auth\PasswordChangeAction;
use App\Actions\Auth\PasswordChangeRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\ForgotPasswordRequest;
use App\Http\Requests\Api\Auth\PasswordChangeHttpRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ForgotPasswordController extends Controller
{
    public function passwordReset(
        ForgotPasswordRequest $request,
        ForgotPasswordAction $action
    ): JsonResponse {
        $action->execute($request);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }

    public function passwordChange(
        PasswordChangeHttpRequest $request,
        PasswordChangeAction $action
    ): JsonResponse {
        $action->execute(
            new PasswordChangeRequest(
                $request->all()
            )
        );

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
