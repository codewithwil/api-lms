<?php

namespace App\Repositories\Eloquent\Auth;

use App\{
    Models\User,
    Repositories\Contracts\Auth\AuthRepositoryInterface,
    Repositories\BaseRepo
};
use App\Traits\DbTransaction;
use Illuminate\{
    Support\Facades\Auth,
    Support\Facades\Hash,
    Support\Str
};
use Illuminate\Support\Facades\DB;

class AuthRepository extends BaseRepo implements AuthRepositoryInterface
{
    use DbTransaction;

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

   public function register(array $data): User
    {
        return $this->runInTransaction(function () use ($data) {
            $user = $this->model::create([
                'email'    => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            $studentId = 'STD' . now()->format('ymdHis'); 

            DB::table('students')->insert([
                'studentId'     => $studentId,
                'name'          => $data['name'],
                'phone'         => $data['phone'],
                'address'       => $data['address'],
                'dateBirth'     => $data['dateBirth'],
                'addressBirth'  => $data['addressBirth'],
                'religion'      => $data['religion'],
                'sex'           => $data['sex'],
                'guardian_name' => $data['guardian_name'],
                'entry_year'    => $data['entry_year'],
                'status'        => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);

            DB::table('user_references')->insert([
                'usReffId'   => 'URF' . now()->format('His') . rand(100, 999),
                'userUUID'   => (string) Str::uuid(),
                'user_id'    => $user->id,
                'ref_type'   => 'student',
                'ref_id'     => $studentId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return $user;
        });
    }

    public function attemptLogin(array $credentials): bool
    {
        return Auth::attempt($credentials);
    }

    public function getAuthenticatedUser(): ?User
    {
        return Auth::user();
    }
}
