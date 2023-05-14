<?php

namespace App\Modules\Auth\Services;

use App\Modules\Auth\Exceptions\IncorrectPasswordException;
use App\Modules\Auth\Models\User;
use App\Modules\Auth\Repos\UserRepo;
use Laravel\Sanctum\Sanctum;

class AuthService
{    
    protected $userRepo;

    /**
     * __construct
     *
     * @param  UserRepo $userRepo
     * @return void
     */
    public function __construct(
        UserRepo $userRepo
    ) {
        $this->userRepo = $userRepo;
    }

    /**
     * boot
     *
     * @return void
     */
    public function boot()
    {
        Sanctum::usePersonalAccessTokenModel(SanctumAccessTokenService::class);
    }
    
    /**
     * login
     *
     * @param  array $data
     * @return User
     */
    public function login(array $data): string
    {
        $user = $this->userRepo->findByEmail($data['email']);

        if (!$this->userRepo->validatePassword($user->password, $data['password'])) {
            throw new IncorrectPasswordException();
        }

        return $user->createToken($data['email'])->plainTextToken;
    }

}