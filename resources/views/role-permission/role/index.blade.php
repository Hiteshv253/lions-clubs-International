@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Roles</li>
    </ol>
</nav>

<div class="row mt-3">
    <div class="col-xl-12">
        <div class="card shadow-sm rounded-4">
            <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                <h4 class="mb-0">Roles</h4>
                @can('create role')
                <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm">Add Role</a>
                @endcan
            </div>

            <div class="card-body">
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
                                <td>{{ ucfirst($role->name) }}</td>
                                <td>
                                    <a href="{{ url('lions/roles/'.$role->id.'/give-permissions') }}" class="btn btn-warning btn-sm">Permissions</a>

                                    @if (!in_array($role->name, ['super-admin', 'admin', 'member', 'user']))
                                        @can('update role')
                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-success btn-sm ms-1">Edit</a>
                                        @endcan
                                        @can('delete role')
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Delete this role?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm ms-1">Delete</button>
                                        </form>
                                        @endcan
                                    @endif
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
</div>
@endsection
