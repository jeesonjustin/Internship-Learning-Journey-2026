<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $courses = Course::when($search, function ($query) use ($search) {

            $query->where('course_name', 'like', '%' . $search . '%');

        })->get();

        return view('courses.index', compact('courses', 'search'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required',
            'duration' => 'required',
            'fee_amount' => 'required|numeric|min:0',
        ]);

        Course::create([
            'course_name' => $request->course_name,
            'duration' => $request->duration,
            'fee_amount' => $request->fee_amount,
        ]);

        return redirect()->route('courses.index')
                         ->with('success', 'Course registered successfully.');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);

        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'course_name' => 'required',
            'duration' => 'required',
            'fee_amount' => 'required|numeric|min:0',
        ]);

        $course->update([
            'course_name' => $request->course_name,
            'duration' => $request->duration,
            'fee_amount' => $request->fee_amount,
        ]);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }
    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        $course->delete();

        return redirect()->route('courses.index')
                     ->with('success', 'Course deleted successfully.');
    }

}