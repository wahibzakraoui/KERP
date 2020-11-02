<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use \Spatie\Permission\Exceptions\UnauthorizedException;
use \Spatie\Permission\Exceptions\PermissionDoesNotExist;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Database\Eloquent\ModelNotFoundException::class
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
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (NotFoundHttpException $e, $request) {
            return response()->json(['message' => 'Object Not found.'], 404);
        });
        $this->renderable(function (ModelNotFoundException $e, $request) {
            return response()->json(['message' => 'Model Not found.'], 404);
        });
        $this->renderable(function (UnauthorizedException $e, $request) {
            return response()->json(['message' => 'Unauthorized.'], 403);
        });
        $this->renderable(function (PermissionDoesNotExist $e, $request) {
            return response()->json(['message' => 'Unauthorized. The requested Permission must first be assigned by an admin.'], 403);
        });
    }

}
