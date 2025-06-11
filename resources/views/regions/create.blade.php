@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('regions.index') }}">Regions</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Region</li>
      </ol>
</nav>

<div class="card shadow-sm">
      <div class="card-header">
            <h5>Add New Region</h5>
      </div>
      <div class="card-body">
            <form action="{{ route('regions.store') }}" method="POST">
                  @csrf
                  <div class="row g-3">
                        <div class="col-sm-6 col-md-4">
                              <label for="district_id" class="form-label">Select District</label>
                              <select name="district_id" id="district_id" class="form-select" required>
                                    <option value="">-- Select District --</option>
                                    @foreach($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                    @endforeach
                              </select>
                        </div>
                        <div class="col-sm-6 col-md-4">
                              <label for="name" class="form-label">Region Name</label>
                              <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                  </div>
                  <div class="text-end">
                        <button class="btn btn-primary">Save</button>
                        <a href="{{ route('regions.index') }}" class="btn btn-secondary">Cancel</a>
                  </div>
            </form>
      </div>
</div>
@endsection
