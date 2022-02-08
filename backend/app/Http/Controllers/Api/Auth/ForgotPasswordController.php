<?php

namespace App\Http\Controllers\Api\Auth;

use App\Actions\Auth\ForgotPasswordAction;
use App\Actions\Auth\PasswordChangeAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\ForgotPasswordRequest;
use App\Http\Requests\Api\Auth\PasswordChangeRequest;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function passwordResetRequest(ForgotPasswordRequest $request, ForgotPasswordAction $action)
    {
        $action->execute($request);

        return response()->json([], 204);
    }

    public function passwordChange(PasswordChangeRequest $request, PasswordChangeAction $action)
    {
        $response = $action->execute($request);

        return response()->json(['data' => 'reset pass']);
    }

    public function passwordChangeView()
    {
        return response()->json(['data' => 'reset pass view']);
    }
}
