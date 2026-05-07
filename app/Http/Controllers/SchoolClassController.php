<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = SchoolClass::with('teacher.user')->withCount('students')->get();
        $classCount = SchoolClass::count();
        $teachingCount  = SchoolClass::where('status','teaching')->count();
        $pendingCount = SchoolClass::where('status','pending')->count();
        $teachers = Teacher::all();
        return view('classes',compact('classes','classCount','teachingCount','pendingCount','teachers'));
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
        $class = SchoolClass::find($id,"id");
        $class->name = $request->name;
        $class->teacher_id = $request->teacher_id;
        $class->status = $request->status;
        $class->save();
        return redirect()->back()->withSuccess("class edited successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $class = SchoolClass::with('students')->findOrFail($id);
        if ($class->students()->count() > 0) {
            return redirect()->back()->with('error',"cannot delete class with students");
        }
        else {
            $class->delete();
            return redirect()->back()->withSuccess('class deleted successfully');
        }
    }
}
