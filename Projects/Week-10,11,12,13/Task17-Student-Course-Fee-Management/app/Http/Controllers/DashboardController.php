<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\Fee;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudents = Student::count();

        $totalCourses = Course::count();

        $totalCollections = Fee::sum('paid_amount');

        $totalPayments = Fee::count();

        return view('dashboard', compact(
            'totalStudents',
            'totalCourses',
            'totalCollections',
            'totalPayments'
        ));
    }
}