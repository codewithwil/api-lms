<?php

namespace Database\Seeders\assets;

use Illuminate\{
    Database\Seeder,
    Support\Facades\DB,
    Support\Facades\Hash,
    Support\Str,
};

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // === 1. Insert Owner ===
        DB::table('owners')->insert([
            'ownerId'    => 'OWN000001',
            'name'       => 'Admin Velocitron',
            'phone'      => '081234567890',
            'address'    => 'Jakarta',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // === 2. Insert Teacher ===
        DB::table('teachers')->insert([
            'teacherId'     => 'TCH000001',
            'name'          => 'Budi Guru',
            'nip'           => '1987654321',
            'type'          => 1,
            'phone'         => '081298761111',
            'address'       => 'Bandung',
            'dateBirth'     => '1990-04-01',
            'addressBirth'  => 'Bandung',
            'religion'      => 1,
            'sex'           => 1,
            'dateEmp'       => '2020-01-10',
            'teacherStatus' => 1,
            'status'        => 1,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        // === 3. Insert Student ===
        DB::table('students')->insert([
            'studentId'    => 'STD000001',
            'name'         => 'Ani Siswa',
            'phone'        => '081222233344',
            'address'      => 'Surabaya',
            'dateBirth'    => '2008-06-15',
            'addressBirth' => 'Surabaya',
            'religion'     => 1,
            'sex'          => 2,
            'guardian_name'=> 'Pak Joko',
            'entry_year'   => '2023',
            'status'       => 1,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        // === 4. Insert Users ===
        $users = [
            [
                'email'         => 'owner@gmail.com',
                'password'      => Hash::make('123456'),
                'userUUID'      => Str::uuid(),
                'ref_type'      => 'App\Models\People\Owner\Owner',
                'ref_id'        => 'OWN000001',
            ],
            [
                'email'         => 'guru@gmail.com',
                'password'      => Hash::make('123456'),
                'userUUID'      => Str::uuid(),
                'ref_type'      => 'App\Models\People\Teacher\Teacher',
                'ref_id'        => 'TCH000001',
            ],
            [
                'email'         => 'siswa@gmail.com',
                'password'      => Hash::make('123456'),
                'userUUID'      => Str::uuid(),
                'ref_type'      => 'App\Models\People\Student\Student',
                'ref_id'        => 'STD000001',
            ],
        ];

        foreach ($users as $index => $u) {
            $userId = DB::table('users')->insertGetId([
                'email'         => $u['email'],
                'email_verified_at' => now(),
                'password'      => $u['password'],
                'remember_token'=> Str::random(10),
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);

            DB::table('user_references')->insert([
                'usReffId'  => 'USREF' . str_pad($index + 1, 6, '0', STR_PAD_LEFT),
                'userUUID'  => $u['userUUID'],
                'user_id'   => $userId,
                'ref_type'  => $u['ref_type'],
                'ref_id'    => $u['ref_id'],
                'created_at'=> now(),
                'updated_at'=> now(),
            ]);
        }
    }
}
