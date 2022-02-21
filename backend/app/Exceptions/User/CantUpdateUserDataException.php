<?php

declare(strict_types=1);

namespace App\Exceptions\User;

use App\Exceptions\BaseException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

final class CantUpdateUserDataException extends BaseException
{
    public function __construct($message = 'Error while update user info', $code = Response::HTTP_NOT_FOUND, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
