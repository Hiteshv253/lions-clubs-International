@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dg-teams.index') }}">DG Team List</a></li>
      </ol>
</nav>


<div class="card shadow-sm">
      <div class="card-header">
            <h5 class="mb-0">DG Team List</h5>
      </div>
      <div class="card-body">
            <div class="d-flex align-items-center mb-3">
                  <select id="designationFilter" class="form-select me-2" style="width: 250px;">
                        <option value="">-- All Designations --</option>
                        @foreach ($designations as $designation)
                        <option value="{{ $designation }}">{{ $designation }}</option>
                        @endforeach
                  </select>

                  <button id="filterBtn" class="btn btn-primary me-2">Search</button>
                  <button id="resetBtn" class="btn btn-secondary me-2">Reset</button>
                  <a href="{{ route('dg-teams.create') }}" class="btn btn-success">Add DG Team </a>
            </div>
            <div class="card ">
                  @if(session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                  @endif

                  @if(session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                  @endif
                  <div class="table-responsive">
                        <table id="dgTeamTable-table" class="table table-bordered table-striped w-100">
                              <thead class="table-light">
                                    <tr>
                                          <th>#</th>
                                          <th>Name</th>
                                          <th>Email</th>
                                          <th>Designation</th>
                                          <th>Phone</th>
                                          <th>Address</th>
                                          <th>Active</th>
                                          <th>Actions</th>
                                    </tr>
                              </thead>
                        </table>
                  </div>
            </div>
      </div>
</div>


<script>$(document).ready(function () {
            var table = $('#dgTeamTable-table').DataTable({
                  processing: true,
                  serverSide: true,
                  order: [[0, 'desc']], // 👈 Sort by first column (id) in descending order
                  ajax: {
                        url: '{{ route('dg - teams.index') }}',
                        data: function (d) {
                              d.designation = $('#designationFilter').val();
                        }
                  },
                  columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'email', name: 'email'},
                        {data: 'designation', name: 'designation'},
                        {data: 'phone', name: 'phone'},
                        {data: 'address', name: 'address'},
                        {
                              data: 'is_active',
                              name: 'is_active',
                              render: function (data) {
                                    return data == 1 ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-secondary">Inactive</span>';
                              }
                        },
                        {data: 'actions', name: 'actions', orderable: false, searchable: false}
                  ]
            });

            // Search button click
            $('#filterBtn').click(function () {
                  table.ajax.reload();
            });

            // Reset button click
            $('#resetBtn').click(function () {
                  $('#designationFilter').val(''); // clear dropdown
                  table.ajax.reload();
            });
      });

</script>

@endsection