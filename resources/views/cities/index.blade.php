@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cities.index') }}">Cities</a></li>
      </ol>
</nav>

<div class="row mt-3">
      <div class="col-xl-12">
            <div class="card shadow-sm rounded-4">
                  <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h4 class="card-title mb-0">Cities List</h4>
                        <a href="{{ route('cities.create') }}" class="btn btn-primary btn-sm">Add New Cities</a>
                  </div>
                  @if(session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                  @endif
                  @if(session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                  @endif
                  <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <div class="table-responsive">
                              <table id="citiesTable-table" class="table table-bordered table-striped w-100">
                                    <thead class="table-light">
                                          <tr>
                                                <th>#</th>
                                                <th>City Name</th>
                                                <th>State Name</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                          </tr>
                                    </thead>
                              </table>

                        </div>
                  </div>
            </div>
      </div>
</div>


<script>
      $(document).ready(function () {
            $('#citiesTable-table').DataTable({
                  processing: true,
                  serverSide: true,
                  ajax: '{{ route('cities.index') }}', // Make sure this route returns JSON for DataTables
                  columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'state_name', name: 'state.name'},
                        {
                              data: 'is_active',
                              name: 'is_active',
                              render: function (data) {
                                    return data == 0 ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-secondary">Inactive</span>';
                              }
                        },
                        {data: 'actions', name: 'actions', orderable: false, searchable: false}
                  ],
                  order: [[0, 'desc']], // 👈 Sort by first column (id) in descending order
                  lengthMenu: [5, 10, 25, 50],
                  pageLength: 10,
            });
      });
</script>
@endsection
