<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Auth;

use App\Actions\Auth\ForgotPasswordAction;
use App\Actions\Auth\PasswordChangeAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\ForgotPasswordRequest;
use App\Http\Requests\Api\Auth\PasswordChangeRequest;
use Illuminate\Http\JsonResponse;

class ForgotPasswordController extends Controller
{
    const RESPONSE_STATUS_NO_CONTENT = 204;

    public function passwordReset(ForgotPasswordRequest $request, ForgotPasswordAction $action): JsonResponse
    {
        $action->execute($request);

        return response()->json([], self::RESPONSE_STATUS_NO_CONTENT);
    }

    public function passwordChange(PasswordChangeRequest $request, PasswordChangeAction $action): JsonResponse
    {
        $action->execute($request);

        return response()->json([], self::RESPONSE_STATUS_NO_CONTENT);
    }
}
