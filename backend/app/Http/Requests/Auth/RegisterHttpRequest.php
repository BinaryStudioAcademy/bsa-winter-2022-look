<?php

declare(strict_types=1);

namespace App\Http\Requests\Auth;

use App\Http\Requests\ApiFormRequest;

final class RegisterHttpRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:users|between:5,50',
            'name' => 'required|string|between:3,100',
            'password' => 'required|min:8|string',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email field can not be empty',
            'email.unique' => 'Current email already used',
            'email.email' => 'Current email style is not valid',
            'name.required' => 'Name field can not be empty',
            'password.min' => 'Password can\'t be less then 8 characters',
            'password.required' => 'Password field can not be empty',
        ];
    }
}
