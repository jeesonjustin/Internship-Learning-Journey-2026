@extends('layouts.app')

@section('title', 'Student List')

@section('content')

    @if (session('success'))
        <div id="success-message" class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close">
            </button>
        </div>
    @endif

    <h1>Registered Students</h1>

    <a href="{{ route('student-registrations.create') }}"
       class="btn btn-success mb-3">
        Register New Student
    </a>

    <div class="table-responsive">

        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Course</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($students as $student)

                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->mobile }}</td>
                        <td>{{ $student->course }}</td>

                        <td>
                            <a href="{{ route('student-registrations.edit', $student->id) }}"
                               class="btn btn-primary btn-sm">
                                Edit
                            </a>

                            <form method="POST"
                                  action="{{ route('student-registrations.destroy', $student->id) }}"
                                  style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this student?')">
                                    Delete
                                </button>

                            </form>
                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center">
                            No students registered yet.
                        </td>
                    </tr>

                @endforelse
            </tbody>

        </table>

    </div>

@endsection

@section('scripts')

<script>
    setTimeout(function () {
        var message = document.getElementById('success-message');

        if (message) {
            message.remove();
        }
    }, 3000);
</script>

@endsection