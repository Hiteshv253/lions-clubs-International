@extends('layouts.master')

@section('content')
<div class="py-4">
      <div class="card shadow-sm rounded-4">
            <div class="card-header bg-primary text-white rounded-top-4">
                  <h4 class="mb-0">{{ isset($team) ? 'Edit DG Team Member' : 'Create DG Team Member' }}</h4>
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

                        <div class="d-flex justify-content-between">
                              <a href="{{ route('dg-teams.index') }}" class="btn btn-secondary">Cancel</a>
                              <button type="submit" class="btn btn-primary">{{ isset($team) ? 'Update' : 'Save' }}</button>
                        </div>
                  </form>
            </div>
      </div>
</div>
@endsection
