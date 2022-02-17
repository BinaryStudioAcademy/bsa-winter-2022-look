<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class UserParameter extends Model
{
    use HasFactory;

    protected $table = 'user_parameters';

    protected $fillable= [
        'user_id',
        'parameter_key'
    ];
}
