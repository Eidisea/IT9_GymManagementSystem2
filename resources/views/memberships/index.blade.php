@extends('layouts.app')

@section('title', 'Memberships - Gym Management')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <h2 class="text-secondary">Memberships</h2>
        <p class="text-muted">Manage gym memberships</p>
    </div>
    <div class="col-md-6 text-end">
        <a href="{{ route('memberships.create') }}" class="btn btn-light">
            <i class="bi bi-plus-circle-fill"></i> Add New Membership
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Member</th>
                        <th>Plan Type</th>
                        <th>Amount</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($memberships as $membership)
                    <tr>
                        <td>{{ $membership->id }}</td>
                        <td>{{ $membership->member->fullname }}</td>
                        <td>{{ $membership->plan_type }}</td>
                        <td>₱{{ number_format($membership->amount, 2) }}</td>
                        <td>{{ $membership->start_date->format('M d, Y') }}</td>
                        <td>{{ $membership->end_date->format('M d, Y') }}</td>
                        <td>
                            @if($membership->status == 'active')
                                <span class="badge bg-success">Active</span>
                            @elseif($membership->status == 'expired')
                                <span class="badge bg-danger">Expired</span>
                            @else
                                <span class="badge bg-secondary">Cancelled</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('memberships.edit', $membership) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-fill"></i> Edit
                            </a>
                            <form action="{{ route('memberships.destroy', $membership) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                    <i class="bi bi-trash-fill"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">No memberships found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
