
@extends('layouts.app_t17')

@section('title', 'Record Payment')
@section('page-heading', 'Fee Management')

@section('content')

<div class="page-header">
    <div>
        <p class="eyebrow">FINANCE MANAGEMENT</p>
        <h1 class="page-title">Record Full Payment</h1>
        <p class="page-description">
            Record a student's complete course fee payment.
        </p>
    </div>

    <a href="{{ route('fees.index') }}" class="btn-secondary">
        Back to Payments
    </a>
</div>

<div class="panel form-panel">

    <div class="form-panel-heading">
        <h2>Payment Information</h2>
        <p>Select a student, course, payment date and method.</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('fees.store') }}"
          method="POST">

        @csrf

        <div class="form-grid">

            {{-- Student --}}
            <div class="form-group">
                <label for="student_id">
                    Student <span class="required">*</span>
                </label>

                <select
                    name="student_id"
                    id="student_id"
                    class="form-control"
                    required
                >
                    <option value="">Select Student</option>

                    @foreach ($students as $student)
                        <option
                            value="{{ $student->id }}"
                            {{ old('student_id') == $student->id ? 'selected' : '' }}
                        >
                            {{ $student->name }}
                        </option>
                    @endforeach
                </select>

                @error('student_id')
                    <small class="field-error">{{ $message }}</small>
                @enderror
            </div>

            {{-- Course --}}
            <div class="form-group">
                <label for="course_id">
                    Course <span class="required">*</span>
                </label>

                <select
                    name="course_id"
                    id="course_id"
                    class="form-control"
                    required
                >
                    <option value="">Select Course</option>

                    @foreach ($courses as $course)
                        <option
                            value="{{ $course->id }}"
                            {{ old('course_id') == $course->id ? 'selected' : '' }}
                        >
                            {{ $course->course_name }}
                            — ₹{{ number_format((float) $course->fee_amount, 2) }}
                        </option>
                    @endforeach
                </select>

                @error('course_id')
                    <small class="field-error">{{ $message }}</small>
                @enderror

                <small class="form-hint">
                    The full course fee will be recorded automatically.
                    Partial payments are not supported.
                </small>
            </div>

            {{-- Payment date --}}
            <div class="form-group">
                <label for="payment_date">
                    Payment Date <span class="required">*</span>
                </label>

                <input
                    type="date"
                    name="payment_date"
                    id="payment_date"
                    class="form-control"
                    value="{{ old('payment_date', date('Y-m-d')) }}"
                    required
                >

                @error('payment_date')
                    <small class="field-error">{{ $message }}</small>
                @enderror
            </div>

            {{-- Payment method --}}
            <div class="form-group">
                <label for="payment_method">
                    Payment Method <span class="required">*</span>
                </label>

                <select
                    name="payment_method"
                    id="payment_method"
                    class="form-control"
                    required
                >
                    <option value="">Select Payment Method</option>

                    <option value="Cash"
                        {{ old('payment_method') == 'Cash' ? 'selected' : '' }}>
                        Cash
                    </option>

                    <option value="UPI"
                        {{ old('payment_method') == 'UPI' ? 'selected' : '' }}>
                        UPI
                    </option>

                    <option value="Bank Transfer"
                        {{ old('payment_method') == 'Bank Transfer' ? 'selected' : '' }}>
                        Bank Transfer
                    </option>

                    <option value="Card"
                        {{ old('payment_method') == 'Card' ? 'selected' : '' }}>
                        Card
                    </option>
                </select>

                @error('payment_method')
                    <small class="field-error">{{ $message }}</small>
                @enderror
            </div>

        </div>

        <div class="form-actions">
            <a href="{{ route('fees.index') }}" class="btn-secondary">
                Cancel
            </a>

            <button type="submit" class="btn-primary">
                Record Full Payment
            </button>
        </div>

    </form>

</div>

@endsection
