<?php

namespace App\Services\Auth;

use App\{
    Repositories\Contracts\Auth\AuthRepositoryInterface,
    Traits\ApiResponse,
    Models\User
};
use Carbon\{
    Carbon
};

class AuthService
{
    use ApiResponse;

    public function __construct(protected AuthRepositoryInterface $authRepository) {}

    public function register(array $data): User{
        return $this->authRepository->register($data);
    }

    public function login(array $credentials): array
    {
        if (! $this->authRepository->attemptLogin($credentials)) {
            return $this->errorResponse('Unauthorized', 401);
        }

        $user  = $this->authRepository->getAuthenticatedUser();

        if (! $user->userReference) {
            return $this->errorResponse('Tidak menemukan akun, Coba lagi!', 403);
        }

         $user->update([
            'last_login_ip'     => request()->ip(),
            'last_login_device' => request()->header('User-Agent'),
            'last_active_at'    => Carbon::now(),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return $this->successResponse([
            'access_token' => $token,
            'token_type'   => 'Bearer',
        ], 'Login successful');
    }
}
