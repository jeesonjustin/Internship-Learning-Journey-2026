
@extends('layouts.app_t17')

@section('content')

<div class="page-header">
    <div>
        <p class="eyebrow">COURSE MANAGEMENT</p>
        <h1 class="page-title">Courses</h1>
        <p class="page-description">
            Manage course details, durations and fee amounts.
        </p>
    </div>

    <a href="{{ route('courses.create') }}" class="btn-primary">
        + Add Course
    </a>
</div>

{{-- Search panel --}}
<div class="panel search-panel">
    <form action="{{ route('courses.index') }}" method="GET" class="search-form">

        <div class="search-input-wrap">
            <label for="search" class="sr-only">Search courses</label>

            <input
                type="text"
                id="search"
                name="search"
                class="form-control"
                placeholder="Search by course name..."
                value="{{ $search ?? '' }}"
            >
        </div>

        <button type="submit" class="btn-primary">
            Search
        </button>

        @if (!empty($search))
            <a href="{{ route('courses.index') }}" class="btn-secondary">
                Clear
            </a>
        @endif

    </form>
</div>

{{-- Course table --}}
<div class="panel table-panel">

    <div class="table-panel-heading">
        <div>
            <h2>Course Directory</h2>

            <p>
                {{ $courses->count() }}
                {{ $courses->count() === 1 ? 'course' : 'courses' }} displayed

                @if (!empty($search))
                    for "{{ $search }}"
                @endif
            </p>
        </div>
    </div>

    <div class="table-responsive">
        <table class="data-table">

            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Fee Amount</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($courses as $course)
                    <tr>
                        <td class="text-muted">
                            {{ $course->id }}
                        </td>

                        <td>
                            <span class="table-primary-text">
                                {{ $course->course_name }}
                            </span>
                        </td>

                        <td>
                            {{ $course->duration }}
                        </td>

                        <td class="fee-value">
                            ₹{{ number_format((float) $course->fee_amount, 2) }}
                        </td>

                        <td>
                            <div class="table-actions">

                                <a
                                    href="{{ route('courses.edit', $course->id) }}"
                                    class="action-link"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('courses.destroy', $course->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this course?')"
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
                            <strong>No courses found</strong>

                            <p>
                                @if (!empty($search))
                                    Try another course name or clear your search.
                                @else
                                    Add your first course to get started.
                                @endif
                            </p>
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>

@endsection
