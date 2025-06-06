@extends('layouts.master')

@section('content')
<div class="container-fluid mt-4">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb bg-white px-3 py-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Role</li>
        </ol>
    </nav>

    <!-- Error Alert -->
    @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Edit Role Card -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Role</h5>
            <a href="{{ route('roles.index') }}" class="btn btn-light btn-sm">Back</a>
        </div>

        <div class="card-body">
            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="roleName" class="form-label">Role Name</label>
                    <input
                        type="text"
                        name="name"
                        id="roleName"
                        class="form-control"
                        value="{{ old('name', $role->name) }}"
                        required
                    />
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Update Role</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
