<?php

namespace App\Http\Controllers\API\People\Users;

use App\{
    Http\Controllers\BaseC,
    Services\People\Users\UsersService
};

use Illuminate\Http\Request;

class UsersC extends BaseC
{
    public function __construct(protected UsersService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();

        $data = $users->map(function ($user) {
            return [
                'id' => $user->id,
                'email' => $user->email,
                'name' => $user->name, 
                'email_verified_at' => $user->email_verified_at,
                'last_login_ip' => $user->last_login_ip,
                'last_login_device' => $user->last_login_device,
                'last_active_at' => $user->last_active_at,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ];
        });

        return response()->json([
            'status' => 200,
            'message' => 'Seluruh User Berhasil Didapatkan',
            'data' => $data
        ]);
    }

}
