<?php

namespace App\Exceptions;

use Exception;

class RecordNotFoundException extends Exception
{
    public function __construct($id, $model = null, $code = 422)
    {
        $message = "$model id $id not found.";

        if (empty($model)) {
            $message = "Record id $id not found.";
        }

        parent::__construct($message, $code);
    }
}