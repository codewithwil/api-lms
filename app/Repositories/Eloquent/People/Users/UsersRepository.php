<?php

namespace App\Repositories\Eloquent\People\Users;

use App\{
    Repositories\BaseRepo,
    Repositories\Contracts\People\Users\UsersRepositoryInterface,
    Models\User
};

class UsersRepository extends BaseRepo implements UsersRepositoryInterface
{
    public function __construct(User $model){parent::__construct($model);}

    public function getAllUsers()
    {
        return User::with(['userReference.ref'])->get();
    }
}