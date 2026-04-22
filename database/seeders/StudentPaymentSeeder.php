<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\student_payments;
use App\Models\StudentPayment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::all()->each(function ($student) {
            foreach (range(0, 5) as $i) {
                StudentPayment::factory()->create([
                'student_id' => $student->id,
                'month' => now()->subMonths($i)->startOfMonth(),
                ]);
            }
        });
    }
}
