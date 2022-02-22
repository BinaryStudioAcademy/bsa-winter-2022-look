<?php

declare(strict_types=1);

namespace App\Exceptions\User;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;

final class CantSaveUserParameterException extends ModelNotFoundException
{
    public function __construct($message = 'Can not update user parameter', $code = 404, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
