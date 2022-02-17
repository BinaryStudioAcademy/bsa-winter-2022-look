<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class UploadUserImageHttpRequest extends FormRequest
{
    public function rules()
    {
        return [
            'image' => 'required|image',
            'media_type' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Image not found',
            'image.image' => 'Current file is not image',
            'media_type.required' => 'media_type field can not be empty'
        ];
    }
}
