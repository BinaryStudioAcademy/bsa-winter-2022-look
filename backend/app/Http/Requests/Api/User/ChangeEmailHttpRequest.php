<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class ChangeEmailHttpRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'This email already used.',
        ];
    }
}
