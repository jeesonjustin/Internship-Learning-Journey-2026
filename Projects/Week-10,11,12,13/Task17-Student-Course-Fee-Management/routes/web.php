<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentRegistrationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
|--------------------------------------------------------------------------
| Task-16
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/student-registrations/create', [StudentRegistrationController::class, 'create'])->name('student-registrations.create');
Route::post('/student-registrations', [StudentRegistrationController::class, 'store'])->name('student-registrations.store');
Route::get('/student-registrations', [StudentRegistrationController::class, 'index'])->name('student-registrations.index');
Route::get('/student-registrations/{id}/edit', [StudentRegistrationController::class, 'edit'])->name('student-registrations.edit');
Route::put('/student-registrations/{id}', [StudentRegistrationController::class, 'update'])->name('student-registrations.update');
Route::delete('/student-registrations/{id}', [StudentRegistrationController::class, 'destroy'])->name('student-registrations.destroy');

/*
|--------------------------------------------------------------------------
| Task-17
|--------------------------------------------------------------------------
*/


/*Student Management Module*/

Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

/*Course Management Module*/

Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');

/*Fees Management Module*/

Route::get('/fees/create', [FeeController::class, 'create'])->name('fees.create');
Route::post('/fees', [FeeController::class, 'store'])->name('fees.store');
Route::get('/fees', [FeeController::class, 'index'])->name('fees.index');
Route::get('/fees/{id}/edit', [FeeController::class, 'edit'])->name('fees.edit');
Route::put('/fees/{id}', [FeeController::class, 'update'])->name('fees.update');
Route::delete('/fees/{id}', [FeeController::class, 'destroy'])->name('fees.destroy');

/*Dashboard Management Module*/

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::view('/task17-layout-test', 'layout_test_t17');