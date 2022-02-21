<?php

declare(strict_types=1);

namespace App\Http\Requests\Auth;

use App\Http\Requests\ApiFormRequest;

final class RegisterHttpRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:users|max:50',
            'name' => 'required|string|between:2,100',
            'password' => 'required|min:8|string',
        ];
    }
}
