<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentPaymentsController;
use App\Http\Controllers\TeacherController;

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard.index');

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Students
|--------------------------------------------------------------------------
*/

Route::get('/students', [StudentController::class, 'index'])
    ->name('students.index');

Route::post('/students', [StudentController::class, 'store'])
    ->name('students.store');

Route::get('/students/{id}', [StudentController::class, 'show'])
    ->name('students.show');

Route::put('/students/{id}', [StudentController::class, 'update'])
    ->name('students.update');

Route::delete('/students/{id}', [StudentController::class,'destroy'])
    ->name('students.destroy');
/*
|--------------------------------------------------------------------------
| Teachers
|--------------------------------------------------------------------------
*/

Route::get('/teachers', [TeacherController::class, 'index'])
    ->name('teachers.index');

Route::get('/teachers/{id}', [TeacherController::class, 'show'])
    ->name('teachers.show');

Route::post('/teachers', [TeacherController::class, 'store'])
    ->name('teachers.store');

Route::post('/teachers/{id}', [TeacherController::class, 'update'])
    ->name('teachers.update');

Route::delete('/teachers/{id}', [TeacherController::class, 'destroy'])
    ->name('teachers.destroy');

/*
|--------------------------------------------------------------------------
| Classes
|--------------------------------------------------------------------------
*/

Route::get('/classes', [SchoolClassController::class, 'index'])
    ->name('classes.index');

Route::post('/classes', [SchoolClassController::class, 'store'])
    ->name('classes.store');

Route::put('/classes/{id}', [SchoolClassController::class, 'update'])
    ->name('classes.update');

Route::delete('/classes/{id}', [SchoolClassController::class, 'destroy'])
    ->name('classes.destroy');

/*
|--------------------------------------------------------------------------
| Payments
|--------------------------------------------------------------------------
*/

Route::get('/payments', [StudentPaymentsController::class, 'index'])
    ->name('payments.index');

Route::post('/payments',[StudentPaymentsController::class,'store'])->name('payments.store');

/*
|--------------------------------------------------------------------------
| Attendances
|--------------------------------------------------------------------------
*/

Route::get('/attendances', function () {
    return "attendances";
})->name('attendances.index');

/*
|--------------------------------------------------------------------------
| Schedules
|--------------------------------------------------------------------------
*/

Route::get('/schedules',[ScheduleController::class,'index'])->name('schedules.index');

/*
|--------------------------------------------------------------------------
| Private (future use)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    //
});