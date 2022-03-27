<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserParameterNew extends Model
{
    use HasFactory;

    protected $table = 'user_parameters_new';

    protected $casts = [
        'interests' => 'array',
        'hobbies' => 'array',
    ];

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'gender',
        'gender_preferences',
        'location',
        'height',
        'weight',
        'age',
        'interests',
        'hobbies',
        'about',
        'instagram',
        'facebook',
        'other',
    ];
}
