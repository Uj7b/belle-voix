<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    /**
     * Display listing.
     */
    public function index()
    {
        $classes = SchoolClass::with(['teacher.user'])
            ->withCount('students')
            ->latest()
            ->get();

        $classCount = SchoolClass::count('id');

        $statusCounts = SchoolClass::selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        $teachers = Teacher::with('user')->get();

        return view('classes', [
            'classes'        => $classes,
            'classCount'     => $classCount,
            'teachingCount'  => $statusCounts['teaching'] ?? 0,
            'pendingCount'   => $statusCounts['pending'] ?? 0,
            'teachers'       => $teachers,
        ]);
    }

    /**
     * Store new class.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'teacher_id' => ['nullable', 'exists:teachers,id'],
            'status'     => ['required', 'in:pending,teaching'],
        ]);

        SchoolClass::create($validated);

        return redirect()
            ->route('classes.index')
            ->with('success', 'Class created successfully.');
    }

    /**
     * Update class.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'teacher_id' => ['nullable', 'exists:teachers,id'],
            'status'     => ['required', 'in:pending,teaching'],
        ]);

        $class = SchoolClass::findOrFail($id);

        $class->update($validated);

        return back()->with('success', 'Class updated successfully.');
    }

    /**
     * Delete class.
     */
    public function destroy(string $id)
    {
        $class = SchoolClass::withCount('students')->findOrFail($id);

        if ($class->students_count > 0) {
            return back()->with('error', 'Cannot delete class with students.');
        }

        $class->delete();

        return back()->with('success', 'Class deleted successfully.');
    }
}