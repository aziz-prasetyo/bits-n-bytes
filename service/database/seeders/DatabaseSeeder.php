<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::firstOrCreate([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            StatusSeeder::class,
        ]);

        // $this->call([
        //     SectionSeeder::class,
        // ]);

    }
}
