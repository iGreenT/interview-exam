<?php

namespace App\Modules\Auth\Controllers;

use App\Modules\Auth\Repos\UserRepo;
use App\Modules\Auth\Services\AuthService;
use App\Modules\Auth\Validations\AuthValidation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{    
    protected $userRepo;
    protected $authValidation;
    protected $authService;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        UserRepo $userRepo,
        AuthValidation $authValidation,
        AuthService $authService
    ) {
        $this->userRepo = $userRepo;
        $this->authValidation = $authValidation;
        $this->authService = $authService;
    }

    public function login(Request $request)
    {
        $data = $this->authValidation->login($request);
        $token = $this->authService->login($data);

        return $token;
    }
}