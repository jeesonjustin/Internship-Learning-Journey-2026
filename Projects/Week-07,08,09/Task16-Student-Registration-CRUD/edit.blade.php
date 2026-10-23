@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')

    <h1>Edit Student</h1>

    <form method="POST"
          action="{{ route('student-registrations.update', $student->id) }}">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Student Name</label>

            <input type="text"
                   class="form-control"
                   id="name"
                   name="name"
                   value="{{ old('name', $student->name) }}"
                   maxlength="255"
                   required>

            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>

            <input type="email"
                   class="form-control"
                   id="email"
                   name="email"
                   value="{{ old('email', $student->email) }}"
                   required>

            @error('email')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="mobile" class="form-label">Mobile Number</label>

            <input type="text"
                   class="form-control"
                   id="mobile"
                   name="mobile"
                   value="{{ old('mobile', $student->mobile) }}"
                   maxlength="10"
                   required>

            @error('mobile')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="course" class="form-label">Course</label>

            <input type="text"
                   class="form-control"
                   id="course"
                   name="course"
                   value="{{ old('course', $student->course) }}"
                   maxlength="255"
                   required>

            @error('course')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Update Student
        </button>

        <a href="{{ route('student-registrations.index') }}"
           class="btn btn-secondary ms-2">
            Back to Students
        </a>

    </form>

@endsection