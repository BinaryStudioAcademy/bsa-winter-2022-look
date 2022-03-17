<?php

namespace App\Exceptions;

use App\Exceptions\Auth\EmailVerificationRequiredException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Nette\Schema\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontReport = [

    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register()
    {
        $this->reportable(function (Throwable $e) {
            if (app()->bound('sentry')) {
                app('sentry')->captureException($e);
            }
        });
    }

    protected function invalidJson($request, ValidationException|\Illuminate\Validation\ValidationException $exception)
    {
        return response()->json(['errors' => [$exception->errors()]], $exception->status);
    }

    public function render($request, \Throwable $e)
    {
        if ($e instanceof EmailVerificationRequiredException) {
            return response()->json(['errors' => [['email' => $e->getMessage()]]], $e->getCode());
        }

        return parent::render($request, $e);
    }
}
