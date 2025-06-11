@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>

        <li class="breadcrumb-item"><a href="{{ route('zones.index') }}">Zones</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Zone</li>
    </ol>
</nav>

<div class="card shadow-sm">
    <div class="card-header">
        <h5>Edit Zone</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('zones.update', $zone->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="region_id" class="form-label">Region</label>
                <select name="region_id" id="region_id" class="form-select" required>
                    <option value="">Select Region</option>
                    @foreach($regions as $region)
                        <option value="{{ $region->id }}" {{ $zone->region_id == $region->id ? 'selected' : '' }}>
                            {{ $region->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Zone Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $zone->name }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Zone</button>
            <a href="{{ route('zones.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
