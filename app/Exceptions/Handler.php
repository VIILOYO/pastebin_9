<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
    public function render($request, Throwable $e)
    {
        if (!$request->expectsJson()) {
            return parent::render($request, $e);
        }

        if ($e instanceof ModelNotFoundException) {
            $e = new NotFoundException(
                $e->getMessage(),
                $e->getCode(),
                $e
            );

            return new JsonResponse(
                $this->convertExceptionToArray($e),
                404,
                $this->isHttpException($e) ? $e->getHeaders() : [],
                JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES
            );
        }

        if ($e instanceof AuthException) {
            return \response(["message" => $e->getMessage()], $e->getCode());
        } else if ($e instanceof BanException) {
            return \response(["message" => $e->getMessage()], $e->getCode());
        } else if ($e instanceof ValidationException) {
            $messages = collect($e->errors())->flatten();
            return \response([
                "message" => $messages->implode("<br />"),
                "messages" => $messages,
                "errors" => $e->errors()
            ], 422);
        }
        $code = $e->getCode();

        $render = parent::render($request, $e);

        return $code >= 100 && $code < 600 ? $render->setStatusCode($code) : $render;
    }
}
