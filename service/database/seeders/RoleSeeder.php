<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'role_id' => 1,
                'role_name' => 'Administrator',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_id' => 2,
                'role_name' => 'Guru',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_id' => 3,
                'role_name' => 'Student',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
