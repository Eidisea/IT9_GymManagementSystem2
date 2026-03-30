@extends('layouts.app')

@section('title', 'Add Member - Gym Management')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h2 class="text-secondary">Add New Member</h2>
        <p class="text-muted">Register a new gym member</p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('members.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" class="form-control @error('fullname') is-invalid @enderror" 
                       id="fullname" name="fullname" value="{{ old('fullname') }}" required>
                @error('fullname')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                       id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                       id="phone" name="phone" value="{{ old('phone') }}" required>
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control @error('address') is-invalid @enderror" 
                          id="address" name="address" rows="3" required>{{ old('address') }}</textarea>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control @error('age') is-invalid @enderror" 
                       id="age" name="age" value="{{ old('age') }}" min="1" max="120" required>
                @error('age')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Save Member
                </button>
                <a href="{{ route('members.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-circle"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
