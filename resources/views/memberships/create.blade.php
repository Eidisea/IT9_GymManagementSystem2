@extends('layouts.app')

@section('title', 'Add Membership - Gym Management')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h2 class="text-secondary">Add New Membership</h2>
        <p class="text-muted">Create a new membership plan</p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('memberships.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="member_id" class="form-label">Select Member</label>
                <select class="form-select @error('member_id') is-invalid @enderror" 
                        id="member_id" name="member_id" required>
                    <option value="">Choose a member...</option>
                    @foreach($members as $member)
                        <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                            {{ $member->fullname }} - {{ $member->email }}
                        </option>
                    @endforeach
                </select>
                @error('member_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="plan_type" class="form-label">Plan Type</label>
                <select class="form-select @error('plan_type') is-invalid @enderror" 
                        id="plan_type" name="plan_type" required>
                    <option value="">Choose a plan...</option>
                    <option value="Monthly" {{ old('plan_type') == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                    <option value="Quarterly" {{ old('plan_type') == 'Quarterly' ? 'selected' : '' }}>Quarterly</option>
                    <option value="Semi-Annual" {{ old('plan_type') == 'Semi-Annual' ? 'selected' : '' }}>Semi-Annual</option>
                    <option value="Annual" {{ old('plan_type') == 'Annual' ? 'selected' : '' }}>Annual</option>
                </select>
                @error('plan_type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Amount (₱)</label>
                <input type="number" step="0.01" class="form-control @error('amount') is-invalid @enderror" 
                       id="amount" name="amount" value="{{ old('amount') }}" required>
                @error('amount')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" class="form-control @error('start_date') is-invalid @enderror" 
                           id="start_date" name="start_date" value="{{ old('start_date') }}" required>
                    @error('start_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="end_date" class="form-label">End Date</label>
                    <input type="date" class="form-control @error('end_date') is-invalid @enderror" 
                           id="end_date" name="end_date" value="{{ old('end_date') }}" required>
                    @error('end_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select @error('status') is-invalid @enderror" 
                        id="status" name="status" required>
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="expired" {{ old('status') == 'expired' ? 'selected' : '' }}>Expired</option>
                    <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Save Membership
                </button>
                <a href="{{ route('memberships.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-circle"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
