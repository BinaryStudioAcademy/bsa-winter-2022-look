<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SendValidationEmailHttpRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email|exists:users',
        ];
    }

    public function messages()
    {
        return [
            __('email.required') => 'Email field can not be empty',
            __('email.email') => 'Email is not valid',
            __('email.exists') => 'User with current email is not found',
        ];
    }
}
