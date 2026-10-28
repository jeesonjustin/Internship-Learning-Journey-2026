<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\Fee;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    // Display all fee payment records.
    public function index(Request $request)
    {
        // Step 1: Get the search text.
        $search = $request->input('search');

        // Step 2: Load payments with student and course details.
        $query = Fee::with(['student', 'course']);

        // Step 3: Search by student name or course name.
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {

                $q->whereHas('student', function ($studentQuery) use ($search) {
                    $studentQuery->where(
                        'name',
                        'like',
                        '%' . $search . '%'
                    );
                });

                $q->orWhereHas('course', function ($courseQuery) use ($search) {
                    $courseQuery->where(
                        'course_name',
                        'like',
                        '%' . $search . '%'
                    );
                });
            });
        }

        // Step 4: Display the newest payments first.
        $fees = $query
            ->orderByDesc('payment_date')
            ->orderByDesc('id')
            ->get();

        // Step 5: Calculate the outstanding balance.
        // One payment represents the full course fee.
        foreach ($fees as $fee) {
            $courseFee = (float) $fee->course->fee_amount;
            $paidAmount = (float) $fee->paid_amount;

            $fee->balance = max(0, $courseFee - $paidAmount);
        }

        return view('fees.index', compact('fees', 'search'));
    }


    // Show the full-payment form.
    public function create()
    {
        $students = Student::orderBy('name')->get();
        $courses = Course::orderBy('course_name')->get();

        return view('fees.create', compact('students', 'courses'));
    }


    // Record one full payment.
    public function store(Request $request)
    {
        // Step 1: Validate the submitted form.
        $validated = $request->validate([
            'student_id' => 'required|exists:students_t17,id',
            'course_id' => 'required|exists:courses,id',
            'payment_date' => 'required|date',
            'payment_method' => 'required|in:Cash,UPI,Bank Transfer,Card',
        ]);

        // Step 2: Check whether this student-course pair
        // already has a payment record.
        $alreadyExists = Fee::where('student_id', $validated['student_id'])
            ->where('course_id', $validated['course_id'])
            ->exists();

        if ($alreadyExists) {
            return back()
                ->withInput()
                ->withErrors([
                    'course_id' =>
                        'A full payment is already recorded for this student and course.',
                ]);
        }

        // Step 3: Get the official course fee from the database.
        $course = Course::findOrFail($validated['course_id']);

        // Step 4: Save the full course fee as the payment amount.
        Fee::create([
            'student_id' => $validated['student_id'],
            'course_id' => $validated['course_id'],
            'paid_amount' => $course->fee_amount,
            'payment_date' => $validated['payment_date'],
            'payment_method' => $validated['payment_method'],
        ]);

        // Step 5: Return to the payment list.
        return redirect()->route('fees.index')
            ->with('success', 'Full course payment recorded successfully.');
    }


    // Show the edit form.
    public function edit($id)
    {
        $fee = Fee::with(['student', 'course'])->findOrFail($id);

        $students = Student::orderBy('name')->get();
        $courses = Course::orderBy('course_name')->get();

        return view('fees.edit', compact('fee', 'students', 'courses'));
    }


    // Update an existing full-payment record.
    public function update(Request $request, $id)
    {
        // Step 1: Validate the submitted fields.
        $validated = $request->validate([
            'student_id' => 'required|exists:students_t17,id',
            'course_id' => 'required|exists:courses,id',
            'payment_date' => 'required|date',
            'payment_method' => 'required|in:Cash,UPI,Bank Transfer,Card',
        ]);

        // Step 2: Find the existing payment.
        $fee = Fee::findOrFail($id);

        // Step 3: Prevent another record for the same
        // student-course combination.
        $duplicate = Fee::where('student_id', $validated['student_id'])
            ->where('course_id', $validated['course_id'])
            ->where('id', '!=', $fee->id)
            ->exists();

        if ($duplicate) {
            return back()
                ->withInput()
                ->withErrors([
                    'course_id' =>
                        'A payment already exists for this student and course.',
                ]);
        }

        // Step 4: Get the selected course's official fee.
        $course = Course::findOrFail($validated['course_id']);

        // Step 5: Update the existing record.
        $fee->update([
            'student_id' => $validated['student_id'],
            'course_id' => $validated['course_id'],
            'paid_amount' => $course->fee_amount,
            'payment_date' => $validated['payment_date'],
            'payment_method' => $validated['payment_method'],
        ]);

        return redirect()->route('fees.index')
            ->with('success', 'Payment details updated successfully.');
    }


    // Delete a payment record.
    public function destroy($id)
    {
        $fee = Fee::findOrFail($id);

        $fee->delete();

        return redirect()->route('fees.index')
            ->with('success', 'Fee payment deleted successfully.');
    }
}

