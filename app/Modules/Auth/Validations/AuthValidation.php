<?php

namespace App\Modules\Auth\Validations;

use App\Exceptions\ValidationException;
use App\Validations\Appvalidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

 class AuthValidation extends Appvalidation
 {        
    /**
     * login
     *
     * @param  Request $request
     * @return array
     */
    public function login(Request $request): array
    {
        $rules = [
            'email'     => 'required|exists:users,email',
            'password'  => 'required',
        ];

        return $this->validate($request, $rules);
    }
 }