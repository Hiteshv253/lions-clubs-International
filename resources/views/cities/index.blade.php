@extends('layouts.master')

@section('content')
<div class="mt-4">

      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb bg-light p-2 rounded">
                  <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Cities</li>
            </ol>
      </nav>

      <h2>City List</h2>
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
