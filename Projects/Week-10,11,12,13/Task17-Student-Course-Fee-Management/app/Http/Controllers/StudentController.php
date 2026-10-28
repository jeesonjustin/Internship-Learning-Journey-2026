<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
   public function index(Request $request)
    {
        $search = $request->search;

        $students = Student::when($search, function ($query) use ($search) {

            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%');

        })->get();

        return view('students.index', compact('students', 'search'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
    $validated = $request->validate([
        'name' => [
            'required',
            'string',
            'min:2',
            'max:100',
            'regex:/^[\pL\s.\'-]+$/u',
        ],

        'email' => [
            'required',
            'string',
            'email',
            'max:255',
            'regex:/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i',
            'unique:students_t17,email',
        ],

        'phone' => [
            'required',
            'regex:/^[6-9][0-9]{9}$/',
        ],

        'address' => [
            'required',
            'string',
            'min:5',
            'max:255',
            'regex:/.*\pL.*/u',
        ],
    ], [
        'name.regex' => 'Name may contain letters, spaces, apostrophes, periods and hyphens only.',
        'email.email' => 'Please enter a valid email address.',
        'email.unique' => 'This email address is already registered.',
        'phone.required' => 'Please enter a phone number.',
        'phone.regex' => 'Enter a valid 10-digit Indian mobile number starting with 6, 7, 8 or 9.',
        'address.regex' => 'Address must contain at least one letter.',
    ]);

    Student::create($validated);

    return redirect()->route('students.index')
        ->with('success', 'Student registered successfully.');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
    $student = Student::findOrFail($id);

    $validated = $request->validate([
        'name' => [
            'required',
            'string',
            'min:2',
            'max:100',
            'regex:/^[\pL\s.\'-]+$/u',
        ],

        'email' => [
            'required',
            'string',
            'email',
            'max:255',
            'regex:/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i',
            Rule::unique('students_t17', 'email')
                ->ignore($student->id),
        ],
        'phone' => [
            'required',
            'regex:/^[6-9][0-9]{9}$/',
        ],

        'address' => [
            'required',
            'string',
            'min:5',
            'max:255',
            'regex:/.*\pL.*/u',
        ],
    ], [
        'name.regex' => 'Name may contain letters, spaces, apostrophes, periods and hyphens only.',
        'email.email' => 'Please enter a valid email address.',
        'email.unique' => 'This email address is already registered.',
        'phone.required' => 'Please enter a phone number.',
        'phone.regex' => 'Enter a valid 10-digit Indian mobile number starting with 6, 7, 8 or 9.',
        'address.regex' => 'Address must contain at least one letter.',
        
    ]);

    $student->update($validated);

    return redirect()->route('students.index')
        ->with('success', 'Student updated successfully.');
    }
    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return redirect()->route('students.index')
                        ->with('success', 'Student deleted successfully.');
    }
}