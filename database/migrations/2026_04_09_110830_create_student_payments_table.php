<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    Schema::create('student_payments', function (Blueprint $table) {
        $table->id();

        $table->foreignId('student_id')
            ->constrained("students")
            ->cascadeOnDelete();

        $table->date('due_date');   // when student should pay
        $table->date('paid_at')->nullable(); // when actually paid

        $table->decimal('amount', 10, 2)->default(500);

        $table->unique(['student_id', 'due_date']);

        $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_payments');
    }
};
