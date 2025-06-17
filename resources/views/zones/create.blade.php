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
                        <div class="col-sm-6 col-md-6">
                              <label for="region_id" class="form-label">Region</label>
                              <select name="region_id" id="region_id" class="form-select" required>
                                    <option value="">Select Region</option>
                                    @foreach($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                    @endforeach
                              </select>
                        </div>
                        <div class="col-sm-6 col-md-6">
                              <label for="name" class="form-label">Zone Name</label>
                              <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                  </div>


                  <div class="text-end">
                        <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-success" />
                        <a href="{{ route('zones.index') }}" class="btn btn-secondary">Cancel</a>
                  </div>
            </form>
      </div>
</div>
@endsection
