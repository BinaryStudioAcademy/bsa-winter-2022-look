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
            __('email.required') => 'Email field can not be empty',
            __('email.unique') => 'Current email already used',
            __('email.email') => 'Current email style is not valid',
            __('name.required') => 'Name field can not be empty',
            __('password.min') => 'Password can\'t be less then 8 characters',
            __('password.required') => 'Password field can not be empty',
        ];
    }
}
