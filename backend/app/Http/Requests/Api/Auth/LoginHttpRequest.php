<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\ApiFormRequest;

final class LoginHttpRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email|exists:users',
            'password' => 'required|min:8|string',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email field can not be empty',
            'email.email' => 'Email is not valid',
            'email.exists' => 'User with such email not found',
        ];
    }
}
