<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class EmailConfirmationHttpRequest extends FormRequest
{
    public function rules()
    {
        return [
            'token' => 'required|string|exists:email_verification',
        ];
    }

    public function messages()
    {
        return [
            __('token.exists') => 'Current token is wrong or already expired',
            __('token.required') => 'Token can not be empty',
        ];
    }
}
