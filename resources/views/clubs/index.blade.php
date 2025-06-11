@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Clubs</li>
      </ol>
</nav>

<div class="mt-1">
      <div class="card shadow-sm">
            <div class="card-header">
                  <h5 class="mb-0">Club List</h5>
            </div>
            <div class="card-body">
                  <div class="row mb-3 align-items-center">
                        <div class="col-md-2">
                              <select id="filterRegion" class="form-select">
                                    <option value="">All Regions</option>
                                    @foreach($regions as $region)
                                    <option value="{{ $region->name }}">{{ $region->name }}</option>
                                    @endforeach
                              </select>
                        </div>

                        <div class="col-md-2">
                              <select id="filterDistrict" class="form-select">
                                    <option value="">All Districts</option>
                                    @foreach($districts as $district)
                                    <option value="{{ $district->name }}">{{ $district->name }}</option>
                                    @endforeach
                              </select>
                        </div>

                        <div class="col-md-6 d-flex gap-2">
                              <button id="btnSearch" class="btn btn-primary">Search</button>
                              <button id="btnReset" class="btn btn-secondary">Reset</button>
                              <a href="{{ route('clubs.create') }}" class="btn btn-success">Add New Club</a>
                              <!--<a href="{{ route('clubs.exportPdf') }}" class="btn btn-danger">Export to PDF</a>-->
                        </div>
                  </div>

                  <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="clubs-table" style="width:100%">
                              <thead class="table-light">
                                    <tr>
                                          <th>#</th>
                                          <th>Club Name</th>
                                          <th>Zone</th>
                                          <th>Region</th>
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
      $(document).ready(function () {
            var table = $('#clubs-table').DataTable({
                  processing: true,
                  serverSide: true,
                  ajax: {
                        url: "{{ route('clubs.index') }}",
                        data: function (d) {
                              d.region = $('#filterRegion').val();
                              d.district = $('#filterDistrict').val();
                        }
                  },
                  columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'zone_name', name: 'zone.name'},
                        {data: 'region_name', name: 'zone.region.name'},
                        {data: 'district_name', name: 'zone.region.district.name'},
                        {data: 'actions', name: 'actions', orderable: false, searchable: false},
                  ]
            });

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