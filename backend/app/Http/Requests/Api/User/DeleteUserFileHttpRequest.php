<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class DeleteUserFileHttpRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required|int',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'File id required for delete file',
            'id.int' => 'File id must be int type',
        ];
    }
}
