<?php

namespace App\Repositories\Contracts\Auth;

use App\{
    Models\User
};

interface AuthRepositoryInterface
{
    public function register(array $data): User;
    public function attemptLogin(array $credentials): bool;
    public function getAuthenticatedUser(): User|null;
}
