<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
 * Maneja excepciones de autenticación y devuelve una respuesta JSON.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \Illuminate\Auth\AuthenticationException  $exception
 * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
 */
protected function unauthenticated($request, AuthenticationException $exception)
{
    // Verificamos si la solicitud espera una respuesta en formato JSON
    if ($request->expectsJson()) {
        // Retorna un mensaje claro cuando el token es inválido o no está presente
        return response()->json([
            'error' => 'Acceso denegado. El token de autenticación es inválido o no fue enviado.'
        ], 401);
    }

    // Si no se espera JSON, retornamos un mensaje por defecto
    return response()->json([
        'error' => 'Acceso denegado. No se ha configurado una ruta de inicio de sesión.'
    ], 401);
}
}
