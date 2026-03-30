@extends('layouts.app')

@section('title', 'Dashboard - Gym Management')

@section('content')
<div class="page-header">
    <h2>Dashboard</h2>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card stat-card">
            <i class="bi bi-people-fill text-primary-custom"></i>
            <h3>{{ $totalMembers }}</h3>
            <p>Total Members</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card">
            <i class="bi bi-check-circle-fill text-success-custom"></i>
            <h3>{{ $activeMemberships }}</h3>
            <p>Active Memberships</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card">
            <i class="bi bi-x-circle-fill text-danger-custom"></i>
            <h3>{{ $expiredMemberships }}</h3>
            <p>Expired Memberships</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card">
            <i class="bi bi-currency-dollar text-warning-custom"></i>
            <h3>₱{{ number_format($totalRevenue, 2) }}</h3>
            <p>Total Revenue</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-lightning-fill"></i> Quick Actions</h5>
                <div class="d-grid gap-2">
                    <a href="{{ route('members.create') }}" class="btn btn-primary">
                        <i class="bi bi-person-plus-fill"></i> Add New Member
                    </a>
                    <a href="{{ route('memberships.create') }}" class="btn btn-success">
                        <i class="bi bi-plus-circle-fill"></i> Create Membership
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-info-circle-fill"></i> System Information</h5>
                <div class="mt-3">
                    <p class="mb-2"><i class="bi bi-calendar-check"></i> <strong>Today:</strong> {{ date('F d, Y') }}</p>
                    <p class="mb-2"><i class="bi bi-clock"></i> <strong>Time:</strong> {{ date('h:i A') }}</p>
                    <p class="mb-0"><i class="bi bi-gear-fill"></i> <strong>Status:</strong> <span class="badge bg-success">Online</span></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
