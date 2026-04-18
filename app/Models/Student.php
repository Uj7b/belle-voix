<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SchoolClass;
use App\Models\User;
use App\Models\Teacher;
class Student extends Model
{
    protected $fillable = [
    'user_id',
    'class_id',
    'gender',
    'date_of_birth',
    'status',
];
    use HasFactory;
    public function user() {
        return $this->belongsTo(User::class);
    }
    // public function teacher() {
    //     return $this->belongsTo(Teacher::class);
    // }
    public function schoolClass() {
        return $this->belongsTo(SchoolClass::class,'class_id');
    } 
}
