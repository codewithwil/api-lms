<?php

namespace App\Http\Controllers\API\Auth;

use App\{
    Http\Controllers\BaseC,
    Services\Auth\AuthService
};

use Illuminate\{
    Http\Request
};

class AuthC extends BaseC
{
    public function __construct(protected AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(Request $request)
    {
        $validated = $this->validateRequest($request, [
            'email'          => 'required|email|unique:users,email',
            'password'       => 'required|min:6|confirmed',
            'name'           => 'required|string|max:75',
            'phone'          => 'required|string|max:20',
            'address'        => 'required|string',
            'dateBirth'      => 'required|date',
            'addressBirth'   => 'required|string|max:50',
            'religion'       => 'required|numeric|in:1,2,3,4,5,6',
            'sex'            => 'required|numeric|in:1,2',
            'guardian_name'  => 'required|string|max:50',
            'entry_year'     => 'required|date_format:Y',
        ]);

        $user = $this->authService->register($validated);

        return $this->success([
            'user_id' => $user->id,
            'email'   => $user->email,
        ], 'Registrasi berhasil');
    }


    public function login(Request $request)
    {
        $credentials = $this->validateRequest($request, [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $response = $this->authService->login($credentials);

        return $this->success([
            'access_token' => $response['access_token'] ?? null,
            'token_type'   => $response['token_type'] ?? null,
        ], $response['message'], $response['status']);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return $this->success([], 'Logout successful');
    }
}
