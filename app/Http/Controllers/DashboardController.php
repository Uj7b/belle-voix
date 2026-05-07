<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\StudentPayment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $classes = SchoolClass::all();
    $studentCount = 2;
    $students = Student::select('id', 'user_id', 'class_id')
    ->with([
        'user:id,fullname,cin,email',
        'schoolClass:id,name'
    ])
    ->get();

    $payments = StudentPayment::with('student.user','student.schoolClass')
    ->whereIn('id', function ($query) {
        $query->selectRaw('id')
            ->from('student_payments as sp1')
            ->whereRaw('sp1.due_date = (
                SELECT MAX(sp2.due_date)
                FROM student_payments sp2
                WHERE sp2.student_id = sp1.student_id
            )');
    })
    ->get();

    return view("dashboard", compact(
        "classes",
        "studentCount",
        "students",
        "payments"
    ));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
