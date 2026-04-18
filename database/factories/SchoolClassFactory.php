<?php

namespace Database\Factories;

use App\Models\SchoolClass;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SchoolClass>
 */
class SchoolClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'name' => fake()->randomElement(range('A', 'Z')) . rand(1, 12),
        'teacher_id' => null,
        'status' => fake()->randomElement(['pending', 'teaching']),
        ];
    }
}
