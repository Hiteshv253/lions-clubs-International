@extends('layouts.master')
@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">District</li>
      </ol>
</nav>



<div class="mt-1">
      <div class="card shadow-sm">
            <div class="card-header">
                  <h5 class="mb-0">Districts List</h5>
            </div>
            <div class="card-body">
                  <div class="row mb-3 align-items-center">
                        <select id="filter-state" class="form-select w-auto">
                              <option value="">All States</option>
                              @foreach($states as $state)
                              <option value="{{ $state->id }}">{{ $state->name }}</option>
                              @endforeach
                        </select>

                        <div class="col-md-6 d-flex gap-2">
                              <button id="btnSearch" class="btn btn-primary">Search</button>
                              <button id="btnReset" class="btn btn-secondary">Reset</button>
                              <a href="{{ route('districts.create') }}" class="btn btn-success">Add Districts</a>
                              <!--<a href="{{ route('clubs.exportPdf') }}" class="btn btn-danger">Export to PDF</a>-->
                        </div>
                  </div>
                  <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="districts-table" style="width:100%">
                              <thead class="table-light">
                                    <tr>
                                          <th>ID</th>
                                          <th>Name</th>
                                          <th>State Name</th>
                                          <th>Actions</th>
                                    </tr>
                              </thead>
                        </table>
                  </div>
            </div>
      </div>
</div>
<script>
      let table = $('#districts-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                  url: '{{ route("districts.index") }}',
                  data: function (d) {
                        d.state_id = $('#filter-state').val();
                  }
            },
            columns: [
                  {data: 'id', name: 'id'},
                  {data: 'name', name: 'name'},
                  {data: 'state_name', name: 'state.name'},
                  {data: 'actions', name: 'actions', orderable: false, searchable: false}
            ]
      });

      // trigger redraw when dropdown changes
      $('#filter-state').change(function () {
            table.draw();
      });

</script>

@endsection
