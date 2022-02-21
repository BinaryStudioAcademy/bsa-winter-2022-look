<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class UploadUserFileHttpRequest extends FormRequest
{
    public function rules()
    {
        return [
            'file' => 'required|mimetypes:image/bmp,image/png,image/jpeg,video/mp4,video/mpeg,video/x-msvideo',
            'media_type' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'file.required' => 'File not found',
            'file.file' => 'Current file format is not supported',
            'media_type.required' => 'media_type field can not be empty',
        ];
    }
}
