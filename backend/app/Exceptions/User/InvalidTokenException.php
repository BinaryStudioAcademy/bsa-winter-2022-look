<?php

declare(strict_types=1);

namespace App\Exceptions\User;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;

final class InvalidTokenException extends ModelNotFoundException
{
    public function __construct($message = "Invalid or expired token for password reset", $code = 404, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
