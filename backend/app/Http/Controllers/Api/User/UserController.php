<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\ChangeEmailRequest;

class UserController extends Controller
{
    public function changeEmail(ChangeEmailRequest $request)
    {
        dd('test');
    }
}
