<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
   public function index()
{
    $name = "Jeeson Justin";
    $age = 26;
    $gender = "Male";
    $dob = "01 January 2001";
    $email = "jeeson@gmail.com";
    $phone = "9876543210";
    $qualification = "Master of Computer Applications";

    return view('profile', [
        'name' => $name,
        'age' => $age,
        'gender' => $gender,
        'dob' => $dob,
        'email' => $email,
        'phone' => $phone,
        'qualification' => $qualification
    ]);
}
}
