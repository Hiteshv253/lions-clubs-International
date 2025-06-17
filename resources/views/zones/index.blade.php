@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Zones</li>
      </ol>
</nav>

<div class="card shadow-sm rounded-4">
      <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Zones List</h5>
            <a href="{{ route('zones.create') }}" class="btn btn-success">Add Zone</a>
      </div>
      <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered table-hover" id="zone-table">
                  <thead class="table-light">
                        <tr>
                              <th>#</th>
                              <th>Zone Name</th>
                              <th>Region</th>
                              <th>Actions</th>
                        </tr>
                  </thead>
            </table>
      </div>
</div>

<script>
      $(function () {
            $('#zone-table').DataTable({
                  processing: true,
                  serverSide: true,
                  order: [[0, 'desc']], // 👈 Sort by first column (id) in descending order
                  ajax: '{{ route("zones.index") }}',
                  columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                        {data: 'name', name: 'name'},
                        {data: 'region_name', name: 'region.name'},
                        {data: 'actions', name: 'actions', orderable: false, searchable: false}
                  ]
            });
      });
</script>
@endsection
