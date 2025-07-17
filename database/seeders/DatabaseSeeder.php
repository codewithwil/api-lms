<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\{
    Seeders\assets\UserSeeder
};
use Illuminate\{
    Database\Seeder,
    Support\Facades\DB
};

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::beginTransaction();
        try {
            $this->call([
                UserSeeder::class,  
            ]);
                DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
        }
    }
}
