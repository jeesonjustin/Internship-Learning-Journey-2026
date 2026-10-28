
@extends('layouts.app_t17')

@section('title', 'Students')
@section('page-title', 'Student Management')

@section('content')

<div class="page-header">
    <div>
        <p class="eyebrow">STUDENT MANAGEMENT</p>
        <h1 class="page-title">Students</h1>
        <p class="text-muted">
            Manage student registrations and personal details.
        </p>
    </div>

    <a href="{{ route('students.create') }}" class="btn-primary">
        + Add Student
    </a>
</div>

<!-- {{-- Success message --}}
@if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif -->

{{-- Search panel --}}
<div class="panel student-search-panel">
    <form action="{{ route('students.index') }}" method="GET"
          class="student-search-form">

        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Search by name or email..."
            value="{{ $search ?? '' }}"
        >

        <button type="submit" class="btn-primary">
            Search
        </button>

        @if(!empty($search))
            <a href="{{ route('students.index') }}"
               class="btn-secondary">
                Clear
            </a>
        @endif

    </form>
</div>

{{-- Student table --}}
<div class="panel student-table-panel">

    <div class="table-heading">
        <div>
            <h2>Student Directory</h2>
            <p class="text-muted">
                {{ $students->count() }}
                {{ $students->count() === 1 ? 'student' : 'students' }}
                displayed
            </p>
        </div>
    </div>

    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($students as $student)
                    <tr>
                        <td class="student-id">
                            {{ $student->id }}
                        </td>

                        <td>
                            <div class="student-identity">
                                <div class="student-avatar">
                                    {{ strtoupper(substr($student->name, 0, 1)) }}
                                </div>

                                <div class="student-details">
                                    <span class="student-name">
                                        {{ $student->name }}
                                    </span>

                                    <span class="student-email">
                                        {{ $student->email }}
                                    </span>
                                </div>
                            </div>
                        </td>

                        <td>{{ $student->phone }}</td>

                        <td class="student-address">
                            {{ $student->address }}
                        </td>

                        <td>
                            <div class="table-actions">
                                <a
                                    href="{{ route('students.edit', $student->id) }}"
                                    class="action-link"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('students.destroy', $student->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this student?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="action-link action-delete"
                                    >
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="empty-state">
                            <h3>No students found</h3>
                            <p>
                                @if(!empty($search))
                                    Try another name or email address.
                                @else
                                    Register your first student to get started.
                                @endif
                            </p>

                            @if(empty($search))
                                <a
                                    href="{{ route('students.create') }}"
                                    class="btn-primary"
                                >
                                    + Add Student
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
