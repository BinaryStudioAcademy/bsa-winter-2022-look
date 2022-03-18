<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\ApiFormRequest;

final class LoginHttpRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            __('email') => 'required|email',
            __('password') => 'required|min:8|string',
        ];
    }
}
