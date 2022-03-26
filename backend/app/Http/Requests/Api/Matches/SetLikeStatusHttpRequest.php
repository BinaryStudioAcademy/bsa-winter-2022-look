<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\Matches;

use Illuminate\Foundation\Http\FormRequest;

class SetLikeStatusHttpRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required|exists:users',
            'status' => 'required|string|in:like,dislike',
            'location' => 'string|nullable',
            'min_age' => 'int|min:18|max:100|nullable',
            'max_age' => 'int|min:18|max:100|nullable',
        ];
    }
}
