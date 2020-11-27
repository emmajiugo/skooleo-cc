<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\ErrorHandler\Exception\FlattenException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        // if (!env("APP_DEBUG")) {
        //     $exception = FlattenException::create($e);
        //     $statusCode = $exception->getStatusCode($exception);

        //     if ($statusCode === 404 or $statusCode === 500) {
        //         return response()->view('errors.500', ["statusCode"=>$statusCode], $statusCode);
        //     }
        // }

        return parent::render($request, $e);
    }
}
