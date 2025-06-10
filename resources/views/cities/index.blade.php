@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cities.index') }}">Cities</a></li>
      </ol>
</nav>
<div class="card shadow-sm">
      <div class="card-header">
            <h5 class="mb-0">Cities List</h5>
      </div>
      <div class="card-body">
            <a href="{{ route('cities.create') }}" class="btn btn-primary mb-3">Add City</a>

            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table id="citiesTable" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>State</th>
                              <th>Actions</th>
                        </tr>
                  </thead>
            </table>

      </div>
</div>




<script>
      $(document).ready(function () {
            $('#citiesTable').DataTable({
                  processing: true,
                  serverSide: true,
                  ajax: '{{ route('cities.index') }}', // Make sure this route returns JSON for DataTables
                  columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                        {data: 'name', name: 'name'},
                        {data: 'state_name', name: 'state.name'},
                        {data: 'actions', name: 'actions', orderable: false, searchable: false}
                  ],
                  order: [[1, 'asc']],
                  lengthMenu: [5, 10, 25, 50],
                  pageLength: 10,
            });
      });
</script>
@endsection
