<?php

namespace App\Modules\Auth\Exceptions;

use Exception;
use Illuminate\Http\Response;

class IncorrectPasswordException extends Exception
{
    /**
     * Create a new authorization exception instance.
     *
     * @param  string|null    $message
     * @param  mixed          $code
     * @return void
     */
    public function __construct($message = null, $code = null) {
        $code = $code ?? Response::HTTP_UNAUTHORIZED;
        $message = $message ?? 'Incorrect Password.';

        parent::__construct($message, $code);
    }
}