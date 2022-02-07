<?php

namespace App\Http\Controllers\Api\Auth;

use App\Actions\Auth\ForgotPasswordAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\ForgotPasswordRequest;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function index(ForgotPasswordRequest $request, ForgotPasswordAction $action)
    {
        $response = $action->execute($request->get('email'));

        return view('forgot');
    }
}
