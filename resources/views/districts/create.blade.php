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
            <div class="card-header"><h5 class="mb-0">Add District</h5></div>
            <div class="card-body">
                  <form action="{{ route('districts.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                              <div class="col-sm-6 col-md-4">
                                    <label for="name" class="form-label">District Name *</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" >
                                    @error('name') <small class="invalid-feedback">{{ $message }}</small> @enderror
                              </div>

                              <div class="col-sm-6 col-md-4">
                                    <label for="state_id" class="form-label">Select State</label>
                                    <select name="state_id" id="state_id" class="form-select">
                                          <option value="">Select State*</option>
                                          @foreach($states as $state)
                                                                  <option value="{{ $state->id }}" {{ old('state_id') == $state->id ? 'selected' : '' }}>
                                                                        {{ $state->name }}
                                                                  </option>
                                          @endforeach
                                    </select>
                                    @error('state_id') <small class="invalid-feedback">{{ $message }}</small> @enderror
                              </div>
                              <div class="col-sm-6 col-md-4">
                                    <label for="is_active" class="form-label">Select Status*</label>
                                    <select name="is_active" id="is_active" class="form-select @error('is_active') is-invalid @enderror">
                                          <option value="0" {{ old('is_active', 0) == 0 ? 'selected' : '' }}>Active</option>
                                          <option value="1" {{ old('is_active', 1) == 1 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('is_active') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>
                        </div>

                        <div class="text-end mt-3">
                              <button type="submit" class="btn btn-primary">Create</button>
                              <a href="{{ route('districts.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                  </form>
            </div>
      </div>
@endsection
