<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordHttpRequest extends FormRequest
{
    public function rules()
    {
        return [
            'password' => 'required|min:8'
        ];
    }
}
