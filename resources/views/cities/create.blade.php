@extends('layouts.master')

@section('content')


<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cities.index') }}">Cities</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add New City</li>
      </ol>
</nav>
<div class="mt-4">
      <div class="card shadow-sm rounded-4">
            <div class="card-header">
                  <h5 class="mb-0">Add New City</h5>
            </div>
            <div class="card-body">
                  @if ($errors->any())
                  <div class="alert alert-danger">
                        <ul>
                              @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                              @endforeach
                        </ul>
                  </div>
                  @endif

                  <form action="{{ route('cities.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                              <label for="name" class="form-label">City Name</label>
                              <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
                        </div>

                        <div class="mb-3">
                              <label for="state_id" class="form-label">State</label>
                              <select name="state_id" id="state_id" class="form-select" required>
                                    <option value="">Select State</option>
                                    @foreach ($states as $state)
                                    <option value="{{ $state->id }}" {{ old('state_id') == $state->id ? 'selected' : '' }}>
                                          {{ $state->name }}
                                    </option>
                                    @endforeach
                              </select>
                        </div>
                        <div class="text-end">
                              <a href="{{ route('cities.index') }}" class="btn btn-secondary">Back</a>
                              <button type="submit" class="btn btn-success">Create City</button>
                        </div>
                  </form>
            </div>
      </div>
</div>
@endsection
