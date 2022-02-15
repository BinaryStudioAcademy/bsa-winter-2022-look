<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResets extends Model
{
    const UPDATED_AT = null;

    use HasFactory;

    protected $fillable = [
        'email',
        'token',
    ];
}
