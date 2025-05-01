<?php

declare(strict_types=1);

namespace App\Exceptions;

use App\Exceptions\Department\DepartmentHasEmployeeException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->renderable(function (DepartmentHasEmployeeException $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], $exception->getCode());
        });
    }
}
