@extends('layouts.app_t17')

@section('content')



<div class="page-header">
    <div>
        <p class="eyebrow">COURSE MANAGEMENT</p>
        <h1 class="page-title">Edit Course</h1>
        <p class="page-description">
            Update the details for {{ $course->course_name }}.
        </p>
    </div>

    <a href="{{ route('courses.index') }}" class="btn-secondary">
        Back to Courses
    </a>
</div>

<div class="panel form-panel">

    <div class="form-heading">
        <h2>Course Information</h2>
        <p>Make the necessary changes and save your updates.</p>
    </div>

    @if ($errors->any())
        <div class="alert-error">
            Please correct the errors below and try again.
        </div>
    @endif

    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-grid">

            <div class="form-group">
                <label for="course_name">
                    Course Name <span class="required">*</span>
                </label>

                <input
                    type="text"
                    id="course_name"
                    name="course_name"
                    class="form-control"
                    value="{{ old('course_name', $course->course_name) }}"
                    placeholder="e.g. Laravel Development"
                    required
                >

                @error('course_name')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="duration">
                    Duration <span class="required">*</span>
                </label>

                <input
                    type="text"
                    id="duration"
                    name="duration"
                    class="form-control"
                    value="{{ old('duration', $course->duration) }}"
                    placeholder="e.g. 3 months"
                    required
                >

                @error('duration')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="fee_amount">
                    Course Fee (₹) <span class="required">*</span>
                </label>

                <input
                    type="number"
                    id="fee_amount"
                    name="fee_amount"
                    class="form-control"
                    value="{{ old('fee_amount', $course->fee_amount) }}"
                    min="0.01"
                    step="0.01"
                    placeholder="e.g. 22000.00"
                    required
                >

                @error('fee_amount')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <div class="form-actions">
            <a href="{{ route('courses.index') }}" class="btn-secondary">
                Cancel
            </a>

            <button type="submit" class="btn-primary">
                Save Changes
            </button>
        </div>

    </form>
</div>


@endsection
