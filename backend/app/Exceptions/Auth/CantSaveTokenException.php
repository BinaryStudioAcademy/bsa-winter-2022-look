<?php

declare(strict_types=1);

namespace App\Exceptions\Auth;

use App\Exceptions\BaseException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

final class CantSaveTokenException extends BaseException
{
    public function __construct($message = "Error while saving token in database", $code = Response::HTTP_NOT_FOUND, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
