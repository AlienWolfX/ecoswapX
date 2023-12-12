<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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

    public function render($request, Throwable $exception)
    {
        if ($this->isHttpException($exception)) {
            return $this->renderHttpException($exception);
        }

        if (config('app.env') === 'production') {
            return response()->view('errors.500', [], 500);
        }

        return parent::render($request, $exception);
    }

    public function report(Throwable $exception)
    {
        if ($this->shouldReport($exception)) {
            // Log the exception
            Log::error($exception);
        }

        parent::report($exception);
    }


}
