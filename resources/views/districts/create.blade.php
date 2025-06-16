@extends('layouts.master')

@section('content')
<nav>
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('districts.index') }}">Districts</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add District</li>
      </ol>
</nav>

<div class="card shadow-sm rounded-4">
      <div class="card-header"><h5>Add New District</h5></div>
      <div class="card-body">
            <form action="{{ route('districts.store') }}" method="POST">
                  @csrf
                  <div class="row g-3">
                        <div class="col-sm-6 col-md-4">
                              <label for="name">District Name</label>
                              <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                              @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-sm-6 col-md-4">
                              <label for="state_id">State</label>
                              <select name="state_id" id="state_id" class="form-select" required>
                                    <option value="">Select State</option>
                                    @foreach($states as $state)
                                    <option value="{{ $state->id }}" {{ old('state_id') == $state->id ? 'selected' : '' }}>
                                          {{ $state->name }}
                                    </option>
                                    @endforeach
                              </select>
                              @error('state_id') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                  </div>
                  <div class="text-end">
                        <button class="btn btn-primary">Create</button>
                        <a href="{{ route('districts.index') }}" class="btn btn-secondary">Cancel</a>
                  </div>
            </form>
      </div>
</div>
@endsection
