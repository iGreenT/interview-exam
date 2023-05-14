<?php

namespace App\Modules\Auth\Repos;

use App\Modules\Auth\Models\User;
use App\Repos\RepoCRUD;

class UserRepo
{    
    use RepoCRUD;

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
}