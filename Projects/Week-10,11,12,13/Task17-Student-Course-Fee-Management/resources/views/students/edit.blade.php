@extends('layouts.app_t17')

@section('content')



<div class="page-header">
    <div>
        <p class="eyebrow">STUDENT MANAGEMENT</p>
        <h1 class="page-title">Edit Student</h1>
        <p class="page-description">
            Update the information for {{ $student->name }}.
        </p>
    </div>

    <a href="{{ route('students.index') }}" class="btn-secondary">
        Back to Students
    </a>
</div>

<div class="panel form-panel">

    <div class="form-heading">
        <h2>Student Information</h2>
        <p>Make the necessary changes and save your updates.</p>
    </div>

    @if ($errors->any())
        <div class="alert-error">
            Please correct the errors below and try again.
        </div>
    @endif

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-grid">

            <div class="form-group">
                <label for="name">Full Name <span class="required">*</span></label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $student->name) }}"
                    placeholder="Enter full name"
                    required
                >
                @error('name')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email Address <span class="required">*</span></label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email', $student->email) }}"
                    placeholder="name@example.com"
                    maxlength="255"
                    required
                >
                @error('email')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Phone Number <span class="required">*</span></label>
                <input
                    type="tel"
                    id="phone"
                    name="phone"
                    class="form-control"
                    value="{{ old('phone', $student->phone) }}"
                    placeholder="Enter 10-digit mobile number"
                    pattern="[6-9][0-9]{9}"
                    maxlength="10"
                    inputmode="numeric"
                    required
                >
                @error('phone')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group form-group-full">
                <label for="address">Address <span class="required">*</span></label>
                <textarea
                    id="address"
                    name="address"
                    class="form-control form-textarea"
                    rows="4"
                    placeholder="Enter full address"
                    required
                >{{ old('address', $student->address) }}</textarea>
                @error('address')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <div class="form-actions">
            <a href="{{ route('students.index') }}" class="btn-secondary">
                Cancel
            </a>

            <button type="submit" class="btn-primary">
                Save Changes
            </button>
        </div>

    </form>
</div>

</div>
@endsection
