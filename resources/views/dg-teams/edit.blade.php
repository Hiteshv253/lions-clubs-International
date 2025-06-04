@extends('layouts.master')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm rounded-4">
        <div class="card-header bg-primary text-white rounded-top-4">
            <h4 class="mb-0">Edit DG Team Member</h4>
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

                <div class="d-flex justify-content-between">
                    <a href="{{ route('dg-teams.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
