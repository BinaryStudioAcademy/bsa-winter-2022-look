<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class UserInterest extends Model
{
    use HasFactory;

    protected $table = 'user_interests';
}
