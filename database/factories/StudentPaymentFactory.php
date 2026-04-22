<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class StudentPaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // 👉 Pick a random month within the last 6 months
        // Always normalized to start of month (important for your unique constraint)
        $month = Carbon::now()
            ->subMonths(rand(0, 5))
            ->startOfMonth();

        // 👉 Randomly decide if this payment is paid or not
        $isPaid = fake()->boolean(70); // 70% chance paid

        return [
            // 👉 Attach to a student (must exist)
            'student_id' => Student::inRandomOrder()->first()?->id 
                ?? Student::factory(),

            // 👉 Fixed billing month (e.g. 2026-04-01)
            'month' => $month,

            // 👉 Whether student paid for this month
            'is_paid' => $isPaid,

            // ⚠️ You chose NOT to use paid_at
            // So created_at will act as "payment time" implicitly
            // (only meaningful when is_paid = true)

            // 👉 Optional: control timestamps manually
            'created_at' => $isPaid
                ? $month->copy()->addDays(rand(0, 10)) // paid within first 10 days
                : now(), // unpaid = just record exists

            'updated_at' => now(),
        ];
    }
}
