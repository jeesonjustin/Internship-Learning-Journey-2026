
@extends('layouts.app_t17')

@section('title', 'Fee Management')
@section('page-heading', 'Overview')

@section('content')

<div class="page-header">
    <div>
        <p class="eyebrow">FINANCE MANAGEMENT</p>
        <h1 class="page-title">Fee Management</h1>
        <p class="page-description">
            Manage student payments and course fee records.
        </p>
    </div>

    <a href="{{ route('fees.create') }}" class="btn-primary">
        + Record Payment
    </a>
</div>

{{-- Search panel --}}
<div class="panel search-panel">
    <form action="{{ route('fees.index') }}"
          method="GET"
          class="search-form">

        <div class="search-input-wrap">
            <label for="search" class="sr-only">
                Search payments
            </label>

            <input
                type="text"
                id="search"
                name="search"
                class="form-control"
                placeholder="Search by student or course..."
                value="{{ $search ?? '' }}"
            >
        </div>

        <button type="submit" class="btn-primary">
            Search
        </button>

        @if (!empty($search))
            <a href="{{ route('fees.index') }}"
               class="btn-secondary">
                Clear
            </a>
        @endif

    </form>
</div>

{{-- Payment records --}}
<div class="panel table-panel">

    <div class="table-panel-heading">
        <div>
            <h2>Payment Records</h2>

            <p>
                {{ $fees->count() }}
                {{ $fees->count() === 1 ? 'payment' : 'payments' }}
                displayed

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
                    <th scope="col">Student</th>
                    <th scope="col">Course</th>
                    <th scope="col">Course Fee</th>
                    <th scope="col">Paid Amount</th>
                    <th scope="col">Payment Date</th>
                    <th scope="col">Method</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($fees as $fee)
                    <tr>
                        <td class="text-muted">
                            {{ $fee->id }}
                        </td>

                        <td>
                            <span class="table-primary-text">
                                {{ $fee->student->name }}
                            </span>
                        </td>

                        <td>
                            {{ $fee->course->course_name }}
                        </td>

                        <td class="fee-value">
                            ₹{{ number_format((float) $fee->course->fee_amount, 2) }}
                        </td>

                        <td class="fee-value">
                            ₹{{ number_format((float) $fee->paid_amount, 2) }}
                        </td>

                        <td>
                            {{ $fee->payment_date }}
                        </td>

                        <td>
                            {{ $fee->payment_method }}
                        </td>

                        <td>
                            <div class="table-actions">

                                <a
                                    href="{{ route('fees.edit', $fee->id) }}"
                                    class="action-link"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('fees.destroy', $fee->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this payment?')"
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
                        <td colspan="8" class="empty-state">
                            <strong>No payment records found</strong>

                            <p>
                                @if (!empty($search))
                                    Try a different student or course name,
                                    or clear your search.
                                @else
                                    Record your first payment to get started.
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
