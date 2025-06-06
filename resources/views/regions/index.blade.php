@extends('layouts.master')

@section('content')
<div class="mt-4">
      <h2>Regions</h2>

      <!-- Search filter -->
      <div class="mb-3">
            <select id="filter-name" class="form-control" style="max-width: 300px; display: inline-block;">
                  <option value="">-- Select Region Name --</option>
                  @foreach($allRegionNames as $regionName)
                  <option value="{{ $regionName }}">{{ $regionName }}</option>
                  @endforeach
            </select>
            <button id="btn-search" class="btn btn-primary ml-2">Search</button>
            <button id="btn-reset" class="btn btn-secondary ml-2">Reset</button>
            <a href="{{ route('regions.create') }}" class="btn btn-success flex-grow-1 flex-md-grow-0">+ Add New</a>

      </div>

      <table id="regions-table" class="table table-bordered table-hover">
            <thead>
                  <tr>
                        <th>Name</th>
                        <th>Parent</th>
                        <th>Actions</th>
                  </tr>
            </thead>
      </table>
</div>

<script>
      $(function () {
            // Initialize DataTable
            var table = $('#regions-table').DataTable({
                  processing: true,
                  serverSide: true,
                  ajax: {
                        url: '{{ route('regions.index') }}',
                        data: function (d) {
                              d.name = $('#filter-name').val();
                        }
                  },
                  columns: [
                        {data: 'name', name: 'name'},
                        {data: 'parent', name: 'parent.name', orderable: false, searchable: false},
                        {data: 'actions', name: 'actions', orderable: false, searchable: false}
                  ],
                  order: [[0, 'asc']]
            });

            $('#btn-search').click(() => table.draw());

            $('#btn-reset').click(() => {
                  $('#filter-name').val('');
                  table.draw();
            });

      });
</script>
@endsection
