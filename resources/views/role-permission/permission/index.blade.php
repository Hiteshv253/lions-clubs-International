@extends('layouts.master')

@section('content')

<div class="container-fluid mt-4">

    <!-- Quick Navigation -->
    <div class="mb-3">
        <a href="{{ url('roles') }}" class="btn btn-primary me-2">Roles</a>
        <a href="{{ url('permissions') }}" class="btn btn-info me-2">Permissions</a>
        <a href="{{ url('users') }}" class="btn btn-warning">Users</a>
    </div>

    <!-- Flash Message -->
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Permissions Table Card -->
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center bg-light">
            <h5 class="mb-0">Permissions</h5>
            @can('create permission')
                <a href="{{ url('permissions/create') }}" class="btn btn-sm btn-primary">Add Permission</a>
            @endcan
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 10%;">ID</th>
                            <th>Name</th>
                            <th style="width: 30%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    @can('update permission')
                                        <a href="{{ url('permissions/'.$permission->id.'/edit') }}" class="btn btn-success btn-sm">Edit</a>
                                    @endcan

                                    @can('delete permission')
                                        <form action="{{ url('permissions/'.$permission->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this permission?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm ms-1">Delete</button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">No permissions found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Uncomment if using pagination --}}
        {{-- <div class="card-footer text-center">
            {{ $permissions->links() }}
        </div> --}}
    </div>
</div>

@endsection
