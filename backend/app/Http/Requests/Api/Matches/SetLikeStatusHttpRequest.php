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
        ];
    }
}
