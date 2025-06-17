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
                        <a href="{{ route('users.create') }}" class="btn btn-primary">Add Users</a>
                  </div>

                  <div class="card-body">

                        {{-- Filters --}}
                        <div class="row gy-2 gx-3 mb-3">
                              <div class="col-sm-6 col-md-2">
                                    <label for="filterRole" class="form-label">Filter by Role</label>
                                    <select id="filterRole" class="form-select" style="max-width: 300px;">
                                          <option value="">All Roles</option>
                                          @foreach ($roles as $role)
                                          <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                                          @endforeach
                                    </select>
                              </div>
                        </div>

                        <div class="mb-3">
                              <button id="btn-filter" class="btn btn-sm btn-primary">Search</button>
                              <button id="btn-reset" class="btn btn-sm btn-secondary">Reset</button>
                        </div>
                        <div class="table-responsive">
                              @if(session('success'))
                              <div class="alert alert-success">{{ session('success') }}</div>
                              @endif
                              <table class="table table-bordered table-striped mb-0" id="users-table" style="width: 100%;">
                                    <thead class="table-light">
                                          <tr>
                                                <th style="width:5%">Id</th>
                                                <th style="width:25%">First Name</th>
                                                <th style="width:25%">Last Name</th>
                                                <th style="width:30%">Email ID</th>
                                                <th style="width:25%">Roles</th>
                                                <th style="width:25%">Last Login</th>
                                                <th style="width:25%">Status</th>
                                                <th style="width:15%">Action</th>
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
                        {data: 'last_login_at', name: 'last_login_at'},
                        {
                              data: 'is_active',
                              name: 'is_active',
                              render: function (data) {
                                    return data == 0 ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
                              }
                        },
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                  ]
            });

            // Reload the table when the role filter changes
            $('#filterRole').change(function () {
                  table.ajax.reload();
            });
            $('#btn-reset').click(function () {
                  $('#filter-parent-region, #filter-member-id, #filter-account-name, #filter-occupation, #filter-join-date, #filter-is-active').val('');
                  table.draw();
            });
      });
</script>
@endsection
