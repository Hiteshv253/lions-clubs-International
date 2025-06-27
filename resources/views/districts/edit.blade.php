@extends('layouts.master')

@section('content')
<nav>
    <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('districts.index') }}">Districts</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit District</li>
    </ol>
</nav>

<div class="card shadow-sm rounded-4">
    <div class="card-header"><h5 class="mb-0">Edit District</h5></div>
    <div class="card-body">
        <form action="{{ route('districts.update', $district->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-sm-6 col-md-4 mb-3">
                    <label for="name" class="form-label">District Name *</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $district->name) }}" >
                    @error('name') <small class="invalid-feedback">{{ $message }}</small> @enderror
                </div>

                <div class="col-sm-6 col-md-4 mb-3">
                    <label for="state_id" class="form-label">Select State*</label>
                    <select name="state_id" id="state_id" class="form-select" >
                        <option value="">Select State</option>
                        @foreach($states as $state)
                            <option value="{{ $state->id }}"
                                {{ old('state_id', $district->state_id) == $state->id ? 'selected' : '' }}>
                                {{ $state->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('state_id') <small class="invalid-feedback">{{ $message }}</small> @enderror
                </div>

                <div class="col-sm-6 col-md-4 mb-3">
                    <label for="is_active" class="form-label">Select Status*</label>
                    <select name="is_active" id="is_active" class="form-select" >
                        <option value="0" {{ old('is_active', $district->is_active) == 0 ? 'selected' : '' }}>Active</option>
                        <option value="1" {{ old('is_active', $district->is_active) == 1 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>

            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('districts.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
