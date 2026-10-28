
@extends('layouts.app_t17')

@section('title', 'Edit Payment')
@section('page-heading', 'Fee Management')

@section('content')

<div class="page-header">
    <div>
        <p class="eyebrow">FINANCE MANAGEMENT</p>
        <h1 class="page-title">Edit Payment</h1>
        <p class="page-description">
            Update the course and payment details.
        </p>
    </div>

    <a href="{{ route('fees.index') }}" class="btn-secondary">
        Back to Payments
    </a>
</div>

<div class="panel form-panel">

    <div class="form-panel-heading">
        <h2>Payment Information</h2>
        <p>Payment reference: #{{ $fee->id }}</p>
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

    <form
        action="{{ route('fees.update', $fee->id) }}"
        method="POST"
    >
        @csrf
        @method('PUT')

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
                    @foreach ($students as $student)
                        <option
                            value="{{ $student->id }}"
                            {{ old('student_id', $fee->student_id) == $student->id ? 'selected' : '' }}
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
                    @foreach ($courses as $course)
                        <option
                            value="{{ $course->id }}"
                            {{ old('course_id', $fee->course_id) == $course->id ? 'selected' : '' }}
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
                    The payment amount will match the selected course's full fee.
                </small>
            </div>

            {{-- Read-only full fee --}}
            <div class="form-group">
                <label for="full_course_fee">Full Course Fee</label>

                <input
                    type="text"
                    id="full_course_fee"
                    class="form-control"
                    value="₹{{ number_format((float) $fee->course->fee_amount, 2) }}"
                    readonly
                >
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
                    value="{{ old('payment_date', $fee->payment_date) }}"
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
                    <option value="Cash"
                        {{ old('payment_method', $fee->payment_method) == 'Cash' ? 'selected' : '' }}>
                        Cash
                    </option>

                    <option value="UPI"
                        {{ old('payment_method', $fee->payment_method) == 'UPI' ? 'selected' : '' }}>
                        UPI
                    </option>

                    <option value="Bank Transfer"
                        {{ old('payment_method', $fee->payment_method) == 'Bank Transfer' ? 'selected' : '' }}>
                        Bank Transfer
                    </option>

                    <option value="Card"
                        {{ old('payment_method', $fee->payment_method) == 'Card' ? 'selected' : '' }}>
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
                Update Payment
            </button>
        </div>

    </form>

</div>

@endsection
