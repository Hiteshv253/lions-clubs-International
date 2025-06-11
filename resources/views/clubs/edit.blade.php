@extends('layouts.master')

@section('content')
<nav>
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('clubs.index') }}">Clubs</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Club</li>
      </ol>
</nav>
<div class="card shadow-sm">
      <div class="card-header"><h5>Edit Club</h5></div>
      <div class="card-body">
            <form method="POST" action="{{ route('clubs.update', $club->id) }}">
                  @csrf
                  @method('PUT')
                  <div class="row g-3">
                        <div class="col-sm-6 col-md-4">
                              <label>District</label>
                              <select id="district" class="form-select">
                                    <option value="">Select District</option>
                                    @foreach($districts as $district)
                                    <option value="{{ $district->id }}" {{ $district->id == $club->zone->region->district_id ? 'selected' : '' }}>
                                          {{ $district->name }}
                                    </option>
                                    @endforeach
                              </select>
                        </div>

                        <div class="col-sm-6 col-md-4">
                              <label>Region</label>
                              <select id="region" class="form-select">
                                    <option value="{{ $club->zone->region->id }}">{{ $club->zone->region->name }}</option>
                              </select>
                        </div>

                        <div class="col-sm-6 col-md-4">
                              <label>Zone</label>
                              <select name="zone_id" id="zone" class="form-select">
                                    <option value="{{ $club->zone_id }}">{{ $club->zone->name }}</option>
                              </select>
                        </div>

                        <div class="col-sm-6 col-md-4">
                              <label>Club Name</label>
                              <input type="text" name="name" class="form-control" value="{{ $club->name }}" required>
                        </div>
                  </div>
                  <div class="text-end mt-3">
                        <button class="btn btn-primary">Update</button>
                        <a href="{{ route('clubs.index') }}" class="btn btn-secondary">Cancel</a>
                  </div>
            </form>
      </div>
</div>

@include('clubs.partials.script')
@endsection
