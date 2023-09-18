<?php

namespace App\Exceptions;

use Guanguans\LaravelExceptionNotify\Facades\ExceptionNotify;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Jiannei\Response\Laravel\Support\Traits\ExceptionTrait;
use Throwable;

class Handler extends ExceptionHandler
{
    use ExceptionTrait;

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            ExceptionNotify::onChannel()->report($e);
        });
    }

    public function report(Throwable $e)
    {
        parent::report($e);
    }

    public function render($request, Throwable $e)
    {
        if ($e instanceof ValidationException) {
            return $this->invalidJson($request, $e);
        } elseif ($e instanceof AuthenticationException) {
            return $this->unauthenticated($request, $e);
        }

        return $this->prepareJsonResponse($request, $e);
    }
}
