<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class PasswordChangeRequest extends FormRequest
{
    public function rules()
    {
        return [
            "password" => 'required|min:8|string|confirmed',
            "password_confirmation" => 'required|min:8|string',
            "token" => 'required|string'
        ];
    }
}
