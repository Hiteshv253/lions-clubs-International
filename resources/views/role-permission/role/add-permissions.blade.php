@extends('layouts.master')

@section('content')

<div class="container-fluid mt-4">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb bg-white px-3 py-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('roles') }}">Roles</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $role->name }}</li>
        </ol>
    </nav>

    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Permissions Card -->
    <div class="card shadow-sm border-0">
        <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
            <h5 class="mb-0">Assign Permissions to: {{ $role->name }}</h5>
            <a href="{{ url('roles') }}" class="btn btn-light btn-sm">Back</a>
        </div>

        <div class="card-body">
            <form action="{{ url('roles/'.$role->id.'/give-permissions') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-bold">Permissions</label>
                    @error('permission')
                        <div class="text-danger mb-2">{{ $message }}</div>
                    @enderror

                    <div class="row">
                        @foreach ($permissions as $permission)
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-2">
                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="permission[]"
                                        value="{{ $permission->name }}"
                                        id="perm-{{ $permission->id }}"
                                        {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}
                                    />
                                    <label class="form-check-label" for="perm-{{ $permission->id }}">
                                        {{ ucfirst(str_replace('_', ' ', $permission->name)) }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Update Permissions</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
