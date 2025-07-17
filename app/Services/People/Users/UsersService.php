<?php

namespace App\Services\People\Users;

use App\{
    Repositories\Contracts\People\Users\UsersRepositoryInterface,
    Traits\ApiResponse
};

class UsersService
{
    use ApiResponse;

    public function __construct(protected UsersRepositoryInterface $userRepository) {}

    public function getAllUsers()
    {
        return $this->userRepository->getAllUsers();
    }

}
