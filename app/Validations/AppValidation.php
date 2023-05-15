<?php

namespace App\Validations;

use App\Exceptions\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Appvalidation
{
    public function validate(Request $request, array $rules)
    {
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            throw new ValidationException('wrong entered fields', $validator->errors());
        }

        return $validator->validated();
    }
}