<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\Matches;

use Illuminate\Foundation\Http\FormRequest;

class GetAllMatchesHttpRequest extends FormRequest
{
    public function rules()
    {
        return [
            'status' => 'bool|nullable',
        ];
    }
}
