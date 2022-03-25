<?php

declare(strict_types=1);

namespace App\Exceptions\Auth;

use App\Exceptions\BaseException;
use Throwable;

class CantLoginException extends BaseException
{
    public function __construct($message = 'Invalid email or password', $code = 403, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
