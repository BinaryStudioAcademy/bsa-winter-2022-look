<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UploadRegisterFileHttpRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required|int',
            'files' => 'required|array|max:50',
            'files.*' => 'max:100000|mimetypes:image/bmp,image/png,image/jpeg,video/mp4,video/mpeg,video/x-msvideo',
        ];
    }

    public function messages()
    {
        return [
            'files.required' => 'Files not found',
            'files.max' => 'You can not upload more them 50 files at once',
            'files.*.max' => 'File size can\'t be more then 100 mb',
        ];
    }
}
