<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentRegistration;
use Illuminate\Validation\Rule;

class StudentRegistrationController extends Controller
{
    public function create()
    {
        return view('student_registrations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:student_registrations,email',
            'mobile' => 'required|digits:10',
            'course' => 'required|string|max:255',
        ]);

        StudentRegistration::create($validated);
        return redirect()
        ->route('student-registrations.index')
        ->with('success', 'Student registered successfully.');
    }
    public function index()
    {
        $students = StudentRegistration::all();

        return view('student_registrations.index', compact('students'));
    }
    public function edit($id)
    {
        $student = StudentRegistration::findOrFail($id);

        return view('student_registrations.edit', compact('student'));
    }
    public function update(Request $request, $id)
    {
        $student = StudentRegistration::findOrFail($id);

       $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => [
            'required',
            'email',
            Rule::unique('student_registrations', 'email')->ignore($id),
        ],
        'mobile' => 'required|digits:10',
        'course' => 'required|string|max:255',
    ]);

        $student->update($validated);

        return redirect()
        ->route('student-registrations.index')
        ->with('success', 'Student updated successfully.');
        
    }
    public function destroy($id)
    {
        $student = StudentRegistration::findOrFail($id);

        $student->delete();

        return redirect()
        ->route('student-registrations.index')
        ->with('success', 'Student deleted successfully.');
    }
}
