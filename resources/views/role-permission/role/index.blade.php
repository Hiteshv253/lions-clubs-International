@extends('layouts.master')

@section('content')
<div class="container-fluid mt-4">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb bg-white px-3 py-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Roles</li>
        </ol>
    </nav>

    <!-- Navigation Buttons -->
    <div class="d-flex flex-wrap gap-2 mb-3">
        <a href="{{ route('roles.index') }}" class="btn btn-primary">Roles</a>
        <a href="{{ route('permissions.index') }}" class="btn btn-info">Permissions</a>
        <a href="{{ route('users.index') }}" class="btn btn-warning">Users</a>
    </div>

    <!-- Status Message -->
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Roles Table -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Roles</h5>
            @can('create role')
                <a href="{{ route('roles.create') }}" class="btn btn-light btn-sm">Add Role</a>
            @endcan
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 5%;">#</th>
                            <th>Name</th>
                            <th style="width: 40%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a href="{{ url('roles/'.$role->id.'/give-permissions') }}" class="btn btn-warning btn-sm">
                                    Add/Edit Permissions
                                </a>
                                @can('update role')
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-success btn-sm ms-1">Edit</a>
                                @endcan
                                @can('delete role')
                                    <a href="{{ url('roles/'.$role->id.'/delete') }}" class="btn btn-danger btn-sm ms-1">Delete</a>
                                @endcan
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">No roles found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
