@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('regions.index') }}">Regions</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Region</li>
    </ol>
</nav>

<div class="card shadow-sm rounded-4">
    <div class="card-header">
        <h5 class="mb-0">Add New Region</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('regions.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-sm-6 col-md-4">
                    <label for="district_id" class="form-label">Select District</label>
                    <select name="district_id" id="district_id" class="form-select" >
                        <option value="">-- Select District --</option>
                        @foreach($districts as $district)
                            <option value="{{ $district->id }}" {{ old('district_id') == $district->id ? 'selected' : '' }}>
                                {{ $district->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('district_id') <small class="invalid-feedback">{{ $message }}</small> @enderror
                </div>

                <div class="col-sm-6 col-md-4">
                    <label for="name" class="form-label">Region Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" >
                    @error('name') <small class="invalid-feedback">{{ $message }}</small> @enderror
                </div>

                <div class="col-sm-6 col-md-4">
                    <label for="is_active" class="form-label">Status</label>
                    <select name="is_active" id="is_active" class="form-select @error('is_active') is-invalid @enderror" >
                        <option value="1" {{ old('is_active', 1) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('is_active', 1) == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('is_active') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('regions.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
