<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'teacher_id',
        'status',
    ];
    public function students() {
        return $this->hasMany(Student::class,'class_id');
    }
    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }
}
