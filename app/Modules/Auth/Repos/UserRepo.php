<?php

namespace App\Modules\Auth\Repos;

use App\Modules\Auth\Models\User;
use App\Repos\RepoCRUD;
use Illuminate\Support\Facades\Hash;

class UserRepo
{    
    use RepoCRUD;

    protected $model;

    /**
     * __construct
     *
     * @param  User $model
     * @return void
     */
    public function __construct(
        User $user
    ) {
        $this->model = $user;
    }
    
    /**
     * findByEmail
     *
     * @param  atring $email
     * @return User
     */
    public function findByEmail(string $email): User
    {
        return $this->model->where('email', $email)->first();
    }

    public function validatePassword(string $password, string $inputPassword): bool
    {
        if (Hash::check($inputPassword, $password)) {
            return true;
        }

        return false;
    }
}