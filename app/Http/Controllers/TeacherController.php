<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::with('user')->get();
        $teacherCount = $teachers->count();
        return view('teachers',compact('teachers','teacherCount'));
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
        try {
            DB::transaction(function () use ($request) {

            $user = User::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt(Str::upper(Str::random(4)) . rand(1000, 9999)),
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'cin' => $request->cin,
            'role' => 'teacher',
            ]);

            $user->teacher()->create([
            'status' => 'active',
            ]);
        });

        return redirect()->route('teachers.index');

        } catch (\Exception $e) {
    return back()->withErrors('Something went wrong: ' . $e->getMessage());
        }
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
