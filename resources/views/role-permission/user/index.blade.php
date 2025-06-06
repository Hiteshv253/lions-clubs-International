@extends('layouts.master')

@section('content')
<div class=" mt-4">

      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light p-2 rounded">
                  <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Users</li>
            </ol>
      </nav>

      <!-- Navigation Buttons -->
      <div class="mb-3">
            <a href="{{ url('roles') }}" class="btn btn-primary mx-1">Roles</a>
            <a href="{{ url('permissions') }}" class="btn btn-info mx-1">Permissions</a>
            <a href="{{ url('users') }}" class="btn btn-warning mx-1">Users</a>
      </div>

      <!-- Role filter dropdown -->
      <div class="mb-3">
            <label for="filterRole" class="form-label">Filter by Role</label>
            <select id="filterRole" class="form-select" style="max-width: 300px;">
                  <option value="">All Roles</option>
                  @foreach ($roles as $role)
                  <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                  @endforeach
            </select>
      </div>

      @if (session('status'))
      <div class="alert alert-success">{{ session('status') }}</div>
      @endif

      <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Users</h5>
                  @can('create user')
                  <a href="{{ url('users/create') }}" class="btn btn-primary btn-sm">Add User</a>
                  @endcan
            </div>

            <div class="card-body p-0">
                  <table class="table table-bordered table-striped mb-0" id="users-table" style="width: 100%;">
                        <thead class="table-light">
                              <tr>
                                    <th style="width:5%">Id</th>
                                    <th style="width:25%">First Name</th>
                                    <th style="width:25%">Last Name</th>
                                    <th style="width:30%">Email</th>
                                    <th style="width:25%">Roles</th>
                                    <th style="width:15%">Action</th>
                              </tr>
                        </thead>
                        <tbody></tbody>
                  </table>
            </div>
      </div>

</div>

<script>
      $(document).ready(function () {
            var table = $('#users-table').DataTable({
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
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                  ]
            });

            // Reload the table when the role filter changes
            $('#filterRole').change(function () {
                  table.ajax.reload();
            });
      });
</script>
@endsection
