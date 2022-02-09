<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class PasswordChangeRequest extends FormRequest
{
    public function rules()
    {
        return [
            "email" => 'required|email',
            "password" => 'required|min:8|string|confirmed',
            "token" => 'required|string'
        ];
    }
}
