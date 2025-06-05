@extends('layouts.master')
@section('content')


<nav aria-label="breadcrumb" class="sticky-top bg-white border-bottom" style="z-index: 1030;">
  <ol class="breadcrumb mb-0 p-3">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('states.index') }}">States</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ isset($state) ? 'Edit' : 'Add' }}</li>
  </ol>
</nav>

<div class="  my-4">
  <div class="card shadow-sm">
    <div class="card-body">
      <h2 class="card-title mb-4">{{ isset($state) ? 'Edit' : 'Add' }} State</h2>
      <form action="{{ isset($state) ? route('states.update', $state->id) : route('states.store') }}" method="POST" novalidate>
        @csrf
        @if(isset($state)) @method('PUT') @endif

        <div class="mb-3">
          <label for="name" class="form-label">State Name <span class="text-danger">*</span></label>
          <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name', $state->name ?? '') }}"
            class="form-control @error('name') is-invalid @enderror"
            required
          >
          @error('name')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="d-flex gap-2">
          <button type="submit" class="btn btn-success">Save</button>
          <a href="{{ route('states.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
