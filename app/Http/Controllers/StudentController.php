<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StudentController extends Controller
{   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with(['user','schoolClass.teacher.user'])->get();
        $studentCount = Student::all()->count();
        $classes = SchoolClass::with('teacher.user')->get();
        return view('students',compact('students','studentCount','classes'));
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
        //! create user first
        $user = User::create([
        'fullname' => $request->fullname,
        'email' => $request->email,
        'password' => bcrypt(Str::upper(Str::random(4)) . rand(1000, 9999)), // or generate
        'date_of_birth' => $request->date_of_birth,
        'gender' => $request->gender,
        'cin' => $request->cin,
        'role' => 'student',
        ]);
        //! create student
        Student::create([
        'user_id' => $user->id,
        'class_id' => $request->class_id,
        ]);
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         
        $student = Student::with('user', 'schoolClass.teacher')->findOrFail($id);

        return view('students.show', compact('student'));
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
