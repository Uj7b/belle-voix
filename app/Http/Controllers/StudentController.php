<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\StudentPayment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    /**
     * List students
     */
    public function index()
    {
        return view('students', [
            'students'      => Student::with(['user', 'schoolClass.teacher.user'])->orderBy('id','desc')->get(),
            'studentCount'  => Student::count('id'),
            'classes'       => SchoolClass::with('teacher.user')->get(),
        ]);
    }

    /**
     * Store student (atomic)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fullname'       => 'required|string|max:255',
            'email'          => 'required|email|unique:users,email',
            'cin'            => 'required|string|unique:users,cin',
            'phone_number'   => 'nullable|string|max:20',
            'dob'            => 'required|date',
            'gender'         => 'required|in:male,female',
            'class_id'       => 'required|exists:school_classes,id',
        ]);

        DB::transaction(function () use ($validated) {

            $user = User::create([
                'fullname'       => $validated['fullname'],
                'email'          => $validated['email'],
                'phone_number'   => $validated['phone_number'] ?? null,
                'password'       => Hash::make(Str::password(10)), // cleaner
                'date_of_birth'  => $validated['dob'],
                'gender'         => $validated['gender'],
                'cin'            => $validated['cin'],
                'role'           => 'student',
            ]);

            $user->student()->create([
                'class_id' => $validated['class_id'],
            ]);
        });

        return redirect()
            ->route('students.index')
            ->with('success', '✅ Student created successfully');
    }

    /**
     * Show student
     */
    public function show(string $id)
    {
        return view('students.show', [
            'student'  => Student::with(['user', 'schoolClass.teacher.user'])->findOrFail($id),
            'payments' => StudentPayment::where('student_id', $id)->latest()->get(),
            'classes'  => SchoolClass::all(),
        ]);
    }

    /**
     * Update student (atomic)
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'fullname'      => 'required|string|max:255',
            'phone_number'  => 'nullable|string|max:20',
            'gender'        => 'required|in:male,female',
            'dob'           => 'required|date',
            'class_id'      => 'required|exists:school_classes,id',
        ]);

        DB::transaction(function () use ($validated, $id) {

            $student = Student::with('user')->findOrFail($id);

            $student->user->update([
                'fullname'      => $validated['fullname'],
                'phone_number' => $validated['phone_number'] ?: null,
                'gender'        => $validated['gender'],
                'date_of_birth' => $validated['dob'],
            ]);

            $student->update([
                'class_id' => $validated['class_id'],
            ]);
            $student->user->save();
            $student->save();
        });

        return back()->with('success', 'Student updated successfully');
    }

    /**
     * Delete student safely
     */
    public function destroy(string $id)
    {
        DB::transaction(function () use ($id) {

            $student = Student::with('user')->findOrFail($id);

            $student->user->delete(); // deletes user first
            $student->delete();

        });

        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}