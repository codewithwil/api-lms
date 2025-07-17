<?php

namespace App\Providers;

use App\{
    Repositories\Contracts\Auth\AuthRepositoryInterface,
    Repositories\Eloquent\Auth\AuthRepository,
    Repositories\Contracts\People\Users\UsersRepositoryInterface,
    Repositories\Eloquent\People\Users\UsersRepository,
    Repositories\Contracts\Management\School\SchoolRepositoryInterface,
    Repositories\Eloquent\Management\School\SchoolRepository
};

use Illuminate\{
    Support\ServiceProvider
};

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
         $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
         $this->app->bind(UsersRepositoryInterface::class, UsersRepository::class);
         $this->app->bind(SchoolRepositoryInterface::class, SchoolRepository::class);
    }

    public function boot(): void
    {

    }
}
