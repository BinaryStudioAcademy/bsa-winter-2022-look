<?php


namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class ChangeMainInfoHttpRequest
{
    public function rules()
    {
        return [
            'name' => 'string|required|min:3',
            'looking' => 'string|required',
            'gender' => 'string|required',
            'age' => 'int|required|min:18',
            'weight' => 'int|required',
            'height' => 'int|required',
            'bio' => 'text'
        ];
    }
}
