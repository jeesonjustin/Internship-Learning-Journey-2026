<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentRegistrationController;
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

