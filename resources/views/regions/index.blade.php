@extends('layouts.master')

@section('content')



<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Regions</li>
      </ol>
</nav>


<div class="mt-1">
      <div class="card shadow-sm">
            <div class="card-header">
                  <h5 class="mb-0">Regions List</h5>
            </div>
            <div class="card-body">
                  <div class="row mb-3 align-items-center">
                        <select id="filterDistrict" class="form-select w-auto">
                              <option value="">All Districts</option>
                              @foreach($districts as $district)
                              <option value="{{ $district->id }}">{{ $district->name }}</option>
                              @endforeach
                        </select>

                        <div class="col-md-6 d-flex gap-2">
                              <button id="btnSearch" class="btn btn-primary">Search</button>
                              <button id="btnReset" class="btn btn-secondary">Reset</button>
                              <a href="{{ route('regions.create') }}" class="btn btn-success">Add Region</a>
                              <!--<a href="{{ route('clubs.exportPdf') }}" class="btn btn-danger">Export to PDF</a>-->
                        </div>
                  </div>
                  @if(session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                  @endif

                  @if(session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                  @endif
                  <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="region-table">
                              <thead class="table-light">
                                    <tr>
                                          <th>#</th>
                                          <th>Region Name</th>
                                          <th>District</th>
                                          <th>Actions</th>
                                    </tr>
                              </thead>
                        </table>
                  </div>
            </div>
      </div>
</div>



<script>
      $(function () {
            let table = $('#region-table').DataTable({
                  processing: true,
                  serverSide: true,
                  order: [[0, 'desc']], // 👈 Sort by first column (id) in descending order
                  ajax: {
                        url: '{{ route("regions.index") }}',
                        data: function (d) {
                              d.district_id = $('#filterDistrict').val();
                        }
                  },
                  columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'district_name', name: 'district.name'},
                        {data: 'actions', name: 'actions', orderable: false, searchable: false},
                  ]
            });

//            $('#filterDistrict').change(function () {
//                  table.ajax.reload();
//            });
            $('#btnSearch').click(function () {
                  table.ajax.reload();
            });

            $('#btnReset').click(function () {
                  $('#filterRegion').val('');
                  $('#filterDistrict').val('');
                  table.ajax.reload();
            });
      });
</script>

@endsection
