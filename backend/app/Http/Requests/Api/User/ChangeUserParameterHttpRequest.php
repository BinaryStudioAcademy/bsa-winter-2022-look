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
            __('name.required') => 'Name field can not be empty',
            __('looking.required') => 'Looking field can not be empty',
            __('gender.required') => 'Gender field can not be empty',
            __('age.required') => 'Age field can not be empty',
            __('age.int') => 'Age field must be a number',
            __('age.min') => 'You must be older then 18 years',
            __('weight.required') => 'Weight field can not be empty',
            __('weight.int') => 'Weight field must contain only a numbers',
            __('height.required') => 'Height field can not be empty',
            __('height.int') => 'Height field must contain only a numbers',
            __('phone.required') => 'Phone field can not be empty',
            __('phone.regex') => 'Phone number style is wrong',
            __('locations.required') => 'Location field can not be empty',
            __('locations.min') => 'At least one location must be specified',
            __('interests.required') => 'Interests field can not be empty',
            __('Interests.min') => 'Please chose at least one interest',
        ];
    }
}
