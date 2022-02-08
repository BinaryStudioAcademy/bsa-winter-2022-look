<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class PasswordChangeRequest extends FormRequest
{
    public function rules()
    {
        return [
            "email" => 'required|email',
            "password" => 'required',
            "token" => 'required'
        ];
    }
}
