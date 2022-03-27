<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\Matches;

use Illuminate\Foundation\Http\FormRequest;

class GetAllUsersListHttpRequest extends FormRequest
{
    public function rules()
    {
        return [
            'location' => 'string|nullable',
            'min_age' => 'int|min:18|max:100|nullable',
            'max_age' => 'int|min:18|max:100|nullable',
        ];
    }

    public function messages()
    {
        return [
            'location.string' => 'Location is invalid',
            'min_age.int' => 'Field must be integer',
            'max_age.int' => 'Field must be integer',
            'max_age.min' => 'Age field cant be less then 18',
            'min_age.min' => 'Age field cant be less then 18',
            'min_age.max' => 'Age field cant be more then 100',
            'max_age.max' => 'Age field cant be more then 100',
        ];
    }
}
