@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sponsors.index') }}">Sponsors</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
      </ol>
</nav>

<div class="card shadow-sm">
      <div class="card-header">
            <h5 class="mb-0">Add New Sponsor</h5>
      </div>

      <!-- Sponsor Form -->
      <form action="{{ route('sponsors.store') }}" method="POST" enctype="multipart/form-data" class="card shadow-sm p-4">
            @csrf
            <div class="row mb-3">
                  <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                  </div>

                  <div class="col-md-6">
                        <label class="form-label">Website</label>
                        <input type="text" name="website" value="{{ old('website') }}" class="form-control">
                        @error('website') <small class="text-danger">{{ $message }}</small> @enderror
                  </div>
            </div>

            <div class="mb-3">
                  <label class="form-label">Logo</label>
                  <input type="file" name="logo" class="form-control">
                  @error('logo') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div>
                  <button type="submit" class="btn btn-primary">Create Sponsor</button>
                  <a href="{{ route('sponsors.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
      </form>
</div>
</div>
@endsection
