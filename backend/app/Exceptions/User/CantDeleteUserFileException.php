<?php

declare(strict_types=1);

namespace App\Exceptions\User;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;

final class CantDeleteUserFileException extends ModelNotFoundException
{
    public function __construct($message = 'Can\'t delete file', $code = 404, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
