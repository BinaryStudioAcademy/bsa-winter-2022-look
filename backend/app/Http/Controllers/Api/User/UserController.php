<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\User;

use App\Actions\User\ChangeEmailAction;
use App\Actions\User\ChangeEmailRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\ChangeEmailHttpRequest;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    const RESPONSE_STATUS_OK = 200;

    public function changeEmail(
        ChangeEmailHttpRequest $request,
        ChangeEmailAction $action
    ): JsonResponse
    {
        $response = $action->execute(
            new ChangeEmailRequest(
                $request->get('email')
            ));

        return response()->json(['message' => $response->responseMessage()], self::RESPONSE_STATUS_OK);
    }
}
