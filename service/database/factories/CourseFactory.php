<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_name' => $this->faker->sentence,
            'course_description' => $this->faker->paragraph,
            'course_price' => $this->faker->numberBetween(50, 500),
            'status_id' => $this->faker->randomElement([1, 2]),
        ];
    }
}
