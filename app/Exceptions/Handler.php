<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

use Illuminate\Support\Facades\Route;
use \Log;

class Handler extends ExceptionHandler
{

    protected $dontReport = [
    ];

    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    public function render($request, Exception $exception)
    {

        if (config('app.debug')) {
            
            return parent::render($request, $exception);
        }

        $cod_error = rand(123123,1231231231231);

        $fullUrl = \Request::fullUrl();

        //Log::channel('erros_com_codigo')->error($cod_error . PHP_EOL . $fullUrl . PHP_EOL);

        Log::channel('erros_com_codigo')->error($cod_error . PHP_EOL . $fullUrl . PHP_EOL . $exception->getMessage() . PHP_EOL . $exception->getTraceAsString() . PHP_EOL . '---------------------------------' . PHP_EOL);
        \Session::flash('warning', "Erro no servidor. Cod. " . $cod_error); 


        if($this->isHttpException($exception)) {

            $code = $exception->getStatusCode();

            switch ($code) {

                case 403:
                    return Route::respondWithRoute('sys_error_403');
                    break;

                case 404:
                    return Route::respondWithRoute('sys_error_404');
                    break;

                case 500:
                    return Route::respondWithRoute('sys_error_500');
                    break;

                default:
                    return Route::respondWithRoute('sys_error_default');
                    break;
            }
        }

        if ($exception instanceof HttpResponseException) {

            return Route::respondWithRoute('sys_error_500');

        } elseif ($exception instanceof NotFoundHttpException) {

            return Route::respondWithRoute('sys_error_404');

        } elseif ($exception instanceof ModelNotFoundException) {

            return Route::respondWithRoute('sys_error_500');

        } elseif ($exception instanceof AuthenticationException) {

            //return Route::respondWithRoute('sys_error_500');

    //     if ($request->expectsJson()) {
    //         return response()->json(['error' => 'Unauthenticated.'], 401);
    //     }

            return $this->unauthenticated($request, $exception);

        } elseif ($exception instanceof AuthorizationException) {

            return Route::respondWithRoute('sys_error_403');

        // } elseif ($exception instanceof ValidationException && $exception->getResponse()) {

        //     echo 'ValidationException<hr>'; dd($exception);
        //     return $exception->getResponse();

        } elseif ($exception instanceof AccessDeniedHttpException && $exception->getResponse()) {

            return Route::respondWithRoute('sys_error_403');
        }

        return Route::respondWithRoute('sys_error_default');

    }

}
