<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Malhal\Geographical\Geographical;

class UserLocation extends Model
{
    use HasFactory;
    use Geographical;

    protected $table = 'user_location';

    public $timestamps = false;

    protected static $kilometers = true;

    protected $fillable = [
        'user_id',
    ];
}
