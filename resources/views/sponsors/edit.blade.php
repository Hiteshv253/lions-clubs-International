@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>

            <li class="breadcrumb-item"><a href="{{ route('sponsors.index') }}">Sponsors</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Sponsor</li>
      </ol>
</nav>

<div class="card shadow-sm">
      <div class="card-header">
            <h5 class="mb-0">Edit Sponsor</h5>
      </div>
      <div class="card-header">

            <form action="{{ route('sponsors.update', $sponsor->id) }}" method="POST" enctype="multipart/form-data" class="card shadow-sm p-4">
                  @csrf
                  @method('PUT')

                  <div class="row mb-3">
                        <div class="col-md-6">
                              <label class="form-label">Name</label>
                              <input type="text" name="name" value="{{ old('name', $sponsor->name) }}" class="form-control">
                              @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6">
                              <label class="form-label">Website</label>
                              <input type="text" name="website" value="{{ old('website', $sponsor->website) }}" class="form-control">
                              @error('website') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                  </div>

                  @if ($sponsor->logo)
                  <div class="mb-3">
                        <label class="form-label">Current Logo</label><br>
                        <img src="{{ asset('storage/' . $sponsor->logo) }}" alt="Logo" width="100" class="img-thumbnail">
                  </div>
                  @endif

                  <div class="mb-3">
                        <label class="form-label">Change Logo</label>
                        <input type="file" name="logo" class="form-control">
                        @error('logo') <small class="text-danger">{{ $message }}</small> @enderror
                  </div>

                  <div>
                        <button type="submit" class="btn btn-success">Update Sponsor</button>
                        <a href="{{ route('sponsors.index') }}" class="btn btn-secondary">Back</a>
                  </div>
            </form>
      </div>
</div>
@endsection
