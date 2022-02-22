<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class ChangeUserParameterHttpRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'string|required|min:3',
            'looking' => 'string|required',
            'gender' => 'string|required',
            'age' => 'int|required|min:18',
            'weight' => 'int|required',
            'height' => 'int|required',
            'bio' => 'string',
            'phone' => 'required|regex:/^\s*(?:\+?(\d{1,3}))?([-. (]*(\d{3})[-. )]*)?((\d{3})[-. ]*(\d{2,4})(?:[-.x ]*(\d+))?)\s*$/',
            'locations' => 'required|array|min:1',
            'locations.*' => 'required|string|distinct|min:3',
            'interests' => 'required|array|min:1',
            'interests.*' => 'required|string|distinct|min:3',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name field can not be empty',
            'looking.required' => 'Looking field can not be empty',
            'gender.required' => 'Gender field can not be empty',
            'age.required' => 'Age field can not be empty',
            'age.int' => 'Age field must be a number',
            'age.min' => 'You must be older then 18 years',
            'weight.required' => 'Weight field can not be empty',
            'weight.int' => 'Weight field must contain only a numbers',
            'height.required' => 'Height field can not be empty',
            'height.int' => 'Height field must contain only a numbers',
            'phone.required' => 'Phone field can not be empty',
            'phone.regex' => 'Phone number style is wrong',
            'locations.required' => 'Location field can not be empty',
            'locations.min' => 'At least one location must be specified',
            'interests.required' => 'Interests field can not be empty',
            'Interests.min' => 'Please chose at least one interest',
        ];
    }
}
