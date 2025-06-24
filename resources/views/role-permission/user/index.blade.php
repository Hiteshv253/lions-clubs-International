@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Users</li>
    </ol>
</nav>

<div class="row mt-3">
    <div class="col-xl-12">
        <div class="card shadow-sm rounded-4">
            <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                <h4 class="card-title mb-0">Users List</h4>
                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Add Users</a>
            </div>

            <div class="card-body">
                {{-- Filters --}}
                <div class="row g-2 mb-3">
                    <div class="col-md-3">
                        <label for="filterRole" class="form-label">Filter by Role</label>
                        <select id="filterRole" class="form-select">
                            <option value="">All Roles</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 d-flex align-items-end">
                        <button id="btn-filter" class="btn btn-primary me-2">Search</button>
                        <button id="btn-reset" class="btn  btn-secondary">Reset</button>
                    </div>
                </div>

                {{-- Alerts --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                {{-- Table --}}
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mb-0" id="users-table" style="width:100%;">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email ID</th>
                                <th>Roles</th>
                                <th>Last Login</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        const table = $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: '{{ url("/users/ajax") }}',
                data: function (d) {
                    d.role = $('#filterRole').val();
                }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'first_name', name: 'first_name'},
                {data: 'last_name', name: 'last_name'},
                {data: 'email', name: 'email'},
                {data: 'roles', name: 'roles', orderable: false, searchable: false},
                {data: 'last_login_at', name: 'last_login_at'},
                {
                    data: 'is_active',
                    name: 'is_active',
                    render: function (data) {
                        return data == 0
                            ? '<span class="badge bg-success">Active</span>'
                            : '<span class="badge bg-danger">Inactive</span>';
                    }
                },
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });

        $('#btn-filter').click(function () {
            table.ajax.reload();
        });

        $('#btn-reset').click(function () {
            $('#filterRole').val('');
            table.ajax.reload();
        });
    });
</script>
@endsection
