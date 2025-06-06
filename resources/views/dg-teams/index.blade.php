@extends('layouts.master')

@section('content')
<div class="">
  <h2 class="mb-3">DG Team List</h2>

  @if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
  @endif

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



      <table id="dgTeamTable-table" class="table table-striped table-bordered" style="width:100%">
            <thead>
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

<script>$(document).ready(function () {
    var table = $('#dgTeamTable-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route('dg-teams.index') }}',
            data: function (d) {
                d.designation = $('#designationFilter').val();
            }
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'designation', name: 'designation' },
            { data: 'phone', name: 'phone' },
            { data: 'address', name: 'address' },
            { data: 'is_active', name: 'is_active' },
            { data: 'actions', name: 'actions', orderable: false, searchable: false }
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