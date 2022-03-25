<?php

declare(strict_types=1);

namespace App\Exceptions\User;

use App\Exceptions\BaseException;
use Throwable;

final class CantUploadUserFileException extends BaseException
{
    public function __construct($message = 'Can\'t upload file, try again later', $code = 404, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
