@extends('layouts.master')

@section('content')
<div class="mt-4">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb bg-light p-2 rounded">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('permissions') }}">Permissions</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Permission</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-6">

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

            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center bg-light">
                    <h5 class="mb-0">Edit Permission</h5>
                    <a href="{{ url('permissions') }}" class="btn btn-sm btn-danger">Back</a>
                </div>

                <div class="card-body">
                    <form action="{{ url('permissions/'.$permission->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="permissionName" class="form-label">Permission Name</label>
                            <input
                                type="text"
                                id="permissionName"
                                name="name"
                                value="{{ old('name', $permission->name) }}"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter permission name"
                            />
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
