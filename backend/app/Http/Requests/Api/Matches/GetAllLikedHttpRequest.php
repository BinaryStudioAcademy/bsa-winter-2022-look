<?php

namespace App\Http\Requests\Api\Matches;

use Illuminate\Foundation\Http\FormRequest;

class GetAllLikedHttpRequest extends FormRequest
{
    public function rules()
    {
        return [
            'status' => 'bool|nullable',
        ];
    }
}
