<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Arya Bagus Farrazan',
                'email' => 'arya.guru@bitsnbytes.id',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 2,
            ],
            [
                'name' => 'Muhamad Aziz Prasetyo',
                'email' => 'aziz.guru@bitsnbytes.id',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 2,
            ],
            [
                'name' => 'Nathanael Christian Albertus',
                'email' => 'nael.guru@bitsnbytes.id',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 2,
            ],
            [
                'name' => 'Silva Tulhasanah',
                'email' => 'silva.guru@bitsnbytes.id',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 2,
            ],
        ]);
    }
}
