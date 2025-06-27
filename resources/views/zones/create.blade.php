@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('zones.index') }}">Zones</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Zone</li>
    </ol>
</nav>

<div class="card shadow-sm rounded-4">
    <div class="card-header">
        <h5>Add New Zone</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('zones.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-sm-6 col-md-4">
                    <label for="region_id" class="form-label">Region</label>
                    <select name="region_id" id="region_id" class="form-select @error('region_id') is-invalid @enderror" required>
                        <option value="">Select Region</option>
                        @foreach($regions as $region)
                            <option value="{{ $region->id }}" {{ old('region_id') == $region->id ? 'selected' : '' }}>
                                {{ $region->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('region_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-sm-6 col-md-4">
                    <label for="name" class="form-label">Zone Name</label>
                    <input type="text" name="name" id="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name') }}" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-sm-6 col-md-4">
                    <label for="is_active" class="form-label">Status</label>
                    <select name="is_active" id="is_active"
                            class="form-select @error('is_active') is-invalid @enderror" required>
                        <option value="0" {{ old('is_active', 0) == 0 ? 'selected' : '' }}>Active</option>
                        <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('is_active') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="text-end mt-3">
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="{{ route('zones.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
