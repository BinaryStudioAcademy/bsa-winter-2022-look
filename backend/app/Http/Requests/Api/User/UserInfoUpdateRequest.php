<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class UserInfoUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            "name" => "required|min:3",
            "email" => "required|email",
            "password" => "required|min:8",
            "repeat_password" => "required|min:8"
        ];
    }
}
