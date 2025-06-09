@extends('layouts.master')

@section('content')
<div class="container py-4">
      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light px-3 py-2 rounded">
                  <li class="breadcrumb-item"><a href="{{ route('sponsors.index') }}">Sponsors</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add New Sponsor</li>
            </ol>
      </nav>

      <h2 class="mb-4">Add New Sponsor</h2>

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
@endsection
