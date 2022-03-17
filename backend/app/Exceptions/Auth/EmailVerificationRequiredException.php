<?php

declare(strict_types=1);

namespace App\Exceptions\Auth;

use App\Exceptions\BaseException;
use Throwable;

class EmailVerificationRequiredException extends BaseException
{
    public function __construct($message = 'You need to verify your email first to be able to log in', $code = 403, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
