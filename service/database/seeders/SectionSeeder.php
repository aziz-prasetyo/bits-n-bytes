<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create 5 courses
        $courses = Course::factory(5)->create();

        // Create sections for each course
        foreach ($courses as $course) {
            Section::factory(rand(1, 3))->create([
                'course_id' => $course->id,
            ]);
        }
    }
}
