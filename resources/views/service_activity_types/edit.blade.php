@extends('layouts.master')
@section('content')


<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('service-activity-types.index') }}">Service Activity Types</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
      </ol>
</nav>

<!-- Page Title -->
<div class="mb-4">
      <h2 class="h4">Edit Service Activity Type</h2>
</div>

<!-- Form -->
<div class="card shadow-sm rounded-4">
      <div class="card-body">
            <form method="POST" action="{{ route('service-activity-types.update', $service_activity_type->id) }}">
                  @csrf
                  @method('PUT')

                  <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $service_activity_type->name) }}">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                  </div>

                  <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea name="description" id="description" class="form-control">{{ old('description', $service_activity_type->description) }}</textarea>
                  </div>

                  <button type="submit" class="btn btn-success">Update</button>
                  <a href="{{ route('service-activity-types.index') }}" class="btn btn-secondary ms-2">Cancel</a>
            </form>
      </div>
</div>

@endsection
