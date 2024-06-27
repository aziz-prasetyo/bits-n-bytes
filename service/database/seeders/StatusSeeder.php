<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::updateOrCreate(
            ['id' => 1],
            ['status_name' => 'Published', 'created_at' => now(), 'updated_at' => now()]
        );

        Status::updateOrCreate(
            ['id' => 2],
            ['status_name' => 'Draft', 'created_at' => now(), 'updated_at' => now()]
        );
    }
}
