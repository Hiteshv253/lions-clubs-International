@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dg-teams.index') }}">DG Team Member</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
      </ol>
</nav>


<div class="card shadow-sm">
      <div class="card-header">
            <h5 class="mb-0">{{ isset($team) ? 'Edit DG Team Member' : 'Create DG Team Member' }}</h5>
      </div>
      <div class="card-body">
            <form action="{{ isset($team) ? route('dg-teams.update', $team->id) : route('dg-teams.store') }}" method="POST" novalidate>
                  @csrf
                  @if(isset($team))
                  @method('PUT')
                  @endif

                  <div class="mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $team->name ?? '') }}" required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                  </div>

                  <div class="mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', $team->email ?? '') }}" required>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                  </div>

                  <div class="mb-3">
                        <label for="designation" class="form-label">Designation <span class="text-danger">*</span></label>
                        <input type="text" id="designation" name="designation" class="form-control @error('designation') is-invalid @enderror"
                               value="{{ old('designation', $team->designation ?? '') }}" required>
                        @error('designation')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                  </div>

                  <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror"
                               value="{{ old('phone', $team->phone ?? '') }}">
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                  </div>

                  <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror" rows="3">{{ old('address', $team->address ?? '') }}</textarea>
                        @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                  </div>

                  <div class="text-end">
                        <a href="{{ route('dg-teams.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">{{ isset($team) ? 'Update' : 'Save' }}</button>
                  </div>


            </form>
      </div>
</div>

@endsection
