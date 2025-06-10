@extends('layouts.master')

@section('content')


<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dg-teams.index') }}">DG Team Member</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
      </ol>
</nav>
<div class="card shadow-sm">
      <div class="card-header">
            <h5 class="mb-0">Edit DG Team Member</h5>
      </div>
      <div class="card-body">
            <form action="{{ route('dg-teams.update', $dgTeam->id) }}" method="POST" novalidate>
                  @csrf
                  @method('PUT')

                  <div class="mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input id="name" type="text" name="name" class="form-control" value="{{ old('name', $dgTeam->name) }}" required>
                  </div>

                  <div class="mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input id="email" type="email" name="email" class="form-control" value="{{ old('email', $dgTeam->email) }}" required>
                  </div>

                  <div class="mb-3">
                        <label for="designation" class="form-label">Designation <span class="text-danger">*</span></label>
                        <input id="designation" type="text" name="designation" class="form-control" value="{{ old('designation', $dgTeam->designation) }}" required>
                  </div>

                  <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input id="phone" type="text" name="phone" class="form-control" value="{{ old('phone', $dgTeam->phone) }}">
                  </div>

                  <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea id="address" name="address" class="form-control" rows="3">{{ old('address', $dgTeam->address) }}</textarea>
                  </div>

                  <div class="text-end">
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('dg-teams.index') }}" class="btn btn-secondary">Cancel</a>
                  </div>
            </form>
      </div>
</div>

@endsection
