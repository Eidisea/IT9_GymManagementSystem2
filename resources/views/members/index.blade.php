@extends('layouts.app')

@section('title', 'Members - Gym Management')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <h2 class="text-secondary">Members</h2>
        <p class="text-muted">Manage gym members</p>
    </div>
    <div class="col-md-6 text-end">
        <a href="{{ route('members.create') }}" class="btn btn-light">
            <i class="bi bi-person-plus-fill"></i> Add New Member
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
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Age</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($members as $member)
                    <tr>
                        <td>{{ $member->id }}</td>
                        <td>{{ $member->fullname }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->phone }}</td>
                        <td>{{ $member->age }}</td>
                        <td>
                            <a href="{{ route('members.edit', $member) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-fill"></i> Edit
                            </a>
                            <form action="{{ route('members.destroy', $member) }}" method="POST" class="d-inline">
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
                        <td colspan="6" class="text-center">No members found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
