<?php

namespace App\Exceptions;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof NotFoundHttpException) {
            return response()->view('errors.404', [], 404);
        }

        if ($exception instanceof HttpException && $exception->getStatusCode() == 500) {
            return response()->view('errors.500', [], 500);
        }

        // Default rendering for other exceptions
        return parent::render($request, $exception);
    }
}
