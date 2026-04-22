<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. CREATE CLASSES FIRST (no teacher yet)
        $classes = SchoolClass::factory(10)->create();

        // 2. CREATE TEACHER USERS
        $teacherUsers = User::factory(40)->create([
            'role' => 'teacher'
        ]);

        // 3. CREATE TEACHER PROFILES
        $teacherProfiles = $teacherUsers->map(function ($user) {
            return Teacher::create([
                'user_id' => $user->id,
                'status' => fake()->randomElement(['active', 'inactive']),
            ]);
        });

        // 4. ASSIGN TEACHERS TO CLASSES (NO DUPLICATES)
        $teacherProfiles = $teacherProfiles->shuffle();

        foreach ($classes as $index => $class) {
            $class->update([
                'teacher_id' => $teacherProfiles[$index]->id,
            ]);
        }

        // 5. CREATE STUDENT USERS
        $studentUsers = User::factory(160)->create([
            'role' => 'student'
        ]);

        // 6. CREATE STUDENT PROFILES + ASSIGN CLASS
        foreach ($studentUsers as $user) {
            Student::create([
                'user_id' => $user->id,
                'class_id' => $classes->random()->id,
                'status' => fake()->randomElement([
                    'active',
                    'inactive',
                    'withdrawn'
                ]),
            ]);
        }
    }
}