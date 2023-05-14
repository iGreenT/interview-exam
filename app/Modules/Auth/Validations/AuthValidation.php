<?php

 namespace App\Modules\Auth\Validations;

use App\Validations\ValidationException as ValidationsValidationException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

 class AuthValidation
 {    
    public function login(Request $request)
    {
        $rules = [
            'email'     => 'required|exists:users,email',
            'password'  => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            throw new ValidationsValidationException('wrong entered fields', $validator->errors());
        }

        return $validator->validated();
    }
 }