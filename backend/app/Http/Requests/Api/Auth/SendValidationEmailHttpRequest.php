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
            'email.required' => 'Email field can not be empty',
            'email.email' => 'Email is not valid',
            'email.exists' => 'User with current email is not found',
        ];
    }
}
