<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPayment extends Model
{
    protected $fillable = [
    'student_id',
    'amount',
    'due_date',
    'paid_at',
    ];
    /** @use HasFactory<\Database\Factories\StudentPaymentFactory> */
    use HasFactory;
    public function student() {
        return $this->belongsTo(Student::class);
    }
}
