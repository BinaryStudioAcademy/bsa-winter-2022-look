<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Auth;

use App\Actions\Auth\ForgotPasswordAction;
use App\Actions\Auth\PasswordChangeAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\ForgotPasswordRequest;
use App\Http\Requests\Api\Auth\PasswordChangeRequest;

class ForgotPasswordController extends Controller
{
    const RESPONSE_STATUS_NO_CONTENT = 204;

    public function passwordResetRequest(ForgotPasswordRequest $request, ForgotPasswordAction $action)
    {
        $action->execute($request);

        return response()->json([], self::RESPONSE_STATUS_NO_CONTENT);
    }

    public function passwordChange(PasswordChangeRequest $request, PasswordChangeAction $action)
    {
        $action->execute($request);

        return response()->json([], self::RESPONSE_STATUS_NO_CONTENT);
    }

    public function passwordChangeView()
    {
        return response()->view('auth.reset_password');
    }
}
