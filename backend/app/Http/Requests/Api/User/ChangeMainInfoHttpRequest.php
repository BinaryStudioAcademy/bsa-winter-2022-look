<?php


namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class ChangeMainInfoHttpRequest
{
    public function rules()
    {
        return [
            'name' => 'string|required|min:3',
            'bio' => 'text',
            'info' => 'array'
        ];
    }
}
