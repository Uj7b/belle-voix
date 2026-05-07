<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\student_payments;
use App\Models\StudentPayment;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $students = Student::all();

    if ($students->isEmpty()) return;

    $startDate = now()->startOfYear();

    foreach ($students as $student) {

        $paymentDay = ($student->id % 25) + 1;

        for ($i = 0; $i < 6; $i++) {

            $dueDate = (clone $startDate)
                ->addMonths($i)
                ->day($paymentDay);

            // deterministic behavior per student + month
            $seed = ($student->id * 10) + $i;

            $statusRoll = $seed % 10;

            $paidAt = null;

            // 70% paid
            if ($statusRoll < 7) {

                // 50% on time, 50% late
                $lateDays = ($seed % 6);

                $paidAt = (clone $dueDate)->addDays($lateDays);
            }

            StudentPayment::updateOrCreate(
                [
                    'student_id' => $student->id,
                    'due_date'   => $dueDate->toDateString(),
                ],
                [
                    'amount'  => 500,
                    'paid_at' => $paidAt,
                ]
            );
        }
    }
}
}
