<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class UploadUserFileHttpRequest extends FormRequest
{
    public function rules()
    {
        return [
            'files' => 'required',
            'files.*' => 'mimetypes:image/bmp,image/png,image/jpeg,video/mp4,video/mpeg,video/x-msvideo',
        ];
    }

    public function messages()
    {
        return [
            'files.required' => 'Files not found',
        ];
    }
}
