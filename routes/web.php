<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\Student;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard.index');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/students', [StudentController::class,'index'])->name('students.index');
Route::post('/students', [StudentController::class,'store'])->name('students.store');
Route::get('/teachers', [TeacherController::class,'index'])->name('teachers.index');
Route::get('/classes', function ()  {
    return "classes";
} )->name('classes.index');

Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
//? Public

//! Private
Route::middleware('auth')->group(function () {
    
});