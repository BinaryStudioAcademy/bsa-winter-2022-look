<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\Matches;

use Illuminate\Foundation\Http\FormRequest;

class GetAllUsersListHttpRequest extends FormRequest
{
    public function rules()
    {
        return [
            'range' => 'required|int|min:1',
            'min_age' => 'required|int|min:18|max:100',
            'max_age' => 'required|int|min:18|max:100',
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
            'range.required' => 'Range field required',
            'range.int' => 'Range field must be integer',
            'range.min' => 'Search range cant be less then 1 km',
        ];
    }
}
